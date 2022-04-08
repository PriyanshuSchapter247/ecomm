<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProductCreated;

class ProductCreatedJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $products;
    public function __construct($products)
    {
        $this->products=$products;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
       Mail::to($this->products ['email'])->send(
            (new ProductCreated($this->products))
        );
//        Mail::to(auth()->user()->email )->send(
//            (new ProductCreated($products))
//        );
    }
}
