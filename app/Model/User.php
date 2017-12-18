<?php

namespace App\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
//    use SoftDeletes;
    protected $table = 'users';



    protected $order = '';

//    public function delete($id){
//        return DB::table('users')->where('id', '=', $id)->delete();
//    }
}
