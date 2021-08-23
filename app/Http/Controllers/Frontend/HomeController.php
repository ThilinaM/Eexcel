<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Course;
class HomeController
{
    public function index()
    {
        $courses = Course::where('status','Active')->get()->count();      
        return view('frontend.home', compact('courses'));
    }
}
