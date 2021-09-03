<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // status
    public function status()
    {
        $array=[
            0=>'معلقة',
            1=>'اتصال',
            2=>'متابعه',
        ];
        return  $array[$this->status];
    }
    //belongsTo
    // owner
    public function owner()
    {
        return $this->belongsTo('App\User','owner_id','id');
    }
    // assigned
    public function assigned()
    {
        return $this->belongsTo('App\User','assigned_id','id');
    }
}
