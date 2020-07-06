<?php


namespace app\controller;
use think\facade\Db;
use think\facade\Request;
use think\facade\Session;

class DataBase
{
    //登陆检测
    public function check()
    {
        if(!captcha_check(input('post.verificationCode')))
        {
            return 1;
        }
        $user=Request::post("user");
        $password=Request::post("pwd");
        $value=Db::name("user")->where([
            "id"    =>   "$user",
            "password"  =>  "$password"
        ])->select();
        if($value->isEmpty()){
            return 2;
        }
        else{
            //成功登陆
            Session::set("login",$value[0]);
            //取出公告
            $message=Db::name("notice")->order("create_time","desc")->select();
            if($message->isEmpty())
            {
                Session::set("notice","没有通告") ;
            }
            else
            {
                Session::set("notice",$message[0]["message"]);
            }
            return 200;
        }


    }

    //用户注册
    public function register()
    {
        $user=Request::post("user");
        $user_check=Db::name("user")->where("id",$user)->select();
        if ($user_check->isEmpty()) {
            $name = Request::post("name");
            if(!is_numeric($user))
            {
                return 3;
            }
            $password = Request::post("password");
            $dept = Request::post("dept");
            $major = Request::post("major");
            $gender = Request::post("gender");
            Db::name("user")->insert([
                "id" => $user,
                "name" => $name,
                "dept" => $dept,
                "password" => $password,
                "major" => $major,
                "gender" => $gender
            ]);
            return 1;
        }
        else{
            return 2;
        }

    }


    //网上选课
    public function select()
    {
        $select=Request::post("select");
        $login=Session::get("login");
        $id=$login["id"];
        $time=date('Y-m-d h:i:s', time());;
        foreach ($select as $value)
        {
            $data=[
                "id"    =>  $id,
                "courseid"  =>  $value
            ];
            $cc=Db::name("studentcourse")->where($data)->select()->isEmpty();
            if($cc){
                Db::name("studentcourse")->save($data);
            }
        }
    }


    //修改个人信息
    public function xiugai()
    {
        $id=Session::get("login")["id"];
        $name=Request::post("name");
        $dept=Request::post("dept");
        $major=Request::post("major");
        Db::name("user")->where("id",$id)->save([
            "name"  =>  $name,
            "dept"  =>  $dept,
            "major" =>  $major
        ]);
        $login=Db::name("user")->where("id",$id)->select();
        Session::set("login",$login[0]);
    }
}