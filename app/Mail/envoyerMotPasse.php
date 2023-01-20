<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class envoyerMotPasse extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $randomString)
    {
     
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build( $randomString)
    {
        return $this->view('mail',compact($randomString));
    }
}
