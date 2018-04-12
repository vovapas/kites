<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Image;
use App\Http\Requests;
use DateTime;

class ImageController extends Controller
{
    /** ADMIN **/

    public function get($id_product){
        $listImage = Image::where('id_product', $id_product)->get();
        $product = Product::find($id_product);
        return view('admin/product/product-image')->with(['listImage' => $listImage, 'product' => $product]);
    }

    public function add(Request $request){
        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $dt = new DateTime();
            $image = Image::create([
                'id_product' => $request->input('product_id'),
                'name' => $dt->format('Y-m-d-H-i-s').'.'.$file->getClientOriginalExtension()
            ]);
            $file->move(storage_path('app/product'),  $image->name);
        }
        return redirect('admin/product-image/'.$request->input('product_id'));
    }

    public function remove($id){
        $image = Image::find($id);
        $image->delete();
        return redirect('admin/product-image/'.$image->id_product);
    }
}
