<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $map['pid']=41;
        $newlist=D('Good')->selectData('id desc',4,$map);
        $mapTwo['pid']=35;
        $manlist=D('Good')->selectData('id desc',4,$mapTwo);
        $mapThree=array(
            'pid'=>0
        );
        $goodtype=D('goodtype')->getData($mapThree);
        $slider=M('img')->select();
        foreach ($slider as &$v){
            $v['img_path']=__ROOT__.$v['img_path'];
        }
        $assgin=array(
            'newlist'=>$newlist,
            'manlist'=>$manlist,
            'goodtype'=>$goodtype,
            'slider'=>$slider
        );
        $this->assign($assgin);
        $this->display();
    }
}