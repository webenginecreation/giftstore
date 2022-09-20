<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\SiteConfig;
class siteconfigController extends Controller
{
    //
    public function index()
    {
    	$site_config = SiteConfig::first();
    	return view('Admin.site_config',compact('site_config'));
    }

    public function update(Request $request, $id)
    {
        $data =SiteConfig::find($id);

    	$request->validate([
            'store_name' => 'required | max:50',
            'logo' => 'dimensions:max_width=125,max_height=47',
            'fevicon' => 'dimensions:max_width=32,max_height=32',
            'location' => 'required | max:10',
            'currency' => 'required | max:10',
            'mobile' => 'required',
            'email' => 'required | email',
            'footer_text' => 'required | max:50',
            'address' => 'max:255'
         ]);

        $requestData = $request->all();

        if ($request->hasFile('logo'))
          {
            
            $imageName = time().'.'.$request->logo->getClientOriginalName();
            $request->logo->move(public_path('images'), $imageName);
            $requestData['logo'] = $imageName;
          }
          else
          {
              $requestData['logo'] = $request->old_logo;
          }

          if ($request->hasFile('fevicon'))
          {
            
            $imageName = time().'.'.$request->fevicon->getClientOriginalName();
            $request->fevicon->move(public_path('images'), $imageName);
            $requestData['fevicon'] = $imageName;
          }
          else
          {
              $requestData['fevicon'] = $request->old_fevicon;
          }

          $data->fill($requestData);
          $data->save($requestData);

          return redirect()->route('site.settings')->with('success','Site Config Update Successfully.');
     }
     public function customizeTemplate()
    {
        $site_config = SiteConfig::first();
        return view('Admin.customize_theme',compact('site_config'));
    }


    public function updateTheme(Request $request, $id)
    {
        $data =SiteConfig::find($id);
        $requestData = $request->all();
        $data->fill($requestData);
        $data->save($requestData);
        return redirect()->back()->with('success','Site Config Update Successfully.');
     }
}
