<?php
/**
 * Created by PhpStorm.
 * User: ps
 * Date: 2017/4/8
 * Time: 20:32
 */
namespace Home\Controller;
class CollocateController extends CommonController{
    public function index(){
        if (!isset($_SESSION['user'])){
            $this->ajaxReturn(false);
        }
        $mapSex=I('post.');
        if(!empty($mapSex)){
            $sex=$mapSex['sex'];
        }else{
            $sex=1;
        }
        if(!empty($mapSex['id'])){
            $map=array(
                'id'=>$mapSex['id']
            );
        }else{
            $map=array(
                'uid'=>$_SESSION['user']['id'],
                'sex'=>$sex
            );
        }

        $data=M('collocate')->where($map)->order('uptime desc')->find();

        if(empty($data)){
            $arr['uptime']=time();
            $model = M('model')->where(array('sex' => $sex))->find();
            $arr['model']=$model['model'];
            $arr['bg']='/Public/images/colth/ss.jpg';
            $arr['sex']=$sex;
            $arr['uid']=$_SESSION['user']['id'];
            $arr['status']=0;
            $arr['star']=0;
            $res=M('collocate')->add($arr);
            if($res){
                $mapCol=array(
                    'id'=>$res
                );
                $retData=M('collocate')->where($mapCol)->find();
                $ajaxData[]=__ROOT__.$retData['bg'];
                $ajaxData[]=json_decode($retData['model'],true);
                 if (!empty($retData['shoe'])){
                    $arrMsg=M('good')->field('imgcontent')->where(array('id'=>$retData['shoe']))->find();
                    $ajaxData[]=json_decode($arrMsg['imgcontent'],true);
                }
                if (!empty($retData['trousers'])){
                    $arrMsg=M('good')->field('imgcontent')->where(array('id'=>$retData['trousers']))->find();
                    $ajaxData[]=json_decode($arrMsg['imgcontent'],true);
                }
                if (!empty($retData['shirt'])){
                    $arrMsg=M('good')->field('imgcontent')->where(array('id'=>$retData['shirt']))->find();
                    $ajaxData[]=json_decode($arrMsg['imgcontent'],true);
                }
                if (!empty($retData['coat'])){
                    $arrMsg=M('good')->field('imgcontent')->where(array('id'=>$retData['coat']))->find();
                    $ajaxData[]=json_decode($arrMsg['imgcontent'],true);
                }
               
                $this->ajaxReturn($ajaxData);
            }
        }
        else{
            $ajaxData[]=__ROOT__.$data['bg'];
            $ajaxData[]=json_decode($data['model'],true);
             if (!empty($data['shoe'])){
                $arrMsg=M('good')->field('imgcontent')->where(array('id'=>$data['shoe']))->find();
                $ajaxData[]=json_decode($arrMsg['imgcontent'],true);
            }
            if (!empty($data['trousers'])){
                $arrMsg=M('good')->field('imgcontent')->where(array('id'=>$data['trousers']))->find();
                $ajaxData[]=json_decode($arrMsg['imgcontent'],true);
            }
            if (!empty($data['shirt'])){
                $arrMsg=M('good')->field('imgcontent')->where(array('id'=>$data['shirt']))->find();
                $ajaxData[]=json_decode($arrMsg['imgcontent'],true);
            }
            if (!empty($data['coat'])){
                $arrMsg=M('good')->field('imgcontent')->where(array('id'=>$data['coat']))->find();
                $ajaxData[]=json_decode($arrMsg['imgcontent'],true);
            }
            $this->ajaxReturn($ajaxData);
        }
    }

    public function add(){
        if (!isset($_SESSION['user'])){
            $this->ajaxReturn(false);
        }
        $map=array(
            'id'=>I('post.id')
        );
        $good=M('good')->where($map)->find();
        $type=$good['typeid'];
        $goodtype=M('goodtype')->where(array('id'=>$type))->find();
        switch ($goodtype['pid']){
            case '35':
                $mapCal=array(
                    'uid'=>$_SESSION['user']['id'],
                    'sex'=>1
                );
                break;
            case '41':
                $mapCal=array(
                    'uid'=>$_SESSION['user']['id'],
                    'sex'=>0
                );
                break;
        }

        $data=M('collocate')->where($mapCal)->order('uptime desc')->find();
        if(empty($data)){
            switch ($goodtype['pid']){
                case '35':
                    $arr['uptime']=time();
                    $model=M('model')->where(array('sex'=>1))->find();
                    $arr['model']=$model['model'];
                    $arr['bg']='/Public/images/colth/ss.jpg';
                    $arr['sex']=1;
                    $arr['star']=0;
                    $arr['uid']=$_SESSION['user']['id'];
                    $arr[$goodtype['order']]=$good['id'];
                    $arr['status']=0;
                    $res=M('collocate')->add($arr);
                    break;
                case '41':
                    $arr['uptime']=time();
                    $model=M('model')->where(array('sex'=>0))->find();
                    $arr['model']=$model['model'];
                    $arr['bg']='/Public/images/colth/ss.jpg';
                    $arr['sex']=0;
                    $arr['star']=0;
                    $arr['uid']=$_SESSION['user']['id'];
                    $arr[$goodtype['order']]=$good['id'];
                    $arr['status']=0;
                    $res=M('collocate')->add($arr);
                    break;
            }
            if($res){
                $this->ajaxReturn(true);
            }else{
                $this->ajaxReturn('falseAdd');
            }


        }else{
            $data[$goodtype['order']]=$good['id'];
            $mapCol=array(
                'id'=>$data['id']
            );
            $res=M('collocate')->where($mapCol)->save($data);
            if($res){
                $this->ajaxReturn(true);
            }else{
                $this->ajaxReturn('falseAdd');
            }
        }
    }

