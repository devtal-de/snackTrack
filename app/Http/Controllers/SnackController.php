<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Snack;
use App\Purchase;
use Auth;

class SnackController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth.basic');
    }

    public function buy ($id)
    {
        $user = Auth::user();
        $snack = Snack::find($id);

        $purchase = new Purchase();
        $purchase->user_id = $user->id;
        $purchase->snack_id = $snack->id;

        $user->purchases()->save($purchase);

        return redirect()->route('snacks'); #$user->name . ' kauft ' . $snack->name . ' für ' . $snack->price . ' €';
    }

}
