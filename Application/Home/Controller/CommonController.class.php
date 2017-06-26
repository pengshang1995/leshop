<?php
/**
 * Created by PhpStorm.
 * User: ps
 * Date: 2017/2/7
 * Time: 17:46
 */
namespace Home\Controller;
use \Think\Controller;
class CommonController extends Controller{
    public function _initialize(){
        header('Content-Type: text/html; charset=utf-8');
        //是否的登录验证
        if(empty($_SESSION['user'])){
            $this->redirect("Public/login");
            exit();
        }
    }
}