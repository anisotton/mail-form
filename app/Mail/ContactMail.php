<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name, $email, $phone, $content, $attachement;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $phone, $message, $pathAttachement)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->content = $message;
        $this->attachement = $pathAttachement;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->email)->attach(storage_path('app/public/').$this->attachement)->view('emails.contactMail');
    }
}
