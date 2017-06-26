<?php
/**
 * Created by PhpStorm.
 * User: ps
 * Date: 2017/2/27
 * Time: 22:52
 */
namespace Home\Model;
class GoodModel extends BaseModel{

    /**
     * @param $order   排序规则
     * @param $limit   查询数量
     * @return array   返回查询数据
     */

    public function selectData($order,$limit,$map){

        $data=$this->where($map)->order($order)->limit($limit)->select();
        foreach ($data as &$v){
            $v['savepath']=__ROOT__.$v['savepath'];
        }
        return $data;
    }

    public function getOneData($map,$field='')
    {
        if($field==''){
            $data=$this->where($map)->find();
        }else{
            $data=$this->field($field)->where($map)->find();
        }


        return $data;
    }

}
