<?php

namespace App\Http\Livewire;
use Livewire\Component;

use App\Models\Product;
use Stripe;


class SingleProduct extends Component
{
    public $product;

    protected $listeners = ['processPurchase' => 'processPurchase'];

    public function processPurchase($data) {
        // $data[] object:
        // ===============
        // "product_id" => "5"
        // "token" => array:9 [▼
        //   "id" => "tok_1JZW4kFtftzX9HhOZ69VGY24"
        //   "object" => "token"
        //   "card" => array:20 [▼
        //     "id" => "card_1JZW4kFtftzX9HhOABpjS9Sl"
        //     "object" => "card"
        //     "address_city" => null
        //     "address_country" => null
        //     "address_line1" => null
        //     "address_line1_check" => null
        //     "address_line2" => null
        //     "address_state" => null
        //     "address_zip" => null
        //     "address_zip_check" => null
        //     "brand" => "Visa"
        //     "country" => "US"
        //     "cvc_check" => "unchecked"
        //     "dynamic_last4" => null
        //     "exp_month" => 11
        //     "exp_year" => 2022
        //     "funding" => "credit"
        //     "last4" => "4242"
        //     "name" => "borisvukaso@gmail.com"
        //     "tokenization_method" => null
        //   ]
        //   "client_ip" => "197.185.102.181"
        //   "created" => 1631604546
        //   "email" => "borisvukaso@gmail.com"
        //   "livemode" => false
        //   "type" => "card"
        //   "used" => false
        // ]

        $token = $data['token'];
        $amount = $data['amount'];
        $cardToken = $token['id'];

        \Log::info($data);


        // 1st payment also has to be via customer, as per https://stripe.com/docs/saving-cards
        $customer = Stripe::customers()->create([
            'source' => $cardToken,
            'email' => $token['email'],
        ]);

        $customerID = $customer['id']; // store $customerID to db for the 2nd payment

        // dd($customerID); // TESTED OK

        // "charge the customer, not the card", card was linked earlier via 'source'
        $stripe = Stripe::charges()->create([
            'amount' => $amount * 100,
            'currency' => 'gbp',
            'customer' => $customerID,
        ]);


        // ==============================================================================================================

        // 2nd payment - making it immediatelly just to test, but this needs $customerID stored to db + cron job

        $knownCustomer = Stripe::customers()->find($customerID); // retrieve entire customer object from stripe

        $knownCustomerEmail = $knownCustomer['email']; // needed for mail notification

        $charge = Stripe::charges()->create([
            'amount' => $amount * 100,
            'currency' => 'gbp',
            'customer' => $knownCustomer,
        ]);

    }

    public function mount($id) {
        $this->product = Product::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.single-product', [
            'product' => $this->product,
        ]);
    }

    // public function createCheckoutSession() {
    //     \Stripe\Stripe::setApiKey(env('STRIPE_KEY'));

    //     $session = \Stripe\Checkout\Session::create([
    //         'payment_method_types' => ['card'],
    //         'line_items' => [[
    //           'price_data' => [
    //             'currency' => 'gbp',
    //             'product_data' => [
    //               'name' => $this->product->name,
    //             ],
    //             'unit_amount' => $this->product->price,
    //           ],
    //           'quantity' => 1,
    //         ]],
    //         'mode' => 'payment',
    //         'success_url' => env('APP_URL') . 'thank-you',
    //         'cancel_url' => env('APP_URL'),
    //       ]);

    //       return $response->withHeader('Location', $session->url)->withStatus(303);

    // }

}
