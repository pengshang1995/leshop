<?php
/**
 * Created by PhpStorm.
 * User: ps
 * Date: 2017/4/8
 * Time: 11:22
 */
namespace Admin\Controller;
class ModelController extends BaseController{

    public function people_model(){
        $man=M('model')->where(array('sex'=>1))->find();
        $man['model']=json_decode($man['model'],true);
        $woman=M('model')->where(array('sex'=>0))->find();
        $woman['model']=json_decode($woman['model'],true);
        $assign=array(
            'man'=>$man,
            'woman'=>$woman
        );
        $this->assign($assign);
        $this->display('people_model');
    }

    public function uploadModel(){
        $data=I('post.');
        if($data['image']==''||$data['position']==''||$data['sex']==''){
            $this->ajaxReturn(false);
        }
        $map=array(
            'sex'=>$data['sex']
        );
        $rec=M('model')->where($map)->find();
        if(empty($rec['model'])){
            $arr=array(
                'left'=>'',
                'right'=>'',
                'behind'=>'',
                'front'=>''
            );
            $arr[$data['position']]=$data['image'][0];
            $upData['model']=json_encode($arr);
            $upData['sex']=$data['sex'];
            $res=M('model')->add($upData);
            if($res){
                $this->ajaxReturn(true);
            }else{
                $this->ajaxReturn(false);
            }
        }else{
            $arr=json_decode($rec['model'],true);
            $arr[$data['position']]=$data['image'][0];
            $upData['model']=json_encode($arr);
            $res=M('model')->where($map)->save($upData);
            if($res){
                $this->ajaxReturn(true);
            }else{
                $this->ajaxReturn(false);
            }
        }
    }

    public function deleteModel(){
        $data=I('post.');
        $map=array(
            'sex'=>$data['sex']
        );
        $getData=M('model')->where($map)->find();
        $arr=json_decode($getData['model'],true);
        $arr[$data['pos']]='';
        $getData['model']=json_encode($arr);
        $res=M('model')->where($map)->save($getData);
        if($res){
            $this->ajaxReturn(true);
        }else{
            $this->ajaxReturn(false);
        }
    }
}