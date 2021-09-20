<?php

namespace App\Http\Livewire;
use Livewire\Component;

use App\Models\Product;
use Stripe;
use App\Jobs\DoSecondPayment;
use Carbon;
class SingleProduct extends Component
{
    public $product;

    protected $listeners = ['processPurchase' => 'processPurchase'];

    public function processPurchase($data) {
        // $data[] object:
        // ===============
        // "product_id" => "6"
        // "amount" => 150
        // "token" => array:9 [▼
        //     "id" => "tok_1JZXg3FtftzX9HhO9HC0y7Eg"
        //     "object" => "token"
        //     "card" => array:20 [
        //         "id" => "card_1JZXg2FtftzX9HhOabreqOmj"
        //         "object" => "card"
        //         "address_city" => null
        //         "address_country" => null
        //         "address_line1" => null
        //         "address_line1_check" => null
        //         "address_line2" => null
        //         "address_state" => null
        //         "address_zip" => null
        //         "address_zip_check" => null
        //         "brand" => "Visa"
        //         "country" => "US"
        //         "cvc_check" => "unchecked"
        //         "dynamic_last4" => null
        //         "exp_month" => 11
        //         "exp_year" => 2022
        //         "funding" => "credit"
        //         "last4" => "4242"
        //         "name" => "borisvukaso@gmail.com"
        //         "tokenization_method" => null
        //     ]
        //     "client_ip" => "197.185.102.181"
        //     "created" => 1631610703
        //     "email" => "borisvukaso@gmail.com"
        //     "livemode" => false
        //     "type" => "card"
        //     "used" => false
        // ]

        $token = $data['token'];
        $amount = $data['amount'];
        $cardToken = $token['id'];
        $created = $token['created']; // retrieve UNIX time

        // \Log::info($data);


        // 1st payment also has to be via customer, as per https://stripe.com/docs/saving-cards
        $customer = Stripe::customers()->create([
            'source' => $cardToken,
            'email' => $token['email'],
        ]);

        $customerID = $customer['id']; // store $customerID to db for the 2nd payment

        // dd($customerID); // TESTED OK

        // "charge the customer, not the card", card was linked earlier via 'source'
        $charge1 = Stripe::charges()->create([
            'amount' => $amount,
            'currency' => 'gbp',
            'customer' => $customerID,
        ]);


        // schedule 2nd payment

        // this is not needed, we already know the email
        // $knownCustomer = Stripe::customers()->find($customerID); // retrieve entire customer object from stripe
        // $knownCustomerEmail = $knownCustomer['email']; // needed for mail notification

        // try {
        //     $charge2 = Stripe::charges()->create([
        //         'customer' => $customerID,
        //         'currency' => 'gbp',
        //         'amount'   => $amount,
        //     ]);
        // } catch (Cartalyst\Stripe\Exception\MissingParameterException $e) {
        //     dd($e);
        // }

        //dd('Charge 1 ID: ' . $charge1['id'] . ' - Charge 2 ID: ' . $charge2['id']); // tests OK

        DoSecondPayment::dispatch($customerID, $amount)->delay(now()->addMinutes(5));
        dispatch($secondPaymentJob);

        // don't forget: php artisan queue:work

    }

    public function mount($id) {
        $this->product = Product::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.single-product', [
            'product' => $this->product,
        ])->layout('layouts.guest');
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
