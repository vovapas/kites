<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\Category;
use Baum\Node;

class CategoryController extends Controller
{




    /** ADMIN **/
    
    public function get(){
        $listCategory = Category::orderBy('lft')
            ->where('is_active', 1)
            ->get();
        return view('admin/category/category')->with('listCategory', $listCategory);
    }
 

    public function newChild(Request $request){
        if(!$request->ajax())
            return;
        if($request->input('id-parent') == 0){
            Category::create(['name' => $request->input('name')]);
        }
        else{
            if($request->input('type-modal') == 'edit'){
                $root = Category::where('id', $request->input('id-parent'))->first();
                $root->name = $request->input('name');
                $root->save();
            }
            else{
                $root = Category::where('id', $request->input('id-parent'))->first();
                $root->children()->create(['name' => $request->input('name')]);
            }
        }
    }

    public function selCat(Request $request){
        if(!$request->ajax())
            return;

        if ($request->input('id') == 0)
            return 0;

        $listChildren = Category::find($request->input('id'))->children()->get();

        if (count($listChildren) == 0)
            return 0;

        $result = "<option selected value='0'>
                       ...
                   </option>";
        foreach($listChildren as $children){
            if ($children->is_active == 1){
                $result = $result . "<option value='".$children->id."'>";
                $result = $result . $children->name;
                $result = $result . "</option>";
            }
        };
        return $result;
    }

    public function CategoryEditProduct(Request $request){
        if(!$request->ajax())
            return;
        $category = Category::find($request->input('id'));
        $array[0] = $category->id;
        $array[1] = $category->name;
      return $array;
    }

    public function adminDestroy($id){
        $node = Category::find($id);
        $listNode = $node->getImmediateDescendants();
        if (count($node->getImmediateDescendants()) != 0)
            foreach ($listNode as $nod){
                if (count($nod->getImmediateDescendants()) != 0){
                    $listNod = $nod->getLeaves();
                    foreach ($listNod as $no){
                        $no->delete();
                        $no->is_active = '0';
                        $no->save();
                    }
                }
                $nod->delete();
                $nod->is_active = '0';
                $nod->save();
            }
        $node->delete();
        $node->is_active = '0';
        $node->save();
        return redirect('admin/category');
    }
}
