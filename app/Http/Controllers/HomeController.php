<?php

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Input;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        $where = array(
//            array('sex','>',0),
//            array('email','!=','NULL'),
//        );
        $data['list'] = User::orderBy('id','desc')->paginate(5);
        return view('home/home',$data);
    }

    public function add(){
        return view('home/add');
    }

    public function doadd(Request $request){
        $path = $request->file('file')->store('public/uploads');
        $data = $request->get('data');
        $data['img'] = $path;
        $User = new User();
//        getLastSql();
        $res = $User->insert($data);
        if($res){
            return redirect('home')->with('success','添加成功');
        }else{
            return redirect()->back();
        }
//        echo('<pre>');var_dump($data);die('</pre>');
    }

    public function delete(Request $request){
        $id = $request->get('id');
//        dd($id);
        $User = User::find($id);
//        User::where('id', '=', $id)->delete();

        if( $User->delete()){
            echo '删除成功';
        }else{
            echo '删除失败';
        }
    }

    public function edit(Request $request,$id){
        $info['user'] = User::find($id);
        if($request->isMethod('post')){
            $path = $request->file('file')->store('public/uploads');
            $data = $request->get('data');
            $data['img'] = $path;
            User::where('id', $id)->update($data);
            return redirect('/')->with('success','添加成功');
        }else{
            $info['edit'] = 1;
            return view('home/add',$info);
        }
    }

    public function session1(Request $request){
/*        $request->session()->put(['key1'=>'value']);
        echo $request->session()->get('key1');
        session()->put('key2','value2');
        echo session()->get('key2');

        Session::put('key3','value3');
        echo Session::get('key3','value3');
        echo Session::get('key5','value5');*/

        Session::put(['k1'=>'v1','k2'=>'v2']);
    }
    public function session2(Request $request){
//        echo Session::get('k2');
        $user = Redis::get('test');
        dd($user);
    }
}
