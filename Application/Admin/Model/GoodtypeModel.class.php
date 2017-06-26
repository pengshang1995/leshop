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
class  GoodtypeModel extends BaseModel{

         /**
	* 商品类型列表
	* @author		laifei
	* @param		
	* @return		
	*/
	public function lists( $where = array() ){
	 if (empty($where)) {
            $data = $this->field('id,pid,typename')->select();
        } else {
            $data = $this->where($where)->field('id,pid,typename')->select();
        }
		Return $data;
	}
        
      
        /**
	* 获取节点
	* @author		laifei
	* @param		
	* @return		
	*/
     public  function selectOne($map){
        
        $data=$this->where($map)->find();
       
        return $data;
    }


}