    public function collocateList(){
        $map=array(
          'uid'=>$_SESSION['user']['id']
        );
        $data=M('collocate')->where($map)->select();

        foreach ($data as  $k=>$v){
            if (!empty($v['trousers'])){
                $arrMsg=M('good')->where(array('id'=>$v['trousers']))->find();
                $data[$k]['good'][]=$arrMsg;
            }
            if (!empty($v['shirt'])){
                $arrMsg=M('good')->where(array('id'=>$v['shirt']))->find();
                $data[$k]['good'][]=$arrMsg;
            }
            if (!empty($v['coat'])){
                $arrMsg=M('good')->where(array('id'=>$v['coat']))->find();
                $data[$k]['good'][]=$arrMsg;
            }
            if (!empty($v['shoe'])){
                $arrMsg=M('good')->where(array('id'=>$v['shoe']))->find();
                $data[$k]['good'][]=$arrMsg;
            }
        }
        $this->assign('listColl',$data);
        $this->display('list');
    }

    public function getOne(){
        $map=array(
            'id'=>I('post.id')
        );
        $data=M('collocate')->field('id,title')->where($map)->find();
        if (empty($data)){
            $this->ajaxReturn(false);
        }else{
            $this->ajaxReturn($data);
        }
    }

    public function saveEdit(){
        $data=I('post.');
        $map=array(
            'id'=>I('post.id')
        );
        $res=M('collocate')->where($map)->save($data);
        if($res){
            $this->ajaxReturn(true);
        }else{
            $this->ajaxReturn(false);
        }
    }

    public function changeStatus(){
        $map=array(
            'id'=>I('post.id')
        );
        $data['status']=1;
        $res=M('collocate')->where($map)->save($data);
        if($res){
            $this->ajaxReturn(true);
        }else{
            $this->ajaxReturn(false);
        }
    }

    public function deleteCollocate(){
        $map=array(
            'id'=>I('post.id')
        );
        $res=M('collocate')->where($map)->delete();
        if($res){
            $this->ajaxReturn(true);
        }else{
            $this->ajaxReturn(false);
        }
    }

    public function ranking(){
        $data=I('get.');
        $p=empty($data['p'])?1:$data['p'];
        $map=array(
            'status'=>1
        );
        $newlist=D('Collocate')->getPage(D('Collocate'),$map,'star desc',20,'',$p);
        $arr=$newlist['data'];
        foreach ($arr as $k=>$v){
            $mapStar=array(
                'uid'=>$_SESSION['user']['id'],
                'cid'=>$v['id']
            );
            $data=M('star')->where($mapStar)->select();
            if(empty($data)){
                $arr[$k]['truestar']=false;
            }else{
                $arr[$k]['truestar']=true;
            }
        }
        $newlist['data']=$arr;
        $assgin=array(
            'newlist'=>$newlist,
            'p'=>$p
        );
        $this->assign($assgin);
        $this->display();
    }

    public function addStar(){
        $data['cid']=I('post.id');
        $data['uid']=$_SESSION['user']['id'];

        $res=M('star')->add($data);
        if($res){
            $count=M('star')->where(array('cid'=>$data['cid']))->count();
            $countData=array('star'=>$count);
            M('collocate')->where(array('id'=>$data['cid']))->save($countData);
            $this->ajaxReturn(true);
        }else{
            $this->ajaxReturn(false);
        }
    }

    public function deleteStar(){
        $data['cid']=I('post.id');
        $data['uid']=$_SESSION['user']['id'];
        $res=M('star')->where($data)->delete();

        if($res){
            $count=M('star')->where(array('cid'=>$data['cid']))->count();
            $countData=array('star'=>$count);
            M('collocate')->where(array('id'=>$data['cid']))->save($countData);
            $this->ajaxReturn(true);
        }else{
            $this->ajaxReturn(false);
        }
    }

}