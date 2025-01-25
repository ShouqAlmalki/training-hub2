<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use App\Models\FinalReport;
use App\Models\OrgRating;
use App\Models\PlanReport;
use App\Models\WeeklyReport;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\StudentNotification;
class SupervisorController extends Controller
{
    public function index() {
        $user = auth()->user();
        $students = $user->students;
        return view("supervisor.dashboard", compact("user","students"));
    }

    public function reject($id)
    {
       $planreport =  PlanReport::findOrFail($id);
       $planreport->status = 2;
       $planreport->save();
       if ($planreport->status == 2) {
           return redirect()->back()->with('success', 'Plan Report Rejected Successfully');
       } else {
           return redirect()->back()->with('error', 'An error occurred while rejecting the Plan Report');
       }
    }
    public function accept($id)
    {
       $planreport =  PlanReport::findOrFail($id);
       $planreport->status = 1;
       $planreport->save();
       if ($planreport->status == 1) {
           return redirect()->back()->with('success', 'Plan Report Accepted Successfully');
       } else {
           return redirect()->back()->with('error', 'An error occurred while Accepting the Plan Report');
       }
    }

    public function rejectWeeklyReport($id)
    {
       $weeklyreport =  WeeklyReport::findOrFail($id);
       $weeklyreport->status = 2;
       $weeklyreport->save();
       if ($weeklyreport->status == 2) {
           return redirect()->back()->with('success', 'Weekly Report Rejected Successfully');
       } else {
           return redirect()->back()->with('error', 'An error occurred while rejecting the Weekly Report');
       }
    }
    public function acceptWeeklyReport($id)
    {
       $weeklyreport =  WeeklyReport::findOrFail($id);
       $weeklyreport->status = 1;
       $weeklyreport->save();
       if ($weeklyreport->status == 1) {
           return redirect()->back()->with('success', 'Weekly Report Accepted Successfully');
       } else {
           return redirect()->back()->with('error', 'An error occurred while Accepting the Weekly Report');
       }
    }

    public function rejectFinalReport($id)
    {
       $finalreport =  FinalReport::findOrFail($id);
       $finalreport->status = 2;
       $finalreport->save();
       if ($finalreport->status == 2) {
           return redirect()->back()->with('success', 'Final Report Rejected Successfully');
       } else {
           return redirect()->back()->with('error', 'An error occurred while rejecting the Final Report');
       }
    }
    public function acceptFinalReport($id)
    {
       $finalreport =  FinalReport::findOrFail($id);
       $finalreport->status = 1;
       $finalreport->save();
       if ($finalreport->status == 1) {
           return redirect()->back()->with('success', 'Final Report Rejected Successfully');
       } else {
           return redirect()->back()->with('error', 'An error occurred while rejecting the Final Report');
       }
    }

    public function rejectExpReport($id)
    {
       $expReport =  OrgRating::findOrFail($id);
       $expReport->status = 2;
       $expReport->save();
       if ($expReport->status == 2) {
           return redirect()->back()->with('success', 'Experiance Report Rejected Successfully');
       } else {
           return redirect()->back()->with('error', 'An error occurred while rejecting the Experiance Report');
       }
    }
    public function acceptExpReport($id)
    {
       $expReport =  OrgRating::findOrFail($id);
       $expReport->status = 1;
       $expReport->save();
       if ($expReport->status == 1) {
           return redirect()->back()->with('success', 'Experiance Report Accepted Successfully');
       } else {
           return redirect()->back()->with('error', 'An error occurred while accepting the Experiance Report');
       }
    }

    public function sendNotificationToStudent(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:255',
        ]);
    
        // Get the authenticated supervisor
        $supervisor = auth()->user();
    
        // Ensure the supervisor has a `students` relationship
        if (!$supervisor->role === 'supervisor') {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
    
        // Loop through all students and send the notification
        foreach ($supervisor->students as $student) {
            $student->notify(new StudentNotification($request->message));
        }
        return redirect()->back()->with('success', 'Notification sent successfully');
    }
}
