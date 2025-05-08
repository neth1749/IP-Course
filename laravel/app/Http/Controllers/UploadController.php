<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        // Validate the request
        $request->validate([
            'document' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $file = $request->file('document');
        $extension= strtolower($file->getClientOriginalExtension());
        $fileName = uniqid() . '.' . $extension;

            //upload to local
        $local_path = $file->storeAs('upload_image',$fileName, 'public');
        // $local_thambnal=$file->storeAs('thambnal_image')



        // Save original file to MinIO
        $fileContents = file_get_contents($file->getRealPath());
        $minio_path = 'uploads_image/' . $fileName;
        Storage::disk('minio')->put($minio_path, $fileContents);

        // Save thambnal  file to MinIO
        $thambnal_path = null;
        if(in_array($extension,['jpg','jpeg','png'])){
            $image = Image::make($file)->resize(
                200,
                200,
                function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                }
            )->encode($extension);

            $thambnal_path = 'thumbnails/' . $fileName;
            Storage::disk('minio')->put($thambnal_path, (string) $image);
        }





        // Return JSON response
        return response()->json([
            'local_path' => $local_path,
            'thambnal_path' => $thambnal_path,
            'minio_path'=>$minio_path,
        ]);
    }
}
