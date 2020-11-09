<?php

namespace App\Http\Controllers;

use App\comments;
use Illuminate\Http\Request;
use App\products_by_users;
class blogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['blog','blogSingle']);
    }

    public function blog(){
        $activeOrders = products_by_users::allActiveOrders();
        return view('pages.bloge')->with('orders',$activeOrders);
    }

    public function blogSingle(){
        return view('pages.bloge-single');
    }

    private function storeFile(Request $req){
        if ($req->hasFile('image')){
            $file = $req->file('image');
            $fileName = $file->getClientOriginalName();
            $path = $file->storeAs('products_images_by_sellers/',time().'.'.$fileName);
            return $path;
        }
    }

    public function storeOrder(Request $request){
        $path = $this->storeFile($request);
        products_by_users::createOrder($request,$path);
        return redirect(route('blog'))->with('approveMessage','Your product will be available via our platform after confirmation, We will contact you as soon as possible.');
    }
    public function showProductById($id){
        $product = products_by_users::find($id);
        $comments = comments::where('post_product_id','=',$id)->latest()->get();
        return view('pages.bloge-single')->with(['product'=>$product,'comments'=>$comments]);
    }

    public function addComment(Request $request){
        if($request->ajax()){
            $comment = new comments();
            $comment->user_id = auth()->user()->id;
            $comment->user_name = auth()->user()->name;
            $comment->post_product_id = $request->id;
            $comment->comment = $request->comment;
            $comment->saveOrFail();
            return response()->json($comment);
        }
    }

}
