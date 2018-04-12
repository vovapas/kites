<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Places;
use App\Http\Requests;
use DateTime;

class PlacesController extends Controller
{
    /* SITE */
    public function index()
    {
        $listPlaces = Places::all();
        return view('places.places')->with('listPlaces', $listPlaces);
    }

    /* ADMIN */
    public function indexAdmin(){
        $listPlaces = Places::all();
        return view('admin/places/places')->with('listPlaces', $listPlaces);
    }

    public function addPlaces(){
        return view('admin/places/places-add');
    }

    public  function add(Request $request){
        $places = Places::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'wind' => $request->input('wind'),
            'level' => $request->input('level'),
            'minuses' => $request->input('minuses')
        ]);

        if ($request->hasFile('picture1'))
        {
            $file = $request->file('picture1');
            $dt = new DateTime();
            $places->picture1 = $dt->format('Y-m-d-H-i-s').'.'.$file->getClientOriginalExtension();
            $places->save();
            $file->move(storage_path('app/places'),  $places->picture1);
            sleep(1.1);
        }

        if ($request->hasFile('picture2'))
        {
            $file = $request->file('picture2');
            $dt = new DateTime();
            $places->picture2 = $dt->format('Y-m-d-H-i-s').'.'.$file->getClientOriginalExtension();
            $places->save();
            $file->move(storage_path('app/places'),  $places->picture2);
            sleep(1.1);
        }

        if ($request->hasFile('picture3'))
        {
            $file = $request->file('picture3');
            $dt = new DateTime();
            $places->picture3 = $dt->format('Y-m-d-H-i-s').'.'.$file->getClientOriginalExtension();
            $places->save();
            $file->move(storage_path('app/places'),  $places->picture3);
        }
        return redirect('admin/places');
    }

    public function editPlaces($id){
        $places = Places::find($id);
        return view('admin/places/places-edit')->with('places', $places);
    }

    public function save(Request $request){
        $places = Places::find($request->input('id'));
        $places->name = $request->input('name');
        $places->description = $request->input('description');
        $places->wind = $request->input('wind');
        $places->level = $request->input('level');
        $places->minuses = $request->input('minuses');

        if ($request->hasFile('picture1'))
        {
            $file = $request->file('picture1');
            $dt = new DateTime();
            $places->picture1 = $dt->format('Y-m-d-H-i-s').'.'.$file->getClientOriginalExtension();
            $places->save();
            $file->move(storage_path('app/places'),  $places->picture1);
            sleep(1.1);
        }
        if ($request->hasFile('picture2'))
        {
            $file = $request->file('picture2');
            $dt = new DateTime();
            $places->picture2 = $dt->format('Y-m-d-H-i-s').'.'.$file->getClientOriginalExtension();
            $places->save();
            $file->move(storage_path('app/places'),  $places->picture2);
            sleep(1.1);
        }
        if ($request->hasFile('picture3'))
        {
            $file = $request->file('picture3');
            $dt = new DateTime();
            $places->picture3 = $dt->format('Y-m-d-H-i-s').'.'.$file->getClientOriginalExtension();
            $places->save();
            $file->move(storage_path('app/places'),  $places->picture3);
        }
        $places->save();

        return redirect('admin/places');
    }

    public function destroy($id){
        Places::destroy($id);
        return direct('admin/places', 'Место успешно удалено!', config('app.message_success'));
    }
}
