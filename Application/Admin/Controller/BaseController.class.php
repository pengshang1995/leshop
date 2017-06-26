<?php
/**
 * Created by PhpStorm.
 * User: ps
 * Date: 2017/2/8
 * Time: 18:13
 */
namespace Admin\Controller;
use \Think\Controller;
class BaseController extends Controller{
    public function __construct()
    {
        parent::__construct();
        if(isset($_SESSION['adminuser'])){
            $rule_name=CONTROLLER_NAME.'/'.ACTION_NAME;
            $noarr= array(
                'Index/index',
                'Index/weclome',
                'Menu/welcome',
                'Shop/addGoodType',
                'Shop/editGoodType',
                'Shop/ajax_upload',
                'Shop/webuploader',
                'Shop/uploadImg',
                'Shop/uploadImgModel',
                'Shop/addSizeDeal',
            );
            if(in_array($rule_name,$noarr)){
                return true;
            }
            $auth=new \Think\Auth();
            $result=$auth->check($rule_name,$_SESSION['adminuser']['id']);
            if(!$result){
               $this->error('您没有权限访问');
            }
        }else{
            $this->error('你还没登录',U('Public/login'));
        }
    }
}