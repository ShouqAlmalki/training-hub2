<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $organizations = Organization::with("ratings")->get();
        return view('welcome', compact('organizations'));
    }

    public function fillter($orgname)
    {
        $org = Organization::where('name', $orgname)->first();
        $organization = Organization::findOrFail($org->id);
        $ratings = $organization->ratings()->where('status', 1)->get();
        return view('orgRatings', compact('organization','ratings'));

    }
}
