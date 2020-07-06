<?php


namespace app\controller;
use app\model\Course;
use app\model\Subject;
use app\model\User;
use think\facade\Db;
use think\facade\Request;
use think\facade\Session;
use think\facade\View;

class Show
{
    //主页
    public function index()
    {
        $login=Session::get("login");
        if($login)      //判断环境
        {
            return View::fetch("index",[
                "login" => $login]);
        }else{
            return View::fetch("login");
        }

    }

    //登陆页面
    public function login()
    {
        return View::fetch("login");
    }



    //注册页面
    public function register()
    {
        return View::fetch("register");
    }



    //管理课程页面
    public function coursemanagement()
    {
        $id=Session::get("login")['id'];
        //查出这个id所选的课程
        $sql="select * from tb_course where id in (select courseid from tb_studentcourse where(id=$id)) order by id";
        $value=Db::query($sql);

        return  View::fetch("coursemanagement",[
            "course"    =>  $value
        ]);
    }




    //可选课查询
    public function courseselection()
    {
        $course=Db::name("course")->paginate(8);
        return View::fetch("courseSelection",[
            "course"    =>$course
        ]);
    }


    //成绩查询
    public function scores()
    {
        $id=Session::get("login")["id"];
        $sql="select * from tb_course join tb_studentcourse on tb_course.id= tb_studentcourse.courseid where tb_studentcourse.id=$id order by courseid";
        $scores=Db::query($sql);
//        dump($scores);
        return View::fetch("scores",[
            "scores"    =>$scores
        ]);
    }



    //学分总和
    public function redit()
    {

    }


    //管理员
    public  function administrators()
    {
        return  View::fetch("administrators");
    }

    public function adm()
    {

        $mode=Request::post("mode");
        $data=Request::post("data");
        if($mode=="账号") {
            $value = Db::name("user")->where("id", $data)->select();
        }
        else {
            $value = Db::name("user")->where("name", $data)->select();
        }
        if(!$value->isEmpty())
        {
            return $value[0];
        }
        else
        {
            return "404";
        }

    }

    //管理员删除操作
    public function delete()
    {
        $data=Request::post("data");
        Db::name("user")->where("id",$data)->delete();
        Db::name("studentcourse")->where("id",$data)->delete();

    }

    //管理员成绩导入
    public function cjdr()
    {
        $id=Request::post("id");
        $courseid=Request::post("courseid");
        $scores =Request::post("scores");
        $point=Request::post("point");
        $value=Db::name("studentcourse")->where([
            "id"    =>  $id,
            "courseid"  =>  $courseid
        ])->select();
        if($value->isEmpty())
        {
            return "该学生没有选择该课程";
        }
        else{
            Db::name("studentcourse")->where([
                "id"    => $id,
                "courseid"  =>  $courseid
            ])->save([
                "scores"    =>  $scores,
                "point"     =>  $point
            ]);
            return "操作成功";
        }
    }


    //管理员删除课程
    public function delcourse()
    {
        $delid=Request::post("delid");
        $delcourseid=Request::post("delcourseid");
        $value=Db::name("studentcourse")->where([
            "id"    =>  $delid,
            "courseid"  =>  $delcourseid
        ]);
        if($value->select()->isEmpty())
        {
            return "该学生并没有选秀该门课程";
        }
        else{
            $value->delete();
            return "删除成功";
        }
    }

    //管理员发布公告
    public function notice()
    {
        $message =Request::post("message");
        Db::name("notice")->insert([
            "message"   => $message
        ]);
        Session::set("notice",$message);
        return "发布成功!";
    }

    //公告获取
//    public function getnotice()
//    {
//        $value=Db::name("notice")->find();
////        return $value["message"];
//        if(empty($value))
//        {
//            return "没有通告";
//        }
//        else
//        {
//            return $value["message"];
//        }
//    }



    //个人信息
    public function information()
    {
        return View::fetch("information");
    }

    //退出
    public function exit()
    {
        Session::clear();
        return View::fetch("login");
    }

}