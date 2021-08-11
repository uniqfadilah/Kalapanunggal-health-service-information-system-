<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detailobat extends Model
{
    protected $guarded=['id'];
    public function oba(){
        return $this->hasOne('App\obat','id',"obat_id");
     }
}
