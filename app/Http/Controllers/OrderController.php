<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Model\Product;
use App\Model\Order;
use App\Model\Payment;
use App\Model\Customer;
use App\Model\Category;
use App\Model\Order_item;
use App\Model\Shipping;
use Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $categories = Category::all();
        view()->share('categories', $categories);
    }

    public function getList()
    {
        $orders = Order::all();
        return view('admin.order.list', compact('orders'));
    }

    public function getEdit($id)
    {
        $order = Order::find($id);
        $shipping = Shipping::where('customer_id', $order->customer->id)->first();
        $order_item = Order_item::where('order_id', $order->id)->get();
        return view('admin.order.edit', compact('order', 'order_item', 'shipping'));
    }

    public function postEdit($id, Request $request)
    {
        $order = Order::find($id);
        if (request()->payment_status == "on") {
            // Order::where('id', $id)->update(['payment_status' => 'Đã xử lý']);
            $order->payment_status = "Đã xử lý";
            $order->save();
            // return redirect()->route('list_order');
            return redirect()->route('mail_confirm', $id);
        } else {
            return redirect()->route('list_order');
        }
    }

    public function getDelete($id)
    {
        $order = Order::find($id);
        $order->delete();
        return redirect()->back()->with('message', 'Xóa thành công');
    }
}
