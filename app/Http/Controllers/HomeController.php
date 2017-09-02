<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
        $this->middleware('auth');
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

    public function profile ()
    {
        return view('user.profile', [ 'user' => Auth::user() ]);
    }

    public function updateProfile (Request $request)
    {
        $this->validate($request, [
            'password' => 'min:6|max:128|confirmed'
        ]);

        $user = Auth::user();

        if($request->password != '') {
            $user->password = Hash::make($request->password);
            $user->save();
        }
        return '<h1>Successfully changed your password</h1><h3><a href="/">back</h3>';
    }

}
