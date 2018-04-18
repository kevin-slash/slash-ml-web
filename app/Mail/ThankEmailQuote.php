<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ThankEmailQuote extends Mailable
{
    use Queueable, SerializesModels;

    private $data = [];

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data = [])
    {
        //
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.request-quote-confirm')
                ->from(env('ADMIN_MAIL', 'info@example.com'), 'Quote - Inquiry')
                ->replyTo(env('ADMIN_MAIL', 'info@example.com'), 'Quote - Inquiry')
                // ->cc($address, $name)
                // ->bcc($address, $name)
                // ->replyTo($this->data['contact_email'], $this->data['contact_person_name'])
                ->subject('Your Quote Inquiry - Tenglay Logistic')
                ->with($this->data);
    
    }
}
