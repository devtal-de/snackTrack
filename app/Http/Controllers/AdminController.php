<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Snack;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /*
     * Admin Snackoverview
     * void
     */
    public function snacks ()
    {
        $snacks = Snack::all();
        return view('admin.snacks', ['snacks' => $snacks]);
    }

    /*
     * show snack form
     *
     */
    public function createSnack ()
    {
        return view('admin.create-snack');
    }

    /*
     * store new snack to db
     * Request $request
     *
     */
    public function storeSnack (Request $request)
    {
        $snack = new Snack();
        $snack->name = $request->name;
        $snack->weight = $request->weight;
        $snack->euro = $request->euro;
        $snack->cent = $request->cent;
        $snack->description = 'This is a snack.';
        $snack->image = 'images/no_image.png';

        $snack->save();

        if ($request->file('pictures') != '') {
            if($request->file('pictures.0')->isValid()) {
                $path = $request->file('pictures.0')->storeAs('images', 'snack_' . $snack->id . '.jpg', 'local');
                $snack->image = $path;

                $snack->save();
            }
        }

        return redirect()->route('admin.snacks');
    }

    /*
     * show snack edit form
     */
    public function editSnack ($id)
    {
        $snack = Snack::find($id);
        if( $snack == '') {
            return abort(404);
        }

        return view('admin.edit-snack', [ 'snack' => $snack ]);
    }

    /*
     * persist changes to db
     * Request $request, $id
     */
    public function updateSnack (Request $request, $id)
    {
        $snack = Snack::find($id);
        if( $snack == '') {
            return abort('404');
        }

        $snack->name = $request->name;
        $snack->weight = $request->weight;
        $snack->euro = $request->euro;
        $snack->cent = $request->cent;

        $snack->description = 'This is a snack.';

        if ($request->file('pictures') != '') {
            if($request->file('pictures.0')->isValid()) {
                $path = $request->file('pictures.0')->storeAs('images', 'snack_' . $snack->id . '.jpg', 'local');
                $snack->image = $path;
            }
        }
        $snack->save();

        return redirect()->route('admin.snacks');

    }

}
