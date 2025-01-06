<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\CourseLecture;
use App\Models\CourseSection;
use App\Models\Review;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {

        $course_category = Category::with('course', 'course.user', 'course.course_goal')->get();
        $categories = Category::all();
        return view('frontend.index', compact('course_category', 'categories'));
    }

    public function view($slug)
    {

        $course = Course::where('course_name_slug', $slug)->with('category', 'subcategory', 'user')->first();
        $course_content = CourseSection::where('course_id', $course->id)->with('lecture')->get();

        $total_lecture = CourseLecture::where('course_id', $course->id)->count();
        $total_lecture_duration = CourseLecture::where('course_id', $course->id)->sum('video_duration');
        $all_category = Category::orderBy('name', 'asc')->get();

        $averageRating = Review::where('course_id', $course->id)
            ->where('status', 1)
            ->avg('rating');



        $unique_student =  Review::where('status', 1)->where('course_id', $course->id)->distinct()->pluck('user_id')->count();

        $count_ratings = Review::where('status', 1)->where('course_id', $course->id)->count();

        //Student bought

        // Get the currently authenticated user's ID
        $userId = Auth::id();

        // Fetch similar courses but exclude those already ordered by the student
        $similarCourses = Course::where('category_id', $course->category_id)
            ->where('id', '!=', $course->id)
            ->whereDoesntHave('orders', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })
            ->get();

            //Student Feedback

            $ratings_data = Review::where('course_id', $course->id)->where('status', 1)->with('user')->get();

            // রেটিং অনুযায়ী সংখ্যা বের করুন
           $ratingsCount = $ratings_data->groupBy('rating')->map->count();

            // মোট রিভিউ সংখ্যা বের করুন
            $totalRatings = $ratings_data->count();

        $more_course_instructor = Course::where('instructor_id', $course->instructor_id)->where('id', '!=', $course->id)->with('user')->get();


        return view('frontend.pages.course-details.index', compact('course', 'course_content', 'total_lecture', 'all_category', 'averageRating', 'count_ratings', 'unique_student', 'total_lecture_duration', 'similarCourses', 'ratingsCount', 'unique_student', 'totalRatings', 'ratings_data', 'more_course_instructor'));
    }

    public function courseCategory($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $course = Course::where('category_id', $category->id)->with('user', 'course_goal')->get();
        return view('frontend.pages.category.index', compact('course'));
    }

    public function courseSubcategory($category, $subcategory)
    {
        $subcategory = SubCategory::where('slug', $subcategory)->first();
        $course = Course::where('subcategory_id', $subcategory->id)->with('user', 'course_goal')->get();
        return view('frontend.pages.subcategory.index', compact('course'));
    }

    public function allCategory()
    {
        return view('frontend.pages.category.all-category');
    }

    public function instructor($name, $id)
    {

        $user = User::find($id);
        $user_course = Course::where('instructor_id', $user->id)->get();

        return view('frontend.pages.instructor.index', compact('user', 'user_course'));
    }
}
