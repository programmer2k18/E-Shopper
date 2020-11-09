<?php

namespace App\Http\Controllers;
use App\Reviews;
use App\Products;
use App\Order_Details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Middleware\AdminAuth;
class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','admin'])->except([
            'productsByCategory','productsByBrand','viewProduct','searchProducts'
        ]);
    }

    public function index(){
        return view('admin.add_product');
    }

    public function validateRequest(Request $object){
        $this->validate($object,[
            'product_name'=>'required|string',
            'category'=>'required',
            'brand'=>'required',
            'description'=>'required|string',
            'product_price'=>'required',
            'product_color'=>'required|string',
            'product_image'=>'required|image',
            'currency'=>'required',
            'status'=>'required',
            'quantity'=>'required|numeric|between:1,1000',
        ]);
    }

    public function storeFile(Request $req){
        if ($req->hasFile('product_image')){
            $file = $req->file('product_image');
            $fileName = $file->getClientOriginalName();
            $path = $file->storeAs('products_images/',time().'.'.$fileName);
            return $path;
        }
    }
    public function createProduct(Request $request){
            $this->validateRequest($request);

            $product =new Products();
            $product->name = strtolower($request->input('product_name'));
            $product->category_id = $request->input('category');
            $product->brand_id = $request->input('brand');
            $product->seller_id = 1;
            $product->description = $request->input('description');
            $product->price = $request->input('product_price');
            $product->currency = $request->input('currency');
            $product->color = $request->input('product_color');
            $product->size = $request->input('product_size');
            $product->quantity = $request->input('quantity');
            $product->status = $request->input('status');
            $product->publication_status = $request->input('publication_status');
            $product->image = $this->storeFile($request);
            $product->saveOrFail();

            return redirect(route('showProductForm'))->with
            ('added_msg',$request->input('product_name').' Added successfully');
    }

    public function allProducts(){
        $products = Products::where('quantity','>',0)->get();
        return view('admin.all_products')->with('products',$products);
    }

    public function activeOrUnactiveProduct($id,$value,$message){
        Products::where('id','=',$id)->update([
            'publication_status'=>$value
        ]);
        return redirect(route('allProducts'))->
        with('added_msg',$message.' Product successfully');
    }

    public function showProductForm($id){

        $editedProduct = Products::where('id','=',$id)->first();
        return view('admin.edit_product')->with('product',$editedProduct);
    }

    public function editProduct(Request $request,$id){
        $this->validateRequest($request);
        Products::where('id','=',$id)->update([
            'name'=>$request->input('product_name'),
            'description'=>$request->input('description'),
            'category_id'=>$request->input('category'),
            'brand_id'=>$request->input('brand'),
            'quantity'=> $request->input('quantity'),
            'status'=> $request->input('status'),
            'price'=>$request->input('product_price'),
            'currency'=>$request->input('currency'),
            'color'=>$request->input('product_color'),
            'size'=>$request->input('product_size'),
            'publication_status'=>$request->input('publication_status'),
            'image'=>$this->storeFile($request)
        ]);
        return redirect(route('allProducts'))->
        with('added_msg',$request->input('product_name').' Product updated successfully');
    }

    public function deleteProduct($id){

        $deletedProduct = Products::where('id','=',$id)->first();
        Products::where('id','=',$id)->delete();

        return redirect(route('allProducts'))->
        with('added_msg',$deletedProduct->name.' Product deleted successfully');
    }

    public function productsByCategory($id,$categoryName){

        $products = Products::where('category_id','=',$id)->where('quantity','>',0)
            ->where('publication_status','=',1)->paginate(9);

        $topTenProducts = $this->top10Products();
        return view('pages.products_by_category')->with(['products'=>$products,
            'categoryName'=>$categoryName,'top10'=>$topTenProducts]);
    }

    public function productsByBrand($id,$brandName){

        $topTenProducts = $this->top10Products();

        $products = Products::where('brand_id','=',$id)->where('quantity','>',0)
            ->where('publication_status','=',1)->paginate(9);
        return view('pages.products_by_brand')->with(['products'=>$products,
            'brandName'=>$brandName,'top10'=>$topTenProducts]);
    }

    public function top10Products(){
        $topTenIds = Order_Details::topTenIds();
        $testIds = $this->setIds($topTenIds);
        return Products::Top10Products($testIds);

    }

    public function setIds($topTenIds){
        $testIds = array();
        foreach ($topTenIds as $id){
            array_push($testIds,$id->productId);
        }
        return $testIds;
    }

    public function viewProduct($id,$name){

        $reviews = Reviews::allReviewsForProduct($id);
        $product = Products::where('id','=',$id)->first();
        return view('pages.product_details')->with(
            ['product'=>$product,'name'=>$name,'reviews'=>$reviews]
        );
    }
    public function searchProducts(Request $request){
            $searchedProducts = Products::searchForProducts($request->input('word'));
            return view('pages.searchedProducts')->with('products',$searchedProducts);
            //dd($searchedProducts);
    }
}
