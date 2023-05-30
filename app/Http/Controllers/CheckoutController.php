<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class CheckoutController extends Controller
{
    public function checkout()
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        // Create a new Stripe Checkout Session
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'myr',
                        'product_data' => [
                            'name' => 'Your Product Name',
                        ],
                        'unit_amount' => 1000, // The price in cents
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('checkout.success'),
            'cancel_url' => route('checkout.cancel'),
        ]);

        // Redirect the user to the Stripe Checkout page
        return redirect($session->url);
    }

    public function success()
    {
        // Handle successful payment
        return view('success');
    }

    public function cancel()
    {
        // Handle cancelled payment
        return view('cancel');
    }
}
