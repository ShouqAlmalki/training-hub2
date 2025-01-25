<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\PlanReport;
use App\Models\WebsiteRating;
use Illuminate\Http\Request;
use App\Models\WeeklyReport;
use App\Models\FinalReport;
use App\Models\OrgRating;
class StudentController extends Controller
{
    public function index() 
    {
        $user = auth()->user();
        $planreport = PlanReport::where("user_id", $user->id)->first();
        $weeklyreport = WeeklyReport::where("user_id", $user->id)->first();
        $finalreport = finalReport::where("user_id", $user->id)->first();
        $rating = OrgRating::where("user_id", $user->id)->first();
        $websiterating = WebsiteRating::where("user_id", $user->id)->first();
        $notifications = auth()->user()->notifications;
        return view("student.dashboard", compact("user", "planreport", "weeklyreport", "finalreport", "rating", "websiterating", "notifications" ));
    }
}
