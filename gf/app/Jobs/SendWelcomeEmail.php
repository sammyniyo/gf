<?php

namespace App\Jobs;

use App\Mail\FriendshipWelcomeEmail;
use App\Mail\MemberWelcomeEmail;
use App\Models\Member;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class SendWelcomeEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $member;
    public $emailType;
    public $tries = 3;
    public $timeout = 60;
    public $backoff = [30, 60, 120]; // Wait 30s, 60s, 120s between retries

    /**
     * Create a new job instance.
     */
    public function __construct(Member $member, string $emailType = 'friendship')
    {
        $this->member = $member;
        $this->emailType = $emailType;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            // Add delay to avoid rate limiting
            sleep(rand(1, 3));

            if ($this->emailType === 'friendship') {
                Mail::to($this->member->email)->send(new FriendshipWelcomeEmail($this->member));
            } else {
                Mail::to($this->member->email)->send(new MemberWelcomeEmail($this->member));
            }

            Log::info("Welcome email sent successfully to: {$this->member->email}");

        } catch (\Exception $e) {
            Log::error("Failed to send welcome email to {$this->member->email}: " . $e->getMessage());

            // If it's a rate limiting error, delay the retry
            if (strpos($e->getMessage(), '450') !== false || strpos($e->getMessage(), 'rate') !== false) {
                Log::info("Rate limiting detected, delaying retry for: {$this->member->email}");
                $this->release(300); // Release back to queue for 5 minutes
            } else {
                throw $e; // Re-throw other errors
            }
        }
    }

    /**
     * Handle a job failure.
     */
    public function failed(\Throwable $exception): void
    {
        Log::error("Welcome email job failed permanently for {$this->member->email}: " . $exception->getMessage());
    }
}
