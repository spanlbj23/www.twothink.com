<?php
namespace app\admin\model;
use think\Model;

class Repair  extends Model
{
    protected $autoWriteTimestamp = false;
    protected $auto = ['title','name','tel','address','cont'];
    // 新增
//    protected $insert = ['status'=>1];
    //属性修改器
//    protected function setTitleAttr($value, $data)
//    {
//        return htmlspecialchars($value);
//    }
}