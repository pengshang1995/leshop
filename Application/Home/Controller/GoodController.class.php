<?php
/**
 * Created by PhpStorm.
 * User: ps
 * Date: 2017/2/27
 * Time: 21:38
 */
namespace Home\Controller;
class GoodController extends CommonController{
    public function goodPreview(){
        $id=I('get.');
        $data=D('Good')->GetOneData($id);
        $map=array('goodid'=>$id['id']);
        $mapSize=array(
            'good_id'=>$id['id']
        );
        $size=M('size')->where($mapSize)->select();
        $dataImg=M('goodimg')->where($map)->select();
        foreach ($dataImg as &$vo){
            $vo['savepath']=__ROOT__.$vo['savepath'];
        }
        $assign=array(
            'good'=>$data,
            'goodimg'=>$dataImg,
            'size'=>$size
        );
        $this->assign($assign);
        $this->display(preview);
    }

    public function size(){
        $this->display();
    }

    public function goodList(){
        $data=I('get.');
        $p=empty($data['p'])?1:$data['p'];
        $map['pid']=$data['pid'];

        if(!empty($data['typeid'])){
            $map['typeid']=$data['typeid'];
        }
        $newlist=D('Good')->getPage(D('Good'),$map,'id desc',20,'',$p);
        $assgin=array(
            'newlist'=>$newlist,
            'p'=>$p
        );
        $this->assign($assgin);
        $this->display('list');
    }
}