<?php
/**
 * Created by PhpStorm.
 * User: ps
 * Date: 2017/3/19
 * Time: 15:00
 */
namespace Home\Controller;
class UserController extends CommonController{

    public function select_city(){
        $upid['upid']=$_GET[upid];
        $city=M("city")->where($upid)->select();
        $this->ajaxreturn($city);
    }

    public function deleteAddress(){
        $map[id]=I('post.id');
        $map['pid']=$_SESSION['user']['id'];
        $res=M('address')->where($map)->delete();
        if($res){
            $this->ajaxReturn(true);
        }else{
            $this->ajaxReturn(false);
        }

    }
    public function changeAddress(){
        $map[id]=I('post.id');
        $dataAddress=M('address')->where(array('pid'=>$_SESSION['user']['id']))->select();
        foreach ($dataAddress as $k=>$v){
            if($v['status']==1){
                $savedata['status']=0;
                M('address')->where(array('id'=>$v['id']))->save($savedata);
            }
        }
        $savedata['status']=1;
        $res=M('address')->where($map)->save($savedata);
        if($res){
            $this->ajaxReturn(true);
        }else{
            $this->ajaxReturn(false);
        }
    }

    public function saveAddress()
    {
        $data = I('post.');
        $data['pid'] = $_SESSION['user']['id'];
        foreach ($data as $k => $vo) {
            if (empty($vo)) {
                $this->ajaxReturn(false);
            } else {
                if ($k == "status") {
                    if ($vo == "on") {
                        $data[$k] = 1;
                    } else {
                        $data[$k] = 0;
                    }
                }
            }
        }
        if($data['status']==1){
            $dataAddress=M('address')->where(array('pid'=>$_SESSION['user']['id']))->select();
            foreach ($dataAddress as $k=>$v){
                if($v['status']==1){
                    $savedata['status']=0;
                    M('address')->where(array('id'=>$v['id']))->save($savedata);
                }
            }
        }
       $res= M('address')->add($data);
       if ($res){
           $this->ajaxReturn(true);
       }else{
           $this->ajaxReturn(false);
       }

    }

    public function getAddress(){
        $map['id']=I('post.id');
        $data=M('address')->where($map)->find();
        if(empty($data)){
            $this->ajaxReturn(false);
        }else{
            $this->ajaxReturn($data);
        }
    }
}