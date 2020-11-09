<?php

namespace App\Http\Controllers;

use App\Order;
use App\Order_Details;
use App\Payment;
use App\shipping;
use Illuminate\Http\Request;
use App\Products;
use App\cart;
use Illuminate\Support\Facades\DB;

class checkoutController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','notAdmin']);
    }
    public function checkoutForm(){
        $cartProducts = cart::cartProducts();
        $total = $this->calcTotal($cartProducts);
        if(count($cartProducts)){
            return view('pages.checkout')->with([
                'products'=>$cartProducts,
                'total'=>$total
            ]);
        }
        return redirect(route('showCart'))
            ->with('msg',' Your cart must have products to perform checkout!');
    }

    public function calcTotal($cartproducts){
        $sum = 0;
        foreach ($cartproducts as $product){
            $sum += $product->cost;
        }
        return $sum;
    }

    public function validateRequest(Request $request){
        $this->validate($request,[
            'email'=>'required|string|email',
            'fname'=>'required|string',
            'lname'=>'required|string',
            'address1'=>'required|string',
            'mobile_number'=>'required|string',
            'payment_method'=>'required|string'
        ]);
    }
    public function shippingAndPayment(Request $request){
        $this->validateRequest($request);
        $shipping_id = shipping::insertShipping($request);
        $request->session()->put([
            'shipping_id'=>$shipping_id,
            'payment_method'=>$request->input('payment_method')
        ]);
        return redirect(route('placeOrder'));
    }
    public function placeOrder(){
        $paymentId = Payment::insertPayment(session()->get('payment_method'));

        $cartProducts = cart::cartProducts();
        $total = $this->calcTotal($cartProducts);

        $orderId = Order::insertOrder(auth()->user()->id,
            session()->get('shipping_id'),$paymentId,$total);
        $orderDetails = Order_Details::insertOrderDetails($cartProducts,$orderId);

        cart::deleteCartProducts();
        session()->forget(['shipping_id','payment_method']);

        return redirect(route('home'));
    }
}
