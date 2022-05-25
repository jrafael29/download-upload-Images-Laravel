<?php

namespace App\Http\Controllers\Arquivo;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    public function destroy($id)
    {
        $image = Image::find($id);
        File::delete(public_path('assets/media/'.$image->nome));
        $image->delete();
        return redirect()->route('home');
    }
}
