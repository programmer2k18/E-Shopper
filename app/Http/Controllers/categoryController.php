<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Middleware\AdminAuth;
class categoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }

   public function index(){
       return view('admin.add_category');
   }

   public function createCategory(Request $request){

       //validate the request data
       $this->validate($request,[
           'category_name'=>'required|max:30|string',
           'description'=>'required|max:500'
       ]);
       //check if exists or not
       $category = Category::where('name','=',strtolower($request->input('category_name')))->first();
       if(!$category){
           $newCategory = new Category();
           $newCategory->name = strtolower($request->input('category_name'));
           $newCategory->description = $request->input('description');
           $newCategory->publication_status = $request->input('publication_status');
           $newCategory->saveOrFail();

           return redirect(route('allCategories'))->
           with('added_msg','Category '.$request->input('category_name').' Added Successfully');
       }
       else{
           return redirect(route('allCategories'))->
           with('msg','Category '.$request->input('category_name').' Already Exists');
       }
   }

   public function allCategories(){
        return view('admin.all_categories')->with('categories',Category::all());
   }

   public function activeOrUnactiveCategory($id,$value,$message){
       Category::where('id','=',$id)->update([
           'publication_status'=>$value
       ]);
       return redirect(route('allCategories'))->
       with('added_msg',$message.' Category successfully');
   }
   public function showEditCategoryForm($id){

       $editedCategory = Category::where('id','=',$id)->first();
       return view('admin.edit_category')->with('category',$editedCategory);
   }
   public function editCategory(Request $request,$id){
       $this->validate($request,[
           'category_name'=>'required|max:30|string',
           'description'=>'required|max:500'
       ]);

       Category::where('id','=',$id)->update([
           'name'=>$request->input('category_name'),
           'description'=>$request->input('description')
       ]);
       return redirect(route('allCategories'))->
       with('added_msg',$request->input('category_name').' Category updated successfully');
   }

   public function deleteCategory($id){

       $deletedCategory = Category::where('id','=',$id)->first();
       Category::where('id','=',$id)->delete();

       return redirect(route('allCategories'))->
       with('added_msg',$deletedCategory->name.' Category deleted successfully');
   }
}
