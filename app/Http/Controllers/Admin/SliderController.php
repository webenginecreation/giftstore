<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Slider;
use File;

class SliderController extends Controller
{
    //

    public function index()
    {
    	$allBanners = Slider::all();
    	return view('Admin.add_sliders')->with('allBanners',$allBanners);
    }

    public function store(Request $request)
    {
    	
    	 

    	if($request->slider_text == 1)
    	{
			$request->validate([
			'slider_image' => 'required', 	
            'title_1' => 'required',
            'title_2' => 'required',
            'banner_link' => 'required',
            'title_2' => 'required',
          ]);    		
    	}

    	else
    	{
    		 $request->validate([
            'slider_image' => 'required',
            'position' => 'required',
          ]);

    	}

    	  $requestData = $request->all();

    	 if ($request->hasFile('slider_image'))
          {
            
            $imageName = time().'.'.$request->slider_image->getClientOriginalName();
            $request->slider_image->move(public_path('slider_image'), $imageName);
            $requestData['slider_image'] = $imageName;
          }

          Slider::create($requestData);
         return redirect()->route('add-sliders')
         ->with('success','Slider added successfully.');
     }

     public function delete($id)
     {

     	  $res = Slider::find($id);
        $image_path = "/slider_image/" . $res->slider_image;
        // Value is not URL but directory file path
        if (File::exists(public_path($image_path)))
        {
            File::delete(public_path($image_path));
        }
        $res = Slider::where('id', $id)->delete();
        return redirect()
            ->route('add-sliders')
            ->with('error', 'Delete Media & Slider Successfully');

     }

}
