<?php
namespace app\admin\validate;
use think\validate;
class Repair extends validate
{
    protected $rule=[
        ['title','repaire','标题必须填写'],
        ['name','repaire','姓名必须填写'],
        ['tel','repaire','电话必须填写'],
        ['address','repaire','地址必须填写'],
        ['cont','repaire','内容必须填写'],

    ];
}