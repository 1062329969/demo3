<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Input;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        if($request->isMethod('post')){
            $data = $request->get('data');
            $count = User::where($data)->count();
            if($count){
                $request->session()->put(['name'=>$data['name'],'password'=>$data['password']]);
                return redirect('/');
            }else{
                return redirect('/userlogin');
            }
        }else{
            return view('userlogin');
        }
    }

    public function outlogin(Request $request){
        $request->session()->flush();
        return redirect('/userlogin');
    }

}
