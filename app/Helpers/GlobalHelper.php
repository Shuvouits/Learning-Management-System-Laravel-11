<?php

use App\Models\Category;
use App\Models\User;
use App\Models\Wishlist;
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

if (!function_exists('getWishlist')) {
    function getWishlist() {

         // Check if user is authenticated
         if (Auth::check()) {
            $user_id = Auth::user()->id;
            return Wishlist::where('user_id', $user_id)->with('course', 'course.user')->get();
        }
         // If user is not logged in, return an empty collection or handle as needed
         return collect();
    }
}

function auth_check_json()
    {
        if (!Auth::check()) {
            return response()->json([
                'status' => 'error',
                'message' => 'You must be logged in to perform this action.',
            ], 401); // 401 Unauthorized
        }
        return null;
    }
