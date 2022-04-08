<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProductCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $products;
    public function __construct($products)
    {
        $this->products = $products;
//        dd($this->products);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $productArray =$this->products;
        return $this->from(env('MAIL_FROM_ADDRESS'))
            ->subject($productArray['name']."Create Successfully")
            ->view('mail.product',compact('productArray'));
    }
}
