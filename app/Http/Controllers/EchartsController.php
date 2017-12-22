<?php

namespace App\Http\Controllers;

use App\Model\Alluser;
use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class EchartsController extends Controller
{
    public function map(){
        return view('echarts/map');
    }
}
