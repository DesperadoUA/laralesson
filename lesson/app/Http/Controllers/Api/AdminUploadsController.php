<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pages;


class AdminUploadsController extends Controller
{
    const DIR_DOWNLOADS = '/downloads/';
    public function index(Request $request)
    {
        $folderPath = $_SERVER['DOCUMENT_ROOT'].self::DIR_DOWNLOADS;
        $file_data = $request->input('file');
        $image_parts = explode(";base64,", $file_data['base64']);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $uniq_id = uniqid();
        $file = $folderPath . $uniq_id . '.'.$image_type;

        file_put_contents($file, $image_base64);
        $response = [
            'src' => url('/').self::DIR_DOWNLOADS.$uniq_id.'.'.$image_type
        ];
        return response()->json($response);
    }

}
