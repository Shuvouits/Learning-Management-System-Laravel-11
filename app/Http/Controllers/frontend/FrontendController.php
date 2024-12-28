<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){

        $course_category = Category::with('course','course.user','course.course_goal')->get();
        $categories = Category::all();
        return view('frontend.index', compact('course_category', 'categories'));
    }
}
