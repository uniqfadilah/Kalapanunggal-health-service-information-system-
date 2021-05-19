<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class berobat extends Model
{
    protected $guarded=['id'];
    protected $dates = ['created_at'];
    
    public function biaya(){
        return $this->hasMany('App\detailbiaya');
     }
    public function pasien(){
        return $this->belongsTo('App\pasien');
     }
    public function dokter(){
        return $this->belongsTo('App\dokter');
     }
    public function obat(){
        return $this->hasMany('App\detailobat');
     }
}
