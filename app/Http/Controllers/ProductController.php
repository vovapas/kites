<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Category;
use App\Model\GV;
use App\Model\Image;
use App\Http\Requests;
use DateTime;


class ProductController extends Controller
{
    /** SITE **/

    public function index($id_category = 0){
        if ($id_category == 0) {
            $listProduct = Product::orderByRaw("RAND()")
                ->take(6)
                ->get();
        }
        else{
            $listProduct = Product::where('id_category', $id_category)->get();
        }

        $rate = GV::all();

        $listCategory = Category::orderBy('lft')
            ->where('is_active', 1)
            ->get();

        if ($id_category != 0){
            $listAncestors = Category::find($id_category)->getAncestorsAndSelf();
            return view('product/product')->with(['listCategory' => $listCategory, 'listProduct' => $listProduct, 'listAncestors' => $listAncestors, 'rate' => $rate]);
        }
        else{
            return view('product/product')->with(['listCategory' => $listCategory, 'listProduct' => $listProduct, 'rate' => $rate]);
        }
    }

    public function show($id_product){
        $product = Product::find($id_product);

        $listCategory = Category::orderBy('lft')
            ->where('is_active', 1)
            ->get();

        $rate = GV::all();

        $listImage = Image::where('id_product', $id_product)->get();

        $listAncestors = Category::find($product->id_category)->getAncestorsAndSelf();

        return view('product/product-show')->with([
            'listCategory' => $listCategory,
            'product' => $product,
            'listAncestors' => $listAncestors,
            'rate' => $rate,
            'listImage' => $listImage
        ]);
    }

    /** ADMIN **/
    
    public function get($id_category = 0){
        if ($id_category == 0) {
            $listProduct = Product::all();
        }
        else{
            $listProduct = Product::where('id_category', $id_category)->get();
        }
        $listCategory = Category::orderBy('lft')
            ->where('is_active', 1)
            ->get();
        return view('admin/product/product')->with(['listProduct' => $listProduct, 'listCategory' =>$listCategory]);
    }

    public function addProduct(){
        $listCategory = Category::orderBy('lft')->get();
        return view('admin/product/product-add')->with('listCategory', $listCategory);
    }

    public function editProduct($id){
        $product = Product::find($id);
        $listCategory = Category::orderBy('lft')
            ->where('is_active', 1)
            ->get();
        return view('admin/product/product-edit')->with(['product' => $product, 'listCategory' => $listCategory]);
    }
    
    public function add(Request $request){
        if  ($request->input('listCategory') == 0){
            return redirect('admin/product/product-add')->with('error', 'Укажите категорию!');
        }
        if (empty($request->input('listCategory2')) || $request->input('listCategory2') == 0){
            if(empty($request->input('listCategory1')) || $request->input('listCategory1') == 0){
                $product = Product::create([
                    'id_category' => $request->input('listCategory'),
                    'name' => $request->input('name'),
                    'price' => $request->input('price'),
                    'description' => $request->input('description'),
                    'amount' => $request->input('amount'),
                    'manufacturer' => $request->input('manufacturer'),
                    'size' => $request->input('size'),
                    'season' => $request->input('season'),
                    'currency' => $request->input('currency')
                ]);
            }
            else{
                $product = Product::create([
                    'id_category' => $request->input('listCategory1'),
                    'name' => $request->input('name'),
                    'price' => $request->input('price'),
                    'description' => $request->input('description'),
                    'amount' => $request->input('amount'),
                    'manufacturer' => $request->input('manufacturer'),
                    'size' => $request->input('size'),
                    'season' => $request->input('season'),
                    'currency' => $request->input('currency')
                ]);
            }
        }
        else{
            $product = Product::create([
                'id_category' => $request->input('listCategory2'),
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'description' => $request->input('description'),
                'amount' => $request->input('amount'),
                'manufacturer' => $request->input('manufacturer'),
                'size' => $request->input('size'),
                'season' => $request->input('season'),
                'currency' => $request->input('currency')
            ]);
        }

        if ($request->hasFile('images')) {
            $files = $request->file('images');
            $k = 1;
            foreach ($files as $file) {
                $dt = new DateTime();
                $image = Image::create([
                    'id_product' => $product->id,
                    'name' => $dt->format('Y-m-d-H-i-s').'-'.$k.'.'.$file->getClientOriginalExtension()
                ]);
                $file->move(storage_path('app/product'),  $image->name);
                $k++;
            }
        }

        return redirect('admin/product');
    }

    public function save(Request $request)
    {
        $product = Product::find($request->input('id_product'));
        $product->name = $request->input('name');
        $product->id_category = $request->input('category');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->amount = $request->input('amount');
        $product->manufacturer = $request->input('manufacturer');
        $product->size = $request->input('size');
        $product->season = $request->input('season');
        $product->currency = $request->input('currency');

        if ($request->hasFile('picture'))
        {
            $image = Image::where('id_product', $product->id)->first();
            if (!empty($image)){
                $dt = new DateTime();
                $file = $request->file('picture');
                $image->name = $dt->format('Y-m-d-H-i-s').'.'.$file->getClientOriginalExtension();
                $file->move(storage_path('app/product'),  $image->name);
                $image->save();
            }
            else{
                $file = $request->file('picture');
                $dt = new DateTime();
                $image = Image::create([
                    'id_product' => $product->id,
                    'name' => $dt->format('Y-m-d-H-i-s').'.'.$file->getClientOriginalExtension()
                ]);
                $file->move(storage_path('app/product'),  $image->name);
            }
        }

        $product->save();
        return redirect('admin/product');
}

    public function adminDestroy($id)
    {
        Product::destroy($id);
        return direct('admin/product', 'Товар успешно удален!', config('app.message_success'));
    }
}
