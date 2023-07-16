<?php

namespace App\Jobs;

use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected string $recipientEmail;
    protected string $subject;
    protected string $body;

    /**
     * Create a new job instance.
     *
     * @param string $recipientEmail
     * @param string $subject
     * @param string $body
     */
    public function __construct(string $recipientEmail, string $subject, string $body)
    {
        $this->recipientEmail = $recipientEmail;
        $this->subject = $subject;
        $this->body = $body;
    }

    /**
     * Execute the job.
     *
     * @return void
     * @throws Exception
     */
    public function handle(): void
    {
        try {
            $email = (new Mailable)
                ->from(config('mail.from.address'))
                ->subject($this->subject)
                ->html($this->body);

            Mail::to($this->recipientEmail)->send($email);
        } catch (Exception $e) {
            Log::error('Failed to send email: ' . $e->getMessage());
            throw new Exception('Failed to send the email message: ' . $e->getMessage());
        }
    }
}
