<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use EndaEditor;
class UploadFileController extends Controller
{
    public function img()
    {
        $data = EndaEditor::uploadImgFile('uploads/images');
        return json_encode($data);
    }
}