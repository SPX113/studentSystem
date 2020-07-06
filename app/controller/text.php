<?php
namespace app\controller;

use app\validate\User;
use think\Request;
use app\BaseController;
use think\facade\View;

class text
{
//    protected $request;
//    public function __construct(Request $request)
//    {
//        $this->request =$request;
//    }
//    public function index(){
//        return $this->request->param("name");
//    }

    public function index()
    {
//        return \think\facade\Request::param("name");
//        return \think\facade\Request::url(true);
//        dump(\think\facade\Request::header());
        //重定向
//    return redirect(url("database/in"))->with("name","zzh");

        //验证器
//        try { validate(User::class)->check(
//            [ 'name' => '蜡笔小新', 'price' => 90, 'email' => 'xiaoxin@163.com' ]);
//        } catch (ValidateException $e) { dump($e->getError()); }
//        echo strlen("苏佩轩");
        return View::fetch("index",[
            "name" => "苏佩轩",
            "time" => "2020/6/5 11:35:00"
        ]);
    }
}