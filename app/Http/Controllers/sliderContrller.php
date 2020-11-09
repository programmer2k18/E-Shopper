<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;

class sliderContrller extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }
    public function index(){
        return view('admin.add_slider');
    }
    public function validateRequest(Request $object){
        $this->validate($object,[
            'slider_heading'=>'required|string',
            'description'=>'required|string',
            'slider_image'=>'required|image',
        ]);
    }
    public function storeFile(Request $req){
        if ($req->hasFile('slider_image')){
            $file = $req->file('slider_image');
            $fileName = $file->getClientOriginalName();
            $path = $file->storeAs('sliders_images/',time().'.'.$fileName);
            return $path;
        }
    }
    public function createSlider(Request $request){
        $this->validateRequest($request);
        $slider = new Slider();
        $slider->heading = $request->input('slider_heading');
        $slider->image = $this->storeFile($request);
        $slider->description = trim($request->input('description'));
        $slider->publication_status = $request->input('publication_status');
        $slider->saveOrFail();
        return redirect(route('allSliders'))->with
        ('added_msg',$request->input('slider_heading').' Added successfully');
    }
    public function allSliders(){
        $sliders = Slider::all();
        return view('admin.all_sliders')->with('sliders',$sliders);
    }

    public function activeOrUnactiveSlider($id,$value,$message){
        Slider::where('id','=',$id)->update([
            'publication_status'=>$value
        ]);
        return redirect(route('allSliders'))->
        with('added_msg',$message.' Slider successfully');
    }

    public function showEditSliderForm($id){

        $editedSlider = Slider::where('id','=',$id)->first();
        return view('admin.edit_slider')->with('slider',$editedSlider);
    }

    public function editSlider(Request $request,$id){
        $this->validateRequest($request);
        Slider::where('id','=',$id)->update([
            'heading'=>$request->input('slider_heading'),
            'description'=>$request->input('description'),
            'publication_status'=>$request->input('publication_status'),
            'image'=>$this->storeFile($request)
        ]);
        return redirect(route('allSliders'))->
        with('added_msg',$request->input('slider_heading').' Slider updated successfully');
    }

    public function deleteSlider($id){

        $deletedProduct = Slider::where('id','=',$id)->first();
        Slider::where('id','=',$id)->delete();

        return redirect(route('allSliders'))->
        with('added_msg',$deletedProduct->name.' Slider deleted successfully');
    }
}