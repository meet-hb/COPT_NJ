<?php

namespace App\Jobs;

use App\Mail\SendUserMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $details;
    /**
     * Create a new job instance.
     */
    public function __construct($details)
    {
        //
        $this->details = $details;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if (!empty($this->details['resume'])) {
            $filePath = storage_path($this->details['resume']);
            if (file_exists($filePath)) {
                $this->details['email']->attach($filePath);
            }
        }
        // Send the same email to a static email address
        Mail::to('kaushalparekh.hackberrysoftech@gmail.com')->send(new SendUserMail($this->details));
    }
}
