<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mstproduct;

class Productbooking extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        //
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = $this->request;
        $product = Mstproduct::find($data->product_id);
        return $this->from('info@undagifarmers.com')->subject('Undagi Farmers Village - Thank you for your booking!')->view('email.productbooking', compact('data','product'))->replyTo($data->email, $data->full_name);
    }
}
