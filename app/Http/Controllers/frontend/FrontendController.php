<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\CourseLecture;
use App\Models\CourseSection;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){

        $course_category = Category::with('course','course.user','course.course_goal')->get();
        $categories = Category::all();
        return view('frontend.index', compact('course_category', 'categories'));
    }

    public function view($slug){
       $course = Course::where('course_name_slug', $slug)->with('category', 'subcategory','user')->first();
       $course_content = CourseSection::where('course_id', $course->id)->with('lecture')->get();

       $total_lecture = CourseLecture::where('course_id', $course->id)->count();
       $all_category = Category::orderBy('name', 'asc')->get();

        return view('frontend.pages.course-details.index', compact('course', 'course_content', 'total_lecture', 'all_category'));
    }

    public function courseCategory($slug){
        $category = Category::where('slug', $slug)->first();
        $course = Course::where('category_id', $category->id)->with('user', 'course_goal')->get();
        return view('frontend.pages.category.index', compact('course'));

    }

    public function courseSubcategory($category, $subcategory){
        $subcategory = SubCategory::where('slug', $subcategory)->first();
        $course = Course::where('subcategory_id', $subcategory->id)->with('user', 'course_goal')->get();
        return view('frontend.pages.subcategory.index', compact('course'));
    }
}
