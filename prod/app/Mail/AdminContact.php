<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminContact extends Mailable
{
    use Queueable, SerializesModels;
    
    public $topic;
    public $body;
    public $email;
    public $subject;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $email, string $topic, string $body)
    {
        $this->topic = $topic;
        $this->body = $body;
        $this->email = $email;
        $this->subject = 'Email from TIP App';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('contacts.email');
    }
}
