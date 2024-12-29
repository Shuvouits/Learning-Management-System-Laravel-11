<?php

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

if (!function_exists('isApprovedUser')) {
    function isApprovedUser()
    {
        $user_id = Auth::id();
        return User::where('role', 'instructor')
            ->where('status', '1')
            ->where('id', $user_id)
            ->first();
    }
}


if (!function_exists('getCourseCategories')) {
    function getCourseCategories() {
        return Category::with('course', 'course.user', 'course.course_goal')->get();
    }
}

if (!function_exists('getCategories')) {
    function getCategories() {
        return  Category::with('subcategory')->get();
    }
}
