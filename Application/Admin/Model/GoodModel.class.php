<?php
/**
 * Created by PhpStorm.
 * User: ps
 * Date: 2017/2/8
 * Time: 18:34
 */
namespace Admin\Model;

/**
 * 基础model
 */
class  GoodModel extends BaseModel{
    public function getAllInfo(){
         $data=$this->field('id,goodname,gooddesc,num,status,goodprice')->select();
        
         return $data;
    }
}

?>