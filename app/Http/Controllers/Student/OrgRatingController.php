<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\OrgRating;
use Illuminate\Http\Request;
use App\Models\Organization;

class OrgRatingController extends Controller
{
    public function create () 
    {
        $user = auth()->user();
        $orgnizationid = $user->planReport->organization_id;
        $orgnization = Organization::where("id", $orgnizationid)->first();
        return view("student.orgRating", compact("user","orgnization"));
    }

    public function store (Request $request) 
    {
        $user = auth()->user();
        $orgnizationid = $user->planReport->organization_id;

        $rate = OrgRating::create(
            [
                'user_id' => $user->id,
                'organization_id' => $orgnizationid,
                'overview'=> $request->input('overview'),
                'rating'=> $request->input('rating'),
            ]
        );
        if ($rate) 
        {
            flash()->success('Thank your rating and its under review', ['timeout' => 3000, 'position' => 'bottom-right']);
            return redirect()->route('student.dashboard');
        }
        flash()->error('An error occurred while creating the rating', ['timeout' => 3000, 'position' => 'bottom-right']);
    }
}
