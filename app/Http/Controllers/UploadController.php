<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function index()
    {
        return view('upload.upload');
        return getUrl();
    }

    public function proses(Request $req)
    {
        $rules['file']          = 'required';

        $messages = [
            'required'      => ':attribute wajib diisi',
        ];
        $names       =  [
            'file'   => 'File',
        ];
        $req->validate($rules, $messages, $names);
        $file = $_FILES['file'];
        return getResponse(true, 'Upload', $file);
    }
}
