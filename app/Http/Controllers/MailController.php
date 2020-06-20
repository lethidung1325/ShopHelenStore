<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Auth;
use App\Model\Order;
use App\Model\Order_item;
use App\Model\Category;
use App\Model\Shipping;
use App\Model\Customer;
use Cart;
use App\Mail\OrderShipped;

class MailController extends Controller
{
  public function __construct()
    {
        $categories = Category::all();
        view()->share('categories', $categories);
    }

    public function sendMail()
    {
      $user = Auth::guard('customer')->user();
      Mail::to($user)->send(new OrderShipped($user));
      Cart::clear();
      return view('fontend.pages.thankyou');
    }

    public function mailConfirm($id)
    {
      $order = Order::find($id);
      $shipping = Shipping::where('customer_id', $order->customer_id)->first();
      $order_item = Order_item::where('order_id', $id)->get();
      Mail::send('admin.mail', compact('order', 'shipping', 'order_item'), function ($message) use ($shipping) {
          $message->from('lethidungtink37@gmail.com', 'Shop HELEN STORE');
          $message->to($shipping->email, $shipping->firstName.$shipping->lastName);
          // $message->cc('lethidungtink37@gmail.com', 'Shop HELEN STORE');
          $message->subject('Xác nhận đơn hàng');
      });
      return redirect()->route('list_order');
    }
}
