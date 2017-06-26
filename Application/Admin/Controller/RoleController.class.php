<?php
/**
 * Created by PhpStorm.
 * User: PS
 * Date: 2017/5/31
 * Time: 15:54
 */
namespace Admin\Controller;
class RoleController extends BaseController{
    public function index(){

        $this->display();
    }

    public function add_role(){
        $data=M('auth_rule')->select();
        $arr=\Org\Nx\Data::channelLevel($data,0,'&nbsp;','id');
        $this->assign('arr',$arr);
        $this->display();
    }

    public function getRole(){
        $data=M('auth_group')->select();
        $this->ajaxReturn($data);
    }

    public function add_deal(){
        $obj=getParam();
        $data['rules']=implode(",",$obj['rules']);
        $data['title']=$obj['title'];
        $data['status']=1;
        $res=M('auth_group')->add($data);
        if($res){
            $resData['message']='已添加角色';
            $resData['icon']=1;
        }else{
            $resData['message']="添加角色失败";
            $resData['icon']=0;
        }
        $this->ajaxReturn($resData);
    }

    /**
     * 编辑角色页面
     */
    public function editRole(){
        $map['id']=$_GET['id'];
        $singleData=M('auth_group')->where($map)->find();
        $singleData['rules']=explode(',',$singleData['rules']);
        $data=M('auth_rule')->select();
        $arr=\Org\Nx\Data::channelLevel($data,0,'&nbsp;','id');
        $array=array(
            'arr'=>$arr,
            'single'=>$singleData
        );
        $this->assign($array);
        $this->display('edit_role');
    }

    /**
     * 编辑角色处理
     */
    public function edit_deal(){
        $obj=getParam();
        $map['id']=$obj['id'];
        $obj['rules']=implode(",",$obj['rules']);
        unset($obj['id']);
        $res=M('auth_group')->where($map)->save($obj);
        if($res){
            $resData['message']='更新成功';
            $resData['icon']=1;
        }else{
            $resData['message']='失败';
            $resData['icon']=0;
        }
        $this->ajaxReturn($resData);
    }

    public function delete_deal(){
        $obj=getParam();
        $res=M('auth_group')->where($obj)->delete();
        if($res){
            $resData['message']='删除成功';
            $resData['icon']=1;
        }else{
            $resData['message']='删除失败';
            $resData['icon']=0;
        }
        $this->ajaxReturn($resData);
    }
}