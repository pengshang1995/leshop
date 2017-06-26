<?php
/**
 * Created by PhpStorm.
 * User: ps
 * Date: 2017/2/13
 * Time: 15:06
 */
namespace Admin\Controller;
use \Think\Controller;
class PublicController extends Controller{
    public function login(){
        if(isset($_SESSION['adminuser'])){
            $this->error('您已经登录,请勿重复登陆',U('Index/index'));
        }
        $this->display();
    }

    public function doLogin()
    {
        $data=I('post.');
        if(!empty($data['username'])){
            $map=array('username'=>$data['username']);
            $DataSel=M('Admin')->where($map)->find();
            if(empty($DataSel)){
                $this->ajaxReturn('该用户不存在');
            }else{
                $data['password']=md5($data['password']);
                if($data['password']==$DataSel['password']){
                    $_SESSION['adminuser']=$DataSel;
                    $update=array(
                        'logintime'=>time()
                    );
                    D('Admin')->where($map)->save($update);
                    $resData['message']='登录成功';
                    $resData['icon']=1;
                    $this->ajaxReturn($resData);
                }else{
                    $resData['message']='密码错误';
                    $resData['icon']=0;
                    $this->ajaxReturn($resData);
                }
            }
        }else{
            $resData['message']='用户名不能为空';
            $resData['icon']=0;
            $this->ajaxReturn($resData);
        }
    }
    public function logout(){
        unset($_SESSION['adminuser']);
        $this->redirect('Public/login');
    }
}