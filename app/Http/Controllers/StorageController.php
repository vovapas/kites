<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests;

class StorageController extends Controller
{
    public function getFile($encryptName)
    {
        $file = Storage::get(decrypt($encryptName));
        return response($file, 200)->header('Content-Type', 'image/jpeg');
    }
}
