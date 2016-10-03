<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    public function snack ()
    {
        return $this->hasOne('App\Snack', 'id', 'snack_id');
    }

}
