<?php

namespace App\Http\Controllers;

use App\Models\Committee;
use Illuminate\Http\Request;

class CommitteeController extends Controller
{
    /**
     * Display the committee page.
     */
    public function index()
    {
        $departments = Committee::getDepartments();
        $committees = Committee::active()
            ->orderBy('department')
            ->orderBy('order')
            ->get()
            ->groupBy('department');

        return view('committee.index', compact('departments', 'committees'));
    }
}
