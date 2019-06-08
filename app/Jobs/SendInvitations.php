<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\AdvocateBulkUpload as InvitationList;
use App\Models\Client as Brand;

class SendInvitations implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($invites, $brand, $batch_id)
    {
        $this->invites = $invites;
        $this->brand = $brand->name;
        $this->brand_id = $brand->id;
        $this->batch_id = $batch_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        \Log::info($this->invites);
        foreach($this->invites as $invite){
            \Mail::raw('Sending emails with Mailgun and Laravel is easy!', function($message)
            {
                // $message->subject('Mailgun and Laravel are awesome!');
                // $message->from('no-reply@gamegraft.com', 'Believer');
                // $message->to($invite->email);
                \Log::info("sent an email \n ---------------------------------");
                \Log::info($invite);
            });
        }
    }
}
