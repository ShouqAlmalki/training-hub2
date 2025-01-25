<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FinalReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        return view("student.finalForm", compact("user"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $finalreport = auth()->user()->finalReport()->create([
            'introduction' => $request->introduction,
            'training_plan' => $request->training_plan,
            'overall_experiance' => $request->overall_experiance,
            'recommendations' => $request->recommendations,
            'conclusion' => $request->conclusion,
            'reference' => $request->reference,
            'status' => 0,
        ]);
        if ($finalreport) 
        {
            flash()->success('Final Report created successfully and under review', ['timeout' => 3000, 'position' => 'bottom-right']);
            return redirect()->route('student.dashboard');
        }
        flash()->error('An error occurred while creating the final report', ['timeout' => 3000, 'position' => 'bottom-right']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
