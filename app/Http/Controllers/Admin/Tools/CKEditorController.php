<?php

namespace App\Http\Controllers\Admin\Tools;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CKEditorController extends Controller
{
    /**
     * @param Request $request
     */
    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {

            //get filename with extension
            $fileNameWithExtension = $request->file('upload')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();

            //filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;

            //Upload File
            $request->file('upload')->storeAs('public/uploads', $fileNameToStore);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url             = asset('storage/uploads/' . $fileNameToStore);
            $msg             = 'Image successfully uploaded';
            $re              = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }
}
