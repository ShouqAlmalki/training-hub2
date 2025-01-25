<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WeeklyReport;

class WeeklyReportController extends Controller
{
    public function create() 
    {
        $user = auth()->user();
        $weeklyreport = WeeklyReport::where("user_id", $user->id)->latest()->first();
        return view("student.weeklyForm", compact("user", "weeklyreport"));
    }

    public function store(Request $request)
    {
        $weeklyForm = auth()->user()->weeklyReport()->create([
            'week_number' => $request->week_number,
            'topics' => $request->topics, // Array of topics
            'skills' => $request->skills, // Array of skills
            'status' => 0,
        ]);

        if ($weeklyForm) 
        { 
            flash()->success('Weekly Report created successfully and under review', ['timeout' => 3000, 'position' => 'bottom-right']);
            return redirect()->route('student.dashboard');
        }
        flash()->error('An error occurred while creating the weekly report', ['timeout' => 3000, 'position' => 'bottom-right']);
    }
}
