<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminContact extends Mailable
{
    use Queueable, SerializesModels;
    
    public $name;
    public $email;
    public $body;
    public $topic;
    public $subject;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $name, string $email, string $topic, string $body)
    {
        $this->name = $name;
        $this->email = $email;
        $this->topic = $topic;
        $this->body = $body;
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
