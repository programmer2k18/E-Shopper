<?php

namespace App\Http\Controllers;

use App\Products;
use App\cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class cartContrller extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','notAdmin']);
    }

    public function addToCart(Request $request,$id){
        $requestQuantity = $request->input('quantity');
        $price = $request->input('price');
        $availableQuantity = $request->input('availableQuantity');

        $isProductExist = cart::where('product_id','=',$id)
            ->where('user_id','=',auth()->user()->id)
            ->where('sellingStatus','=','pending')->first();

        if($isProductExist){
            cart::where('product_id','=',$id)
                ->where('user_id','=',auth()->user()->id)
                ->where('sellingStatus','=','pending')->update([
                  'requestQuantity'=> $isProductExist->requestQuantity + $requestQuantity,
                  'cost'=> $isProductExist->cost + $requestQuantity*$price
                ]);
        }
        else{
           cart::create([
                'user_id'=>auth()->user()->id,
                'product_id'=>$id,
                'requestQuantity'=>$requestQuantity,
                'cost'=>$requestQuantity*$price,
                'sellingStatus'=>'pending'
            ]);
        }
        Products::where('id','=',$id)->update([
            'quantity'=>$availableQuantity - $requestQuantity
        ]);
        return redirect(route('showCart'));
    }
    public function showCart(){

        $cartProducts = cart::cartProducts();
        $total = $this->calcTotal($cartProducts);

        return view('pages.cart')->with([
            'products'=>$cartProducts,
            'total'=>$total
        ]);
    }
    public function calcTotal($cartproducts){
        $sum = 0;
        foreach ($cartproducts as $product){
            $sum += $product->cost;
        }
        return $sum;
    }

    public function deleteProduct($id){
        $product = cart::where('product_id','=',$id)
        ->where('user_id','=',auth()->user()->id)
        ->where('sellingStatus','=','pending')->delete();

        return redirect(route('showCart'))
        ->with('msg','You deleted a product from your cart!');
    }

    public function deleteAllCartProducts(){

        $product = cart::where('user_id','=',auth()->user()->id)
            ->where('sellingStatus','=','pending')->delete();

        return redirect(route('showCart'))
            ->with('msg','You deleted the all products from your cart!');
    }
}
