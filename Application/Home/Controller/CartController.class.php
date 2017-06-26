<?php
/**
 * Created by PhpStorm.
 * User: ps
 * Date: 2017/2/28
 * Time: 21:29
 */
namespace Home\Controller;
use Think\Controller;
use Think\Model;

class CartController extends Controller{

    /**
     * 添加购物车
     */
    public function addCart(){
        if(isset($_SESSION['user'])){
            $data=I('post.');
            isset($data['num'])?$data['num']:$data['num']=1;
            $map['pid']=$_SESSION['user']['id'];
            $map['goodid']=$data['id'];
            $res=M('Cart')->where($map)->find();

            if (!empty($res)){
                $mapGood['id']=$data['id'];
                $Good=D('Good')->getOneData($mapGood,'id,goodname,goodprice,savepath,num');

                if($Good['num']<$data['num']){
                    $this->ajaxReturn('falseAdd');
                }else{
                    $dataSave['goodnum']=$res['goodnum']+$data['num'];
                    $dataSave['size']=$data['size'];
                    $dataSave['price']=$res['price']+$Good['goodprice']*$data['num'];
                    $result=D('Cart')->SaveData($map,$dataSave);
                    if (!empty($result)){
                        $this->ajaxReturn(true);
                    }else{
                        $this->ajaxReturn('falseAdd');
                    }
                }

            }else{
                $mapGood['id']=$data['id'];
                $Good=D('Good')->getOneData($mapGood,'id,goodname,goodprice,savepath,num');

                if($Good['num']<$data['num']){
                    $this->ajaxReturn('falseAdd');
                }else{
                    $Cart=array(
                        'goodid'=>$Good['id'],
                        'pid'=>$_SESSION['user']['id'],
                        'goodname'=>$Good['goodname'],
                        'goodprice'=>$Good['goodprice'],
                        'goodnum'=>$data['num'],
                        'size'=>$data['size'],
                        'savepath'=>$Good['savepath'],
                        'addtime'=>time()
                    );

                    $result=D('Cart')->addData($Cart);
                    if (!empty($result)){
                        $this->ajaxReturn(true);
                    }else{
                        $this->ajaxReturn('falseAdd');
                    }
                }
            }
        }else{
            $this->ajaxReturn(false);
        }
    }


    /**
     * 购物车展示
     */
    public function cartDis(){
        if(isset($_SESSION['user'])){
            $map['pid']=$_SESSION['user']['id'];
            $cartList=D('Cart')->getAllCart($map);
            $assign=array(
              'list'=>$cartList
            );
            $this->assign($assign);
        }else{
            $this->error("您没有登录，请登录后查看",U('Public/login'));
        }
        $this->display('list');
    }

    /**
     * 获取单个购物车数据
     */
    public function GetOneCart(){
        if(IS_POST){
            $data=I('post.');
            $data[pid]=$_SESSION['user']['id'];
            $result=D('cart')->GetOne($data);
            if(empty($result)){
                $this->ajaxReturn(false);
            }else{
                $this->ajaxReturn($result);
            }

        }else{
            $this->ajaxRerturn(false);
        }
    }

    /**
     * 更新购物车信息
     */
    public function updateCart(){
        if (IS_POST){
            $data=I('post.');
            $data['price']=ltrim($data['single'],'$')*$data['goodnum'];
            $map=array(
                'id'=>$data['id'],
                'pid'=>$_SESSION['user']['id']
            );
            unset($data['id']);
            $res=D('cart')->saveData($map,$data);
            if ($res){
                $this->ajaxReturn(true);
            }else{
                $this->ajaxReturn(false);
            }
        }else{
            $this->ajaxReturn(false);
        }
    }

    /**
     * 删除购物车中的商品
     */
    public function deleteCart(){
        if(IS_POST){
            $data=I('post.');
            $data['pid']=$_SESSION['user']['id'];
            $res=D('cart')->deleteData($data);
            if($res){
                $this->ajaxReturn(true);
            }else{
                $this->ajaxReturn(false);
            }
        }
    }

