<?php
/**
 * Created by PhpStorm.
 * User: ps
 * Date: 2017/3/30
 * Time: 9:15
 */
namespace Home\Controller;
class  PersonalController extends CommonController{

    public function index()
    {
        $map = array(
            'ps_user.id' => $_SESSION['user']['id']
        );
        $data = M('user')
            ->where($map)
            ->join('ps_user_message ON ps_user_message.pid=ps_user.id')
            ->select();
        if(empty($data)){
            $msg=array(
                'pid'=>$_SESSION['user']['id']
            );
            M('user_message')->add($msg);
            $data = M('user')
                ->where($map)
                ->join('ps_user_message ON ps_user_message.pid=ps_user.id')
                ->select();
        }
        $this->assign('data',$data);
        $this->display();
    }

    public function editUser(){

    }



}