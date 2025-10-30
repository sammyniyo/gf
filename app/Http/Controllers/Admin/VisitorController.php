<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageView;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function index(Request $request)
    {
        $query = PageView::query()->orderByDesc('viewed_at');

        if ($search = $request->input('q')) {
            $query->where(function ($q) use ($search) {
                $q->where('url', 'like', "%{$search}%")
                  ->orWhere('visitor_ip', 'like', "%{$search}%")
                  ->orWhere('user_agent', 'like', "%{$search}%")
                  ->orWhere('referer', 'like', "%{$search}%");
            });
        }

        if ($request->filled('from')) {
            $query->where('viewed_at', '>=', $request->input('from').' 00:00:00');
        }
        if ($request->filled('to')) {
            $query->where('viewed_at', '<=', $request->input('to').' 23:59:59');
        }

        // Optional: filter out common bot user-agents
        if ($request->boolean('exclude_bots')) {
            $query->where(function ($q) {
                $q->whereNull('user_agent')
                  ->orWhereRaw("LOWER(user_agent) NOT REGEXP 'bot|spider|crawl|slurp|wget|curl|httpclient|libwww|headless|phantom|node|python|java|wordpress'");
            });
        }

        $pageViews = $query->paginate(50)->withQueryString();

        return view('admin.visitors.index', [
            'pageViews' => $pageViews,
        ]);
    }
}


