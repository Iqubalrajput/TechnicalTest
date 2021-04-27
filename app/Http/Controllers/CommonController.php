<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommonController extends Controller
{
    public function uploadFile($file,$fileName,$folderName)
    {
    	$file->move('upload_img/'.$folderName.'/',$fileName);
    }
}
