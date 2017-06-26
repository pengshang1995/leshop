<?php
/**
 * Created by PhpStorm.
 * User: ps
 * Date: 2017/3/9
 * Time: 20:43
 */
namespace Home\Model;
class GoodtypeModel extends BaseModel{
    public function getData($map){
        $data=$this->where($map)->select();
        $ReData=array();
        foreach ($data as $v){
            $mapChild=array(
                'pid'=>$v['id']
            );
            $selData=$this->where($mapChild)->select();
            foreach ($selData as $result){
                $result['typename']=$v['typename'].'-'.$result['typename'];
                $ReData[]=$result;
            }
        }

        return $ReData;
    }
}