<?php

namespace App\Http\Controllers;

use App\Models\Committee;
use App\Models\PageSettings;

class CommitteeController extends Controller
{
    /**
     * Display the committee page.
     */
    public function index()
    {
        $departments = Committee::getDepartments();
        $committees = Committee::active()
            ->orderBy('order')
            ->orderBy('name')
            ->get()
            ->groupBy('department');

        $pageNotice = optional(
            PageSettings::query()->where('page_identifier', 'committee')->first()
        )->custom_message;

        return view('committee.index', compact('departments', 'committees', 'pageNotice'));
    }
}
