<?php

namespace app\admin\controller;

class Repair extends Admin
{
    public function index(){
        $data = \think\Db::name('Repair')->field(true)->paginate(5,'ture');
        $this->assign('data',$data);
//        var_dump($data);die;
        $this->assign('page',$data->render());
        $this->assign('meta_title', '菜单列表');
        return $this->fetch();
    }
    public function add()
    {
//       return 'sfwr';die;
        if(request()->isPost()){
            $Repair = model('Repair');
            $post_data=request()->post();
//            dump($post_data);die;
            $validate= validate('Repair');
//            dump($validate->check($post_data));die;
            if($validate->check($post_data)){
                return $this->error($validate->getError());
            }
            $data = $Repair->create($post_data);
            if($data){
                $this->success('新增成功','admin\repair\index');
            } else {
                $this->error($Repair->getError());
            }
        } else {
            $Repair = \think\Db::name('Repair')->field(true)->select();
            $this->assign('Menus', $Repair);
            $this->assign('meta_title','新增报修');
            return $this->fetch('edit');
        }
    }
    //修改报修
    public function edit($id = 0){
        if(request()->isPost()){
            $Repair = model('Repair');
            $post_data=$this->request->post();
            $validate = validate('Repair');
            if($validate->check($post_data)){
                return $this->error($validate->getError());
            }
            $data = $Repair->update($post_data);
            if($data){
                $this->success('更新成功', 'admin\repair\index');
            } else {
                $this->error($Repair->getError());
            }
        } else {
            $info = array();
            $info = \think\Db::name('Repair')->field(true)->find($id);
            $Repair = \think\Db::name('Menu')->field(true)->select();
            $this->assign('Repair', $Repair);
            if(false === $info){
                $this->error('获取后台报修信息错误');
            }
            $this->assign('info', $info);
            $this->assign('meta_title', '编辑报修信息');
            return $this->fetch();
        }
    }
    //删除报修
    public function del(){
        $id = array_unique((array)input('id/a',0));

        if ( empty($id) ) {
            $this->error('请选择要操作的数据!');
        }

        $map = array('id' => array('in', $id) );
        if(\think\Db::name('Repair')->where($map)->delete()){
            $this->success('删除成功');
        } else {
            $this->error('删除失败！');
        }
    }

}