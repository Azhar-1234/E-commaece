<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BackEnd\Slider;
class sliderController extends Controller
{
    public function addSlider(){  
        $images = Slider::get();
    	return view('backend.slider.add-slider',compact('images'));
    }
    public function upload(Request $request)
    {
    	$this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $input['image'] = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('uploads/slider/'), $input['image']);
        Slider::create($input);
    	return redirect('manage-slider')->with('success','Image Uploaded successfully.');
    	return back()->with('danger','Image doesnt Uploade.');
    }
    public function destroy($id)
    { 
        Slider::destroy($id);
    	return back()->with('success','Image removed successfully.');	
    }

    public function manageSlider(){
        $images = Slider::all();
    	return view('backend.slider.manage-slider',compact('images'));
    }
}
