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
use iscms\Alisms\SendsmsPusher as Sms;

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
//        $path = $request->file('file')->store('public/uploads');
        $file = $request->file('file');
        if($file->isValid()){
            //原文件名
            $originalName = $file->getClientOriginalName();
            //扩展
            $ext = $file->getClientOriginalExtension();
            //Mime type
            $type = $file->getClientMimeType();
            //临时绝对路径
            $realpath = $file->getRealPath();
            $filename = date('Y-m-d-H-i-s').'_'.uniqid().'.'.$ext;
            $bool = Storage::disk('uploads')->put($filename,file_get_contents($realpath));
            if($bool){
                $path = $filename;
            }else{
                $path = '';
            }
        }else{
            $path = '';
        }
        $this->validate($request, [
            'data.name' => 'required',
            'data.password' => 'required',
        ],[
            'required'=>':attribute 为必填项',
        ],[
            'data.name'=>'姓名',
            'data.password'=>'密码',
        ]);
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
            return view('home/edit',$info);
        }
    }

    public function excelexport(){
        $cellData = [
            ['ID','姓名','密码'],
        ];
        $user = User::orderBy('id','desc')->get(['id','name','password']);
        $temp = array();
        foreach ($user as $k => $v){
            $temp[] = [$v->id,$v->name,$v->password];
        }
        $cellData +=$temp;
        Excel::create('学生成绩',function($excel) use ($cellData){
            $excel->sheet('score', function($sheet) use ($cellData){
                $sheet->rows($cellData);
            });
        })->export('xls');
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
//        $user = Redis::get('test');
//        dd($user);
        $info = Alluser::find(10)->userinfo;
        var_dump($info);
    }

    public function send_sms(Sms $sms)
    {
        $phone = '15101573480'; // 用户手机号，接收验证码
        $name = '干点活';  // 短信签名,可以在阿里大鱼的管理中心看到
        $num = rand(100000, 999999); // 生成随机验证码
        $smsParams = [
            'code' => $num,
            'product' => '干点活'
        ];
        $content = json_encode($smsParams); // 转换成json格式的
        $code = "SMS_76025500";   // 阿里大于(鱼)短信模板ID
        $result = $sms->send($phone, $name, $content, $code);
        dd($result);
    }
}
