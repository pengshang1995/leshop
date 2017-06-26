<?php
/**
 * Created by PhpStorm.
 * User: ps
 * Date: 2017/2/7
 * Time: 15:51
 */
namespace Home\Controller;
use \Think\Controller;
class PublicController extends Controller{
    public function login(){
        if (isset($_SESSION['user'])){
            $this->redirect('Index/index');
        }
        $this->display();
    }
    /**
     * 登陆验证
     */
    public function do_login(){
        if(IS_POST){
            $data['email']=$this->test_input($_POST['email']);
            $data['password']=$this->test_input($_POST['password']);
            $res=M('user')->where("email='".$data['email']."'")->find();
            if (!empty($res)){
                if(md5($data['password'])==$res['password']){
                    $_SESSION['user']=$res;
                    $data['time']=time();
                    $data['ip']=$_SERVER['REMOTE_ADDR'];
                    unset($data['password']);
                    unset($data['email']);
                    M('user')->where("email='".$data['email']."'")->save($data);
                    $this->ajaxReturn(1);
                }else{
                    $this->ajaxReturn("密码错误，请检查后输入");
                }
            }else{
                $this->ajaxReturn("邮箱不存在");
            }
        }
    }

    public function region(){
        $this->display();
    }
    /**
     * 提交注册信息
     */
    public function do_region(){
        if(IS_POST&&!empty($_POST)){
            $data=array();
            foreach ($_POST as $key=>$value){
                $data[$key]=$this->test_input($value);
            }

            if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$data['email'])) {
                $emailErr = "无效的 email 格式！";
                $this->ajaxReturn($emailErr);
            }
            if(strlen($data['password'])>=6&&strlen($data['password'])<=20){
                if($data['password']==$data['re-password']){
                    $data['password']=md5($data['password']);
                    $data['addip']=$_SERVER['REMOTE_ADDR'];
                    $data['addtime']=time();
                    $data['level']=1;
                    $data['status']=1;
                    if(M('user')->where("email='".$data['email']."'")->find()){
                        $emailErr = "邮箱已存在,请勿重复注册";
                        $this->ajaxReturn($emailErr);
                    }else{
                        $res=M("user")->add($data);
                        if(!empty($res)){
                            $this->ajaxReturn(1);
                        }
                    }

                }else{
                    $emailErr = "两次密码不相同，请重新输入";
                    $this->ajaxReturn($emailErr);
                }
            }else{
                $emailErr = "密码长度在6到20位之间";
                $this->ajaxReturn($emailErr);
            }
        }


    }
    public function logout(){
        unset($_SESSION['user']);
        $this->redirect('Public/login');
    }

    /**
     * @param $data 处理数据
     * @return string返回处理完成的数据
     * 表单的常用处理
     */
    private function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}