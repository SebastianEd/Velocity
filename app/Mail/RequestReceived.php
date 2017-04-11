<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RequestReceived extends Mailable
{
    use Queueable, SerializesModels;


    protected $data;
    /**
     * Create a new message instance.
     *
     * @return void-
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.received')
                    ->subject('Velocity | Request received!')
                    ->with([
                        'name' => $this->data['name'],
                        'text' => $this->data['text']
                    ]);

    }
}
