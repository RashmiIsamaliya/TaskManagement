<?php

namespace App\Jobs;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\TestMail;
use Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $subscribers = User::where('is_mail_sent','0')->get()->toArray();
        if (!empty($subscribers)) {
            foreach ($subscribers as $subscriber)
            {
                $email = new TestMail();
                Mail::to($subscriber['email'])->send($email);
                User::where('id', $subscriber['id'])->update(['is_mail_sent' => '1']);
            }  
        }
    }
}
