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
use Mail;

class CartController extends Controller
{
    public function __construct()
    {
        $categories = Category::all();
        view()->share('categories', $categories);
    }

    public function getAddCart($id, Request $request)
    {
        $product = Product::find($id);
        Cart::add([
            'id' => $id,
            'name' => $product->title,
            'price' => $product->price,
            'quantity' => $request->qty,
            'attributes' => ['image' => $product->image, 'size' => $request->size]
        ]);
        return redirect()->route('show_cart');
    }

    public function showCart()
    {
        $payments = Payment::all();
        $carts = Cart::getContent();
        $total = Cart::getTotal();
        return view('fontend.pages.cart', compact('carts', 'total', 'payments'));
    }

    public function updateCart(Request $request)
    {
        Cart::update($request->id, array('quantity' => array('relative' => false, 'value' => $request->quantity)));
    }

    public function deleteCart($id)
    {
        if ($id == 'all') {
            Cart::clear();
        } else {
            Cart::remove($id);
        }
        return redirect()->back();
    }

    public function checkoutCart()
    {
        $carts = Cart::getContent();
        $total = Cart::getTotal();
        $payments = Payment::all();
        return view('fontend.pages.checkout', compact('carts', 'total', 'payments'));
    }

    public function postComplete(Request $request)
    {
        $total = Cart::getTotal();
        $order = new Order;
        $order->customer_id = Auth::guard('customer')->id();
        $order->total_price = $total;
        $order->payment_status = 'Đang xử lý';
        if ($request->methodPay == 1) {
            $order->payment_id = 1;
            $order->save();
            Shipping::create([
                'customer_id' => Auth::guard('customer')->id(),
                'firstName' => $request->firstName,
                'lastName' => $request->lastName,
                'address' => $request->address,
                'email' => $request->email,
                'phoneNumber' => $request->phoneNumber,
            ]);
            $carts = Cart::getContent();
            foreach ($carts as $cart) {
                $order_item = new Order_item;
                $order_item->product_id = $cart->id;
                $order_item->quantity = $cart->quantity;
                $order_item->price = $cart->price;
                $order_item->size = $cart->attributes->size;
                $order_item->order_id = $order->id;
                $order_item->save();
            }
            return redirect()->route('mail');
        }
        if ($request->methodPay == 2) {// kiểm tra hình thức thanh toán nếu là hình thức thanh toán online
            session(['cost_id' => $request->id]); 
            session(['url_prev' => url()->previous()]);
            $vnp_TmnCode = "LERUDCGW"; //Mã website tại VNPAY 
            $vnp_HashSecret = "JCJWMQEDPLYQUFNXBRBGUECHIFHWNJCC"; //Chuỗi bí mật
            $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_TxnRef = date("YmdHis"); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            $vnp_Returnurl = "http://localhost:8080/ShopHelenStore/cart/thank-you";
            $vnp_OrderInfo = "Thanh toán hóa đơn phí dich vụ";
            $vnp_OrderType = 'billpayment';
            $vnp_Amount = Cart::getTotal() * 100;
            $vnp_Locale = 'vn';
            $vnp_IpAddr = request()->ip();

            $inputData = array( // mảng dữ liệu để truyền lên vnpay
                "vnp_Version" => "2.0.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef,
            );

            //trên tài liệu VNPay
            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . $key . "=" . $value;
                } else {
                    $hashdata .= $key . "=" . $value;
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }

            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
                $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
                $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
            }
        }
        return redirect($vnp_Url);//trả về 
    }

    public function thankyou(Request $request)
    {
        if ($request->vnp_ResponseCode == "00") { //kiểm tra thanh toán thành công
            $total = Cart::getTotal();
            $order = new Order;
            $order->customer_id = Auth::guard('customer')->id();
            $order->total_price = $total;
            $order->payment_status = 'Đang xử lý';
            $order->payment_id = 2;
            $order->save();
            $carts = Cart::getContent();
            foreach ($carts as $cart) {
                $order_item = new Order_item;
                $order_item->product_id = $cart->id;
                $order_item->quantity = $cart->quantity;
                $order_item->price = $cart->price;
                $order_item->size = $cart->attributes->size;
                $order_item->order_id = $order->id;
                $order_item->save();
            }
            Cart::clear();
            return view('fontend.pages.thankyou');
        }
        session()->forget('url_prev');//xóa session, link thanh toán cũ
    }
}
