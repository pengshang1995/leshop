<?php
/**
 * Created by PhpStorm.
 * User: ps
 * Date: 2017/2/28
 * Time: 19:48
 */
namespace Home\Widget;
use Think\Controller;
class PublicWidget extends Controller{
    public function getUser(){
        if(isset($_SESSION['user'])){
            $name=$_SESSION['user']['username'];
            echo $name;
        }else{
            echo 'nologin';
        }
    }
    public function getCartCount(){
        $map['pid']=$_SESSION['user']['id'];
        $count=D('Cart')->getCount($map);
        echo $count;
    }
}