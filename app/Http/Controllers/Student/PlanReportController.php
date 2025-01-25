<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Models\PlanReport;
use Illuminate\Http\Request;

class PlanReportController extends Controller
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
        $organizations = Organization::all();
        return view("student.planForm", compact("user", 'organizations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $planreport =  PlanReport::create([
            'user_id' => auth()->id(),
            'start_date'=> $request->input('start_date'),
            'end_date'=> $request->input('end_date'),
            'week1'=> $request->input('week_1'),
            'week2'=> $request->input('week_2'),
            'week3'=> $request->input('week_3'),
            'week4'=> $request->input('week_4'),
            'week5'=> $request->input('week_5'),
            'week6'=> $request->input('week_6'),
            'week7'=> $request->input('week_7'),
            'week8'=> $request->input('week_8'),
            'training_type'=> $request->input('training_tybe'),
            'organization_id'=> $request->input('organization_name'),
            'org_sub_name'=> $request->input('supervisor_name'),
            'org_sub_email'=> $request->input('supervisor_email'),
            'org_sub_phone'=> $request->input('supervisor_phone'),
            'org_sub_department'=> $request->input('supervisor_department'),
            'status'=> PlanReport::STATUS_UNDER_REVIEW,
            'created_at'=> now(),
            'updated_at'=> now(),
        ]
        );
        if ($planreport) {
            
            flash()->success('Plan Report created successfully and under review', ['timeout' => 3000, 'position' => 'bottom-right']);
            return redirect()->route('student.dashboard');
        }
        flash()->error('Failed to create Plan Report try again', ['timeout' => 3000, 'position' => 'bottom-right']);
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
