<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Support\Facades\Input;

class ThankEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.contact-us-confirm')
                ->replyTo(env('ADMIN_MAIL', 'info@example.com'), env('ADMIN_NAME', 'Inquiry - Example'))
                ->from(env('ADMIN_MAIL', 'info@example.com'), env('ADMIN_NAME', 'Inquiry - Example'))
                // ->cc($address, $name)
                // ->bcc($address, $name)
                // ->replyTo(Input::get('email'), Input::get('name'))
                ->subject('Your Contact Us - Tenglay Logistic')
                ->with([
                    'name'=>Input::get('name'),
                    'email'=>Input::get('email'),
                    'phone'=>Input::get('phone'),
                    'desc'=>Input::get('message')
                ]);
    }
}
