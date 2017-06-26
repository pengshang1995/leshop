<?php
/**
 * Created by PhpStorm.
 * User: ps
 * Date: 2017/2/28
 * Time: 23:26
 */
namespace Home\Model;
class CartModel extends BaseModel{

    /**
     * @param array $data  传入插入的数据数组
     * @return mixed  返回插入id
     */
    public function addData($data)
    {
       $countRes=$this->countPrice($data['goodnum'],$data['goodprice']);
       $data['price']=$countRes;
       unset($data['goodprice']);
       $id=$this->add($data);
       return $id;
    }

    /**
     * @param $num   商品数量
     * @param $goodprice 商品价格
     * @return mixed 返回总价格
     */

    public function getAllCart($map){
        $data=$this->where($map)->select();
        foreach ($data as $k=>$v){
            $data[$k]['single']=$v['price']/$v['goodnum'];
            $data[$k]['savepath']=__ROOT__.$v['savepath'];
        }
        return $data;
    }

    public function countTotalPrice($id){
        $totalPrice=0;
        foreach ( $id as $item) {
            $map=array(
                'id'=>$item
            );
            $good=M('Cart')->where($map)->find();
            $totalPrice+=$good['price'];
            $return['item'][]=$good;
        }
        $return['total']=$totalPrice;
        return $return;
    }
    /**
     * @param $num  商品数量
     * @param $goodprice 商品单价
     * @return mixed 返回该商品的总价
     */
    private function countPrice($num,$goodprice){
        $price=$num*$goodprice;
        return $price;
    }

    /**
     * @param $map  匹配字段
     * @return mixed    返回查询出来的单条数据
     */

    public function GetOne($map)
    {
       $data=$this->where($map)->find();
       return $data;
    }

    /**
     * @param $map  匹配条件
     * @param $data  修改数据数组
     * @return bool  返回布尔值
     */
    public function saveData($map,$data){
        $res=$this->where($map)->save($data);
        return $res;
    }

    /**
     * @param where匹配条件 $map
     * @return mixed  返回真假值
     */

    public function deleteData($map){
        if(empty($map)){
            die('where为空是危险操作');
        }
        $res=$this->where($map)->delete();
        return $res;
    }

    /**
     *
     */

    public function getCount($map){
        $res=$this->where($map)->count();
        return $res;
    }
}