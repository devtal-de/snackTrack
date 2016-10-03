<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Snack;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth.basic');
    }

    public function snacks ()
    {
        $snacks = Snack::all();
        return view('admin.snacks', ['snacks' => $snacks]);
    }

    public function createSnack ()
    {
        return view('admin.create-snack');
    }

    public function storeSnack (Request $request)
    {
     #   return $request->all();
        $snack = new Snack();
        $snack->name = $request->name;
        $snack->weight = $request->weight;
        $snack->price = $request->price;
        $snack->description = '...';
        $snack->image = '-';

        $snack->save();

        if($request->file('pictures.0')->isValid()) {
            $path = $request->file('pictures.0')->storeAs('images', 'snack_' . $snack->id . '.jpg', 'local');
            $snack->image = $path;

            $snack->save();
        }

        return $snack;
    }

}
