<?php

namespace App\Http\Controllers;

use App\Model\SecondHand;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\SecondHandCategory;

class SecondHandController extends Controller
{
    public function index(){
        $listCategory = SecondHandCategory::all();
        $listProduct = SecondHand::all();
        return view('second-hand/second-hand')->with(['listCategory' => $listCategory, 'listProduct' => $listProduct]);
    }

    public function create(Request $request){

        if (!str_contains($request->input('description'), 'http'))
        {
            $product = SecondHand::create([
                'name' => $request->input('name'),
                'id_category'  => $request->input('listCategory'),
                'price' => $request->input('price'),
                'description' => $request->input('description'),
                'user_name' => $request->input('user-name'),
                'user_town' => $request->input('town'),
                'user_phone' => $request->input('phone'),
                'picture' => 'nophoto.jpg'
            ]);

            if ($request->hasFile('picture'))
            {
                $file = $request->file('picture');
                $product->picture = $product->id.'.'.$file->getClientOriginalExtension();
                $file->move(storage_path('app/secondHand'),  $product->picture);
                $product->save();
            }
        }        

        return redirect()->back();
    }

    /* ADMIN */
    public function adminIndex(){
        $listProduct = SecondHand::all();
        return view('admin/second-hand/second-hand')->with(['listProduct' => $listProduct]);
    }

    public function destroy($id){
        $product = SecondHand::find($id);
        $product->delete();
        return redirect('admin/second-hand');
    }
}
