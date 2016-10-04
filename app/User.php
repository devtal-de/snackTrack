<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Auth;

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function purchases ()
    {
        return $this->hasMany('App\Purchase');
    }

    public function spentMoneySoFar ()
    {
        $user = Auth::user();
        $sum = 0;
        foreach( $user->purchases as $purchase ){
            $sum += $purchase->snack->euro * 100;
            $sum += $purchase->snack->cent;
        }

        return $sum / 100;
    }


}
