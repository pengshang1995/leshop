<?php
/**
 * Created by PhpStorm.
 * User: ps
 * Date: 2017/3/19
 * Time: 15:07
 */
namespace Home\Controller;
class  OrderController extends CommonController{
    public function order(){
        $order_id=I('get.id');
        $map=array(
            'id'=>$order_id,
            'pid'=>$_SESSION['user']['id'],
            'status'=>0
        );
        $map_man=array('pid'=>$_SESSION['user']['id']);
        $link_man=M('address')->where($map_man)->select();
        $defaultmap=array('pid'=>$_SESSION['user']['id'],'status'=>1);
        $default=M('address')->where($defaultmap)->find();
        $order_detail=M('order')->where($map)->find();
        if (empty($order_detail)){
            $this->error('订单不存在！');
        }
        $map_good=array('orderid'=>$order_id);
        $order_good=M('order_good')->where($map_good)->select();
        $this->assign('default',$default);
        $this->assign('order_good',$order_good);
        $this->assign('order_detail',$order_detail);
        $this->assign("link_man",$link_man);
        $this->display();
    }

    public function ajaxOrder(){
        $order_id=I('post.order_id');
        $address_id=I('post.address_id');
        $map['id']=$order_id;
        $save=array(
            'order_address_id'=>$address_id,
            'status'=>1
        );
        $cart_model=M('cart');
        $cart_good_model=M('order_good');
        $order_model=M('order');
        $order_model->startTrans();
        $result=$order_model->where($map)->save($save);
        if(!$result){
            $order_model->rollback();
            $this->ajaxReturn(false);
        }else{
            $mapOrderGood['orderid']=$order_id;
            $good=$cart_good_model->where($mapOrderGood)->select();
            foreach ($good as $value){
                $mapCart['goodid']=$value['goodid'];
                $mapCart['pid']=$_SESSION['user']['id'];
                $res=$cart_model->where($mapCart)->delete();
                if (!$res){
                    $cart_model->rollback();
                    $this->ajaxReturn(false);
                }
            }
        }
        $order_model->commit();
        $cart_model->commit();
        $this->ajaxReturn(true);

    }

    public function add_order(){
        $idStr=$_POST['id'];
        $count=D('Cart')->countTotalPrice($idStr);
        $data['total_price']=$count['total'];
        $data['ctime']=time();
        $data['status']=0;
        $data['pid']=$_SESSION['user']['id'];
        $order_id=$this->getOrderId();
        $data['order_number']=md5($order_id);
        $order_model=M('order');
        /*$cart_model=M('cart');*/
        $cart_good_model=M('order_good');

        $order_model->startTrans();
        $reslut=$order_model->add($data);
        if(!$reslut){
            $order_model->rollback();
            $this->ajaxReturn(false);
        }else{
            foreach ($count['item'] as $k=> $v){
                $v['orderid']=$reslut;
                unset($v['id']);
                if(!$cart_good_model->add($v)){
                    $cart_good_model->rollback();
                    $this->ajaxReturn(false);
                }
            }
            /*foreach ($idStr as $value){
                $map=array('id'=>$value);
                if(!$cart_model->where($map)->delete()){
                    $cart_model->rollback();
                    $this->ajaxReturn(false);
                }
            }*/
        }
        $order_model->commit();
        $cart_good_model->commit();
     /*   $cart_model->commit();*/
        $returnData['id']=$reslut;
        $this->ajaxReturn($returnData);
    }

    private function getOrderId(){
        return date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
    }
}