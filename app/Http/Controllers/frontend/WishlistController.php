<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use App\Services\user\WishlistService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{

    protected $wishlistService;

    public function __construct(WishlistService $wishlistService)
    {
        $this->wishlistService = $wishlistService;
    }

    public function index()
    {
        $user_id = Auth::user()->id;
        // $wishlist = Wishlist::where('user_id', $user_id)->with('course', 'course.user')->get();
        return view('backend.user.wishlist.index');
    }

    public function getWishlist()
    {
        $user_id = Auth::user()->id;
        $wishlist = Wishlist::where('user_id', $user_id)->with('course', 'course.user')->paginate(6);

        return response()->json($wishlist);
    }

    public function destroy($id)
    {
        $wishlist = Wishlist::find($id);
        if ($wishlist) {
            $wishlist->delete();
            return response()->json(['status' => 'success', 'message' => 'Wishlist item deleted successfully.']);
        }
        return response()->json(['status' => 'error', 'message' => 'Wishlist item not found.']);
    }




    // Wishlist এ কোর্স যোগ করা
    public function addToWishlist(Request $request)
    {

        $validated_data = $request->validate([
            'course_id' => 'required|exists:courses,id', // Check if course_id exists in the courses table
        ]);

        $course_id = $validated_data['course_id'];

        return $this->wishlistService->createWishlist($course_id);
    }
}
