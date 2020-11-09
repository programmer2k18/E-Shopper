<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reviews;
class reviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function reviewProduct(Request $request,$product_id,$product_name){

        $user_id = auth()->user()->id;
        $userName = auth()->user()->name;
        $feedback = $request->input('feedback');
        $rating = $request->input('rating');

        $review = Reviews::where('user_id','=',$user_id)->
        where('product_id','=',$product_id)->first();

        if(!$review){
            Reviews::create([
                'user_id'=>$user_id,
                'product_id'=>$product_id,
                'rating'=>$rating,
                'review'=>$feedback,
                'name'=>$userName
            ]);
            return redirect(route('viewProduct',['id'=>$product_id,'name'=>$product_name]));
        }
        return redirect(route('viewProduct',['id'=>$product_id,'name'=>$product_name]))
            ->with('reviewed',"You already reviewed this product");
    }

    public function deleteReview($id,$name){
        Reviews::deleteById($id);
        return redirect(route('viewProduct',['id'=>$id,'name'=>$name]))
            ->with('reviewed',"You review has been deleted successfully.");
    }
}
