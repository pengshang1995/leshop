<?php
/**
 * Created by PhpStorm.
 * User: ps
 * Date: 2017/2/14
 * Time: 9:05
 */
namespace Admin\Widget;
use \Think\Controller;
class CateWidget extends Controller{
    public function getAdminUser(){
        if(isset($_SESSION['adminuser'])){
            $name=$_SESSION['adminuser']['username'];
            echo $name;
        }

    }

    public function getMenu(){
        $data=D('AdminNav')->getTreeData('level','id',true);
        $str='<ul>';
        foreach ($data as $v){
            if($v['name']=='#'&&!(empty($v['_data']))){
                $str.='<li class="has-sub"><a href="javascript:;" class=""><i class="fa fa-bookmark-o fa-fw"></i><span class="menu-text">'.$v['title'].'</span><span class="arrow"></span></a><ul class="sub">';
                foreach ($v['_data'] as $value){
                    $value['name']=U("$value[name]");
                    $str.='<li><a class="" href="'.$value['name'].'"><span class="sub-menu-text">'.$value['title'].'</span></a></li>';
                }
                $str.='</ul>';
            }else if($v['name']!='#'){
                $v['name']=U("$v[name]");
                $str.='<li><a class="" href="'.$v['name'].'"><i class="fa fa-desktop fa-fw"></i> <span class="menu-text">'.$v['title'].'</span></a></li>';
            }
        }
        $str.='</ul>';
        return $str;
    }



}