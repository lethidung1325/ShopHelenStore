<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Model\Order;
use App\Model\Shipping;
use App\Model\Order_item;
use Auth;
use Cart;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->$carts = Cart::getContent();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $carts = Cart::getContent();
        $total = Cart::getTotal();
        $shipping = Shipping::where('customer_id', Auth::guard('customer')->id())->first();
        return $this->from('lethidungtink37@gmail.com')->view('fontend.pages.mail', compact('carts', 'shipping', 'total'));
    }
}
