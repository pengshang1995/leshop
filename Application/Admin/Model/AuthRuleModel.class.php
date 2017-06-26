<?php
/**
 * Created by PhpStorm.
 * User: ps
 * Date: 2017/2/10
 * Time: 19:13
 */
namespace Admin\Model;
class AuthRuleModel extends BaseModel{

    public function deleteData($map)
    {
        /**
         * pid?
         */
       /* $count=$this
            ->where(array('pid'=>$map['id']))
            ->count();
        if($count!=0){
            return false;
        }*/
        $result=$this->where($map)->delete();
        return $result;
    }
}