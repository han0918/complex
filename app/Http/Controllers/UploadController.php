<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function uploadpic(Request $request)
    {
        if(!$request->isMethod('post')){
            return response()->json(['code' => '1','msg' => '请上传文件']);
        }
        $file = $request->file('upload_file0');
//        $originalName = $file->getClientOriginalName();
        $ext = $file->getClientOriginalExtension();

        $type = $file->getClientMimeType();
        $size = $file->getSize();
//        $realPath = $file->getRealPath();

        $img = \Image::make($file->getRealPath());
        $img->orientate();
        $width=$img->getWidth();
        $height=$img->getHeight();
        $tw=$width;
        $th=$height;
        if($width-$height>0){

            if($width > 200 && $height > 200) {

                $tw = 200;
                $th = 200;
            }elseif($width > 200){

                $tw = 200;
                $th = 200;
            }elseif($height > 200){

                $tw = 200;
                $th = 200;
            }
        }else{
            if($height > 200 && $width > 200){

                $tw=200;
                $th=200;
            }
        }

        $filename = date('YmdHis').'.'.$ext;
        $re = $img->fit($tw,$th)->save('uploads/'.$filename);
        if($size > 5*1024*1024){
            return response()->json(['code' => '1','msg'=>'上传文件不能超过5M']);
        }
        if(!empty($re->basename)){
            $imgurl = '/uploads/'.$filename;
            return response()->json(['code' => '0','msg' => '上传成功','imgurl' => $imgurl]);
        }else{
            return response()->json(['code' => '1','msg' => '上传失败']);
        }

    }
}
