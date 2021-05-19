<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pasien extends Model
{
    protected $guarded=['id'];

    public function berobat(){
        return $this->hasOne('App\berobat');
     }
}
