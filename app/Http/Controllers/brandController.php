<?php

namespace App\Http\Controllers;

use App\manufacture;
use Illuminate\Http\Request;
use App\Http\Middleware\AdminAuth;
class brandController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }
    public function index(){
        return view('admin.add_brand');
    }

    public function createBrand(Request $request){

        //validate the request data
        $this->validate($request,[
            'brand_name'=>'required|max:30|string',
            'description'=>'required|max:500'
        ]);
        //check if exists or not
        $brand = manufacture::where('name','=',strtolower($request->input('brand_name')))->first();
        if(!$brand){
            $newBrand = new manufacture();
            $newBrand->name = strtolower($request->input('brand_name'));
            $newBrand->description = $request->input('description');
            $newBrand->publication_status = $request->input('publication_status');
            $newBrand->saveOrFail();

            return redirect(route('allBrands'))->
            with('added_msg','Brand '.$request->input('brand_name').' Added Successfully');
        }
        else{
            return redirect(route('allBrands'))->
            with('msg','Brand '.$request->input('brand_name').' Already Exists');
        }
    }

    public function allBrands(){
        return view('admin.all_brands')->with('brands',manufacture::all());
    }


    public function activeOrUnactiveBrand($id,$value,$message){
        manufacture::where('id','=',$id)->update([
            'publication_status'=>$value
        ]);
        return redirect(route('allBrands'))->
        with('added_msg',$message.' Brand successfully');
    }

    public function showEditBrandForm($id){

        $editedBrand = manufacture::where('id','=',$id)->first();
        return view('admin.edit_brand')->with('brand',$editedBrand);
    }

    public function editBrand(Request $request,$id){
        $this->validate($request,[
            'brand_name'=>'required|max:30|string',
            'description'=>'required|max:500'
        ]);

        manufacture::where('id','=',$id)->update([
            'name'=>$request->input('brand_name'),
            'description'=>$request->input('description')
        ]);
        return redirect(route('allBrands'))->
        with('added_msg',$request->input('brand_name').' Brand updated successfully');
    }

    public function deleteBrand($id){

        $deletedBrand = manufacture::where('id','=',$id)->first();
        manufacture::where('id','=',$id)->delete();

        return redirect(route('allBrands'))->
        with('added_msg',$deletedBrand->name.' Brand deleted successfully');
    }

}
