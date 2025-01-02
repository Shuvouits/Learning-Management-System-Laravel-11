<?php

namespace App\Listeners;

use App\Events\PaymentSuccessful;
use App\Mail\PaymentConfirmationMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class PaymentNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PaymentSuccessful $event): void
    {
        Log::debug('Payment Listener Data:', $event->payment);
        try {
            Mail::to($event->payment['email'])->queue(new PaymentConfirmationMail($event->payment));

        } catch (\Exception $e) {
            Log::error('Failed to send email:', ['error' => $e->getMessage()]);
        }
    }
}
