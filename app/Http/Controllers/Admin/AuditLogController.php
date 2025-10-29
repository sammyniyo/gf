<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use App\Models\User;
use Illuminate\Http\Request;

class AuditLogController extends Controller
{
    /**
     * Display a listing of audit logs.
     */
    public function index(Request $request)
    {
        $query = AuditLog::with('user')->latest();

        // Filter by action
        if ($request->filled('action')) {
            $query->where('action', $request->action);
        }

        // Filter by model type
        if ($request->filled('model_type')) {
            $query->where('auditable_type', 'like', '%' . $request->model_type . '%');
        }

        // Filter by user
        if ($request->filled('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        // Filter by date range
        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        // Search in description
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('description', 'like', "%{$search}%")
                  ->orWhere('user_name', 'like', "%{$search}%")
                  ->orWhere('user_email', 'like', "%{$search}%");
            });
        }

        $logs = $query->paginate(50)->withQueryString();

        // Get unique actions for filter
        $actions = AuditLog::select('action')
            ->distinct()
            ->orderBy('action')
            ->pluck('action');

        // Get unique model types for filter
        $modelTypes = AuditLog::select('auditable_type')
            ->distinct()
            ->whereNotNull('auditable_type')
            ->get()
            ->map(function($log) {
                $parts = explode('\\', $log->auditable_type);
                return end($parts);
            })
            ->unique()
            ->sort()
            ->values();

        // Get users for filter
        $users = User::select('id', 'name')->orderBy('name')->get();

        return view('admin.audit-logs.index', compact('logs', 'actions', 'modelTypes', 'users'));
    }

    /**
     * Display the specified audit log.
     */
    public function show(AuditLog $auditLog)
    {
        $auditLog->load('user');
        return view('admin.audit-logs.show', compact('auditLog'));
    }

    /**
     * Delete old audit logs.
     */
    public function cleanup(Request $request)
    {
        $request->validate([
            'days' => 'required|integer|min:1|max:365',
        ]);

        $deletedCount = AuditLog::where('created_at', '<', now()->subDays($request->days))->delete();

        return redirect()->route('admin.audit-logs.index')
            ->with('success', "Deleted {$deletedCount} audit log(s) older than {$request->days} days.");
    }
}
