<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApproveComplainMail extends Mailable
{
    use Queueable, SerializesModels;

    public int $postId;
    public User $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(int $postId, int $userId)
    {
        $this->postId = $postId;
        $this->user = User::find($userId);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('cabinet.mail.complain-approve');
    }
}
