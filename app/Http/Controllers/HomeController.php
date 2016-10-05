<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Snack;
use App\Donation;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth.basic');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $snacks = Snack::all();
        return view('home', [ 'snacks' => $snacks ]);
    }

    public function purchases ()
    {
        $user = Auth::user();

        return view('user.purchases', [ 'user' => $user ]);
    }

    public function donations ()
    {
        $user = Auth::user();
        return view('user.donations', [ 'user' => $user ]);
    }

    public function donate (Request $request)
    {
        $donation = new Donation();
        $donation->user_id = Auth::user()->id;
        $donation->euro = $request->euro;
        $donation->cent = $request->cent;

        $donation->save();
        return redirect()->route('my.donations');
    }

}
