<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Alluser extends Model
{
    protected $table = 'alluser';
    //
    public function Userinfo()
    {
        return $this->hasOne('App\Model\Userinfo','id');
    }
}
