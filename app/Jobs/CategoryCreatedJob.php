<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\CategoryCreated;

class CategoryCreatedJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $category;
    public function __construct($category)
    {
        $this->category=$category;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
//        dd($this->category['email']);
        Mail::to($this->category['email'])->send(
            (new CategoryCreated($this->category))
        );
//        Mail::to(auth()->user()->email )->send(
//            (new CategoryCreated($category))
//        );
    }
}

