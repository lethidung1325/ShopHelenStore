<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Cart;
use App\Model\Shipping;

class MailConfirm extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $shipping = Shipping::where('customer_id', Auth::guard('customer')->id())->first();
        return $this->from('lethidungtink37@gmail.com')->view('admin.mail', compact('carts', 'shipping', 'total'));
    }
}
