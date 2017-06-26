<?php
/**
 * Created by PhpStorm.
 * User: PS
 * Date: 2017/5/17
 * Time: 15:02
 */
namespace Admin\Controller;
class AdminController extends BaseController{

    public function admin_list(){
        $this->display();
    }

    /**
     * 编辑页面获取
     */
    public function admin_edit(){
        $this->assign('id',$_GET['id']);
        $this->display();
    }

    /**
     * 更新操作
     */
    public function update_admin_deal(){
        $postData =file_get_contents('php://input', true);
        $obj=json_decode($postData,true);
        $map=array(
            'id'=>$obj['id']
        );
        $res=M('admin')->where($map)->save($obj);
        if($res){
            $data['icon']=1;
            $data['message']='更新成功';
        }else{
            $data['icon']=0;
            $data['message']="更新失败";
        }
        $this->ajaxReturn($data);
    }

    /**
     * 获取一个管理员信息
     */
    public function getOneAdmin(){
        $postData =file_get_contents('php://input', true);
        $obj=json_decode($postData,true);
        $data['records']=M('admin')->field('password',true)->where($obj)->find();
        $this->ajaxReturn($data);
    }

    /**
     * 获取管理员列表
     */

    public function getAdminList(){
       $adminList = M('admin')->select();
       $data['records']=$adminList;
       $this->ajaxReturn($data);
    }

    /**
     * 添加管理员操作
     */
    public function add_admin_deal(){
        $postData =file_get_contents('php://input', true);
        $obj=json_decode($postData,true);
        if($obj['password']==$obj['password2']){
            $map=array(
                'username'=>$obj['username']
            );
            $existUser=M('admin')->where($map)->find();
            if(empty($existUser)){
                $obj['password']=md5($obj['password']);
                $obj['addtime']=time();
                $res=M('admin')->add($obj);
                if($res){
                   $group_user['uid']=$res;
                   $group_user['group_id']=$obj['adminRole'];
                   M('auth_group_access')->add($group_user);
                }
            }else{
                $data['message']="用户名已存在";
                $data['icon']=0;
            }

        }else{
            $data['icon']=0;
            $data['message']='密码不一致';
        }

        if($res){
            $data['res']=$obj;
            $data['message']="添加成功";
            $data['icon']=1;
        }
        $this->ajaxReturn($data);
    }

    /**
     * 启用管理员
     */
    public function admin_start(){
        $postData =file_get_contents('php://input', true);
        $obj=json_decode($postData,true);
        $updateData=array(
            'status'=>1
        );
        $res=M('admin')->where($obj)->save($updateData);
        if($res){
            $data['message']='已启用';
            $data['icon']=1;
        }
        $this->ajaxReturn($data);
    }

    /**
     * 禁用管理员
     */
    public function admin_stop(){
        $postData =file_get_contents('php://input', true);
        $obj=json_decode($postData,true);
        $updateData=array(
            'status'=>0
        );
        $res=M('admin')->where($obj)->save($updateData);
        if($res){
            $data['message']='已停用';
            $data['icon']=5;
        }
        $this->ajaxReturn($data);
    }

    public function admin_del(){
        $postData =file_get_contents('php://input', true);
        $obj=json_decode($postData,true);
        $map['id']=$obj['id'];
        $res=M('admin')->where($map)->delete();
        if($res){
            $data['message']='已删除';
            $data['icon']=1;
        }else{
            $data['message']='删除失败';
            $data['icon']=0;
        }
        $this->ajaxReturn($data);
    }


    public function add_admin(){
        $this->display();
    }

}