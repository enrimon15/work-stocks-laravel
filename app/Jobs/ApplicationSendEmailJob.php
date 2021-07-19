<?php

namespace App\Jobs;

use App\Mail\ApplicationMailCompany;
use App\Mail\ApplicationMailForSubscriber;
use App\Mail\DeleteApplication;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ApplicationSendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $details;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        echo("SEND EMAIL");
        foreach ($this->details as &$value) {
            echo($value . '\n');
        }


        if ($this->details['emailType'] == 'deleteApplication') {
            Mail::to($this->details['companyEmail'])->send(new DeleteApplication($this->details));
        } else if ($this->details['emailType'] == 'sendApplication') {
            echo('entrato');
            Mail::to($this->details['subscriberEmail'])->send(new ApplicationMailForSubscriber($this->details));
            Mail::to($this->details['companyEmail'])->send(new ApplicationMailCompany($this->details));
       } else {
            echo('fail');
            $this->fail();
        }
    }
}
