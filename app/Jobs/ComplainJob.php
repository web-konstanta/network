<?php

namespace App\Jobs;

use App\Mail\ComplainMail;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ComplainJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $postId;
    public int $userId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(int $postId, int $userId)
    {
        $this->postId = $postId;
        $this->userId = $userId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $moderatorsEmails = User::where('role', User::MODERATOR_ROLE)->pluck('email');
        foreach ($moderatorsEmails as $moderatorsEmail) {
            Mail::to($moderatorsEmail)->send(new ComplainMail($this->postId, $this->userId));
        }
    }
}
