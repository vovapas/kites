<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\GV;
use App\Http\Requests;

class GVController extends Controller
{
    /** ADMIN **/

    public function rate(){
        $listRate = GV::all();
        return view('admin/edit/rate')->with('listRate', $listRate);
    }

    public function rateSave(Request $request){
        $listRate = GV::all();
        foreach ($listRate as $rate) {
            $rate->rate = $request->input($rate->name);
            $rate->save();
        }
//        $listRate->save();
        return redirect('admin/rate');
    }
}
