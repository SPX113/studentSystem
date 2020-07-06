<?php


namespace app\model;


use think\Model ;
use think\model\relation\HasOne;

class User extends Model
{
    //1v1
//    public function curriculum()
//    {
//        return $this->hasOne(curriculum::class,"user_id","ID");
//    }

}