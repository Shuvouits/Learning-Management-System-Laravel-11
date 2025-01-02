<?php

namespace App\Http\Controllers\instructor;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApplyCouponRequest;
use App\Http\Requests\CouponRequest;
use App\Models\Cart;
use App\Models\Coupon;
use App\Services\ApplyCouponService;
use App\Services\instructor\CouponService;
use Illuminate\Http\Request;

class CouponController extends Controller
{

    protected $couponService, $applyCouponService;

    public function __construct(CouponService $couponService, ApplyCouponService $applyCouponService)
    {
        $this->couponService = $couponService;
        $this->applyCouponService = $applyCouponService;
    }


    public function index()
    {
        $all_coupon = Coupon::latest()->get();
        return view('backend.instructor.coupon.index', compact('all_coupon'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.instructor.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CouponRequest $request)
    {
        //
        $this->couponService->saveCoupon($request->validated());
        return redirect()->back()->with('success', 'Coupon Created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $coupon = Coupon::find($id);
        return view('backend.instructor.coupon.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CouponRequest $request, string $id)
    {

        $this->couponService->updateCoupon($request->validated(), $id);
        return redirect()->back()->with('success', 'Coupon Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function applyCoupon(ApplyCouponRequest $request)
    {

        // Validate the input
        $validated = $request->validated();

        $couponName = $validated['coupon'];
        $courseIds = $validated['course_id'];
        $instructorIds = $validated['instructor_id'];

        $discounts =  $this->applyCouponService->applyCoupon($couponName, $courseIds, $instructorIds);

         // If no valid coupon found
         if (empty($discounts)) {
            return response()->json([
                'success' => false,
                'message' => 'No valid coupon found for the selected courses.',
            ], 400);
        }

         // Calculate total discount
         $totalDiscount = collect($discounts)->sum('discount');

         // Store total discount in session
         session(['coupon' => $totalDiscount]);


         // Success response
         return response()->json([
            'success' => true,
            'message' => 'Coupon applied successfully!',
            'discounts' => $discounts,
        ]);





    }
}