    /**
     * 事务处理 批量删除
     */
    public function deleteBatchCart(){
        if (IS_POST){
            $data=I('post.');
            if(empty($data['id'])){
                $this->ajaxReturn(false);
            }
            $sql=array();
            foreach($data['id'] as $v){
                $map['id']=$v;
                $map['pid']=$_SESSION['user']['id'];
                $sql[]="delete from ps_cart where id='".$v."' and pid= '".$map['pid']."' ;";
            }
            $deal=D('Cart');
            $result=$deal->transExecuteSql($sql);
            $this->ajaxReturn($result);
        }
    }

    public function addBatchCart(){
        if(!isset($_SESSION['user'])){
            $this->ajaxReturn(false);
        }
        if(IS_POST){
            $data=I('post.');
            $sex=$data['sex'];
            if(empty($data['id'])){
                $map=array(
                    'sex'=>$sex,
                    'uid'=>$_SESSION['user']['id']
                );
            }else{
                $map=array(
                    'id'=>I('post.id')
                );
            }
            $errorMsg='';
            $data=M('collocate')->where($map)->order('uptime desc')->find();
            if(!empty($data)){
                if(!empty($data['shoe'])){
                    $result=$this->add($data['shoe']);
                    if($result==false){
                        $good=M('good')->where(array('id'=>$data['shoe']))->find();
                        $errorMsg.=$good['goodname'].' ';
                    }
                }
                if(!empty($data['trousers'])){
                    $result=$this->add($data['trousers']);
                    if($result==false){
                        $good=M('good')->where(array('id'=>$data['trousers']))->find();
                        $errorMsg.=$good['goodname'].' ';
                    }
                }
                if(!empty($data['coat'])){
                    $result=$this->add($data['coat']);
                    if($result==false){
                        $good=M('good')->where(array('id'=>$data['coat']))->find();
                        $errorMsg.=$good['goodname'].' ';
                    }
                }
                if(!empty($data['shirt'])){
                    $result=$this->add($data['shirt']);
                    if($result==false){
                        $good=M('good')->where(array('id'=>$data['shirt']))->find();
                        $errorMsg.=$good['goodname'].' ';
                    }
                }
                if(!empty($errorMsg)){
                    $errorMsg.=' 货源不足';
                    $this->ajaxReturn($errorMsg);
                }else{
                    $this->ajaxReturn(true);
                }

            }



        }
    }

    /**
     * @param $id 商品id
     */
    private function add($id){
        $data['num'] = 1;
        $map['pid'] = $_SESSION['user']['id'];
        $map['goodid'] = $id;
        $res = M('Cart')->where($map)->find();
        if (!empty($res)) {
            $mapGood['id'] = $id;
            $Good = D('Good')->getOneData($mapGood, 'id,goodname,goodprice,savepath,num');

            if ($Good['num'] < $data['num']) {
                return false;
            } else {
                $dataSave['goodnum'] = $res['goodnum'] + $data['num'];
                $dataSave['price'] = $res['price'] + $Good['goodprice'] * $data['num'];
                $result = D('Cart')->SaveData($map, $dataSave);
                if (!empty($result)) {
                   return true;
                } else {
                   return false;
                }
            }

        } else {
            $mapGood['id'] = $id;
            $Good = D('Good')->getOneData($mapGood, 'id,goodname,goodprice,savepath,num');
            if ($Good['num'] < $data['num']) {
                $this->ajaxReturn('falseAdd');
            } else {
                $Cart = array(
                    'goodid' => $Good['id'],
                    'pid' => $_SESSION['user']['id'],
                    'goodname' => $Good['goodname'],
                    'goodprice' => $Good['goodprice'],
                    'goodnum' => $data['num'],
                    'savepath' => $Good['savepath'],
                    'addtime' => time()
                );

                $result = D('Cart')->addData($Cart);
                if (!empty($result)) {
                    return true;
                } else {
                    return false;
                }
            }
        }
    }

}