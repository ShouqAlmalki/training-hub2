<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Organization;

class ExperienceController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $organizations = Organization::with('ratings')
        ->withAvg('ratings', 'rating') // Assumes your `ratings` table has a `rating` column
        ->get();
        return view('experiance', compact('organizations', 'user'));
    }
}
