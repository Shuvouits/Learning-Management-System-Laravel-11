<h1>Payment Successful</h1>
<p>Dear {{ $payment['customer_name'] }},</p>
<p>Your payment of ${{ number_format($payment['amount'] / 100, 2) }} was successful!</p>
<p>Thank you for purchasing the course.</p>
