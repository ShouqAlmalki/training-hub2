<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlanReport;
use App\Models\FinalReport;
use App\Models\Organization; 
use Illuminate\Support\Facades\Auth;

class StudentReportController extends Controller
{
    public function index()
    {
        $user = Auth::user()->load('weeklyReports');
        
        $planreport = PlanReport::where('user_id', $user->id)->first();


        $finalreport = FinalReport::where('user_id', $user->id)->first();
  




        $organization = ($planreport && $planreport->organization_id)
            ? Organization::find($planreport->organization_id)
            : null;

        return view('student.dashboard', compact('user', 'planreport', 'finalreport',  'organization'));
    }
    

}
