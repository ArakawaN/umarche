<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use App\Mail\ThanksMail;

class SendThanksMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;






    public function __construct(
        public  $products,
        public  $user
    ) {
        //


    }


    public function handle(): void
    {
        //

        Mail::to($this->user)
            ->send(new ThanksMail($this->products, $this->user));
    }
}
