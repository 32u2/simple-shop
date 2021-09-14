<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Stripe;



class StripePaymentController extends Controller
{
    public function index()
    {
       return view('stripe'); // not used, incorporated into single page
    }


    public function process(Request $request)
    {
        // all received fields:
        // ====================
        // token: the entire token (stringified)
        // tokenId: token.id,
        // amount: amount,
        // product_id: productID,
        // email: email,

  		\Log::info($request->all());

        $stripe = Stripe::charges()->create([
            'source' => $request->get('tokenId'),
            'currency' => 'GBP',
            'amount' => $request->get('amount') * 100,
            'receipt_email' => 'borisvukaso@gmail.com',
            'capture' => true,
        ]);

        // $this->sendMail;
        return '======' . $stripe;

    }


    public function sendMail() {
        // send mail

        try {
            $data['email'] = 'borisvukaso@gmail.com';
            \Mail::to($data['email'])->send(new \App\Mail\FirstPayment($data));
        } catch(Throwable $e) {
            dd($e->getMessage());
        }

    }
}
