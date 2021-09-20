<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Stripe;

class DoSecondPayment implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $customerID, $amount;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($customerID, $amount)
    {
        $this->$customerID = $customerID;
        $this->$amount = $amount;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $charge2 = Stripe::charges()->create([
                'customer' => $this->$customerID,
                'currency' => 'gbp',
                'amount'   => $this->$amount,
            ]);
            dd('Second payment sent.');
        } catch (Cartalyst\Stripe\Exception\MissingParameterException $e) {
            dd($e);
        }
    }
}
