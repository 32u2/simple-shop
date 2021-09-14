<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FirstPayment extends Mailable
{
    use Queueable, SerializesModels;

    public $email;

    public function __construct($data)
    {
        $this->email = $data['email'];
    }

    public function build()
    {
        return $this->markdown('emails.firstPayment');
    }
}
