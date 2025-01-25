<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebsiteRatingController extends Controller
{
    public function create () 
    {
        $user = auth()->user();
        return view("student.websiteRating", compact("user"));
    }

    public function store (Request $request)
    {
        $user = auth()->user();
        $websiterating = $user->websiteRating()->create([
            "opinion"=> $request->opinion,
        ]);
        if ($websiterating) 
        {
            flash()->success('Thank for rating our website', ['timeout' => 3000, 'position' => 'bottom-right']);
            return redirect()->route('student.dashboard');
        }
        flash()->error('An error occurred while creating the rating', ['timeout' => 3000, 'position' => 'bottom-right']);
    }
}
