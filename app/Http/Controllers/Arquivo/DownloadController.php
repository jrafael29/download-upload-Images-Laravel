<?php

namespace App\Http\Controllers\Arquivo;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function index(Request $request, $id)
    {
        $image = Image::find($id);
        $imageNome = $image->nome;
        return response()->download(public_path("assets/media/$imageNome"));
    }
}
