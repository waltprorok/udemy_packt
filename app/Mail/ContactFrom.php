<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactFrom extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $name;
    public $subject;
    public $message;

    /**
     * ContactFrom constructor.
     * @param $request
     */
    public function __construct($request)
    {
        $this->email = $request->email;
        $this->name = $request->name;
        $this->subject = $request->subject;
        $this->message = $request->message;
    }

    /**
     * Build the message.
     * @return ContactFrom
     */
    public function build()
    {
        return $this->from($this->email, $this->name)
            ->subject($this->subject)
            ->markdown('email.contact');
    }
}
