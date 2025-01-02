<?php

namespace App\Http\Controllers\frontend;

use App\Events\PaymentSuccessful;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Cart;
use App\Models\Payment;
use App\Services\PaymentService;
use Illuminate\Http\Request;
use Stripe\StripeClient;
use Illuminate\Support\Str;


class OrderController extends Controller
{

    protected $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }


    public function order(OrderRequest $request)
    {

        session()->put('stripe_data', $request->validated());


        // Call the service to process the payment
        return $this->paymentService->processPayment($request->validated());
    }

    public function success(Request $request)
    {
        // Get the session ID from the query string
        $sessionId = $request->query('session_id');
        $stripe = new StripeClient(config('stripe.stripe_sk'));

        try {
            // Retrieve the Stripe session details
            $session = $stripe->checkout->sessions->retrieve($sessionId);
            $paymentIntent = $stripe->paymentIntents->retrieve($session->payment_intent);

            /*Event start */

            $paymentData = [
                'customer_name' => $session->customer_details->name,
                'email' => $session->customer_details->email,
                'amount' => $session->amount_total,
            ];

        

            // Dispatch event
            PaymentSuccessful::dispatch($paymentData);

            /*Event End  */

            // Use request data for specific fields
            $this->createPayment($session, $paymentIntent);

            //delete cart data
            $guestToken = $request->cookie('guest_token') ?? Str::uuid();
            Cart::where('guest_token', $guestToken)->delete();

            //coupon session destroy
            session()->forget('coupon');

            return redirect('/')->with('success', 'Course purchase successfully');


           // return view('frontend.pages.checkout.stripe.success', ['session' => $session]);
        } catch (\Exception $e) {

            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function cancel()
    {

        return view('frontend.pages.checkout.stripe.cancel');
    }


    private function createPayment($session, $paymentIntent)
    {

        // Create payment record using metadata from Stripe
        Payment::create([
            'transaction_id' => $paymentIntent->id,
            'name' => $session->customer_details->name, // Use customer details for name
            'email' => $session->customer_email, // Customer's email from session

            'phone' => $session->customer_details->phone ?? null, // Customer's phone from customer_details
            'address' => json_encode($session->customer_details->address), // Customer's address from customer_details, encoded as JSON if needed


            'total_amount' => $session->amount_total / 100, // Total price from metadata
            'payment_type' => 'stripe', // Payment type (Stripe in this case)
            'invoice_no' => 'INV-' . strtoupper(uniqid()), // Generate a unique invoice number
            'order_date' => now()->toDateString(),
            'order_month' => now()->format('F'),
            'order_year' => now()->year,
            'status' => 'completed', // Payment status
        ]);
    }
}
