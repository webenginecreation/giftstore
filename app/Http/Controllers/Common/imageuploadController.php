<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class imageuploadController extends Controller
{
    //

    public function orderAttachmentStore(Request $request)
    {

    	$image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('order-images'),$imageName);
        // $imageUpload = new ImageUpload();
        // $imageUpload->filename = $imageName;
        // $imageUpload->save();
        return response()->json(['success'=>$imageName]);

    }
}
