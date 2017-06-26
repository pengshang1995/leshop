<?php
/**
 * Created by PhpStorm.
 * User: ps
 * Date: 2017/2/8
 * Time: 18:34
 */
namespace Home\Model;
use Think\Model;
/**
 * 基础model
 */
class  BaseModel extends Model{

    /**
     * @param string $type   tree获取树形结构 level 获取层级结构
     * @param string $order  排序方式
     * @param string $name
     * @param string $child
     * @param string $parent
     * @return array     返回结构树据
     */
    public function getTreeData($type="tree",$order='',$name='name',$child='id',$parent="pid"){
        //判断是否需要排序

        if (empty($order)){
            $data=$this->select();
        }else{
            $data=$this->order($order.' is null ,'.$order)->select();
        }

        //获取树形或者结构数据

        if($type=='tree'){
            $data=\Org\Nx\Data::tree($data,$name,$child,$parent);
        }else if($type='level'){
            $data=\Org\Nx\Data::channelLevel($data,$name,$child,$parent);
        }

        return $data;
    }

    /**
     * @param $data array 添加的新数据
     * @return mixed int 新增数据的id
     */
    public function addData($data){
        //去除首尾键值空格
        foreach($data as $k=>$v){
            $data[$k]=trim($v);
        }
        $id=$this->add($data);
        return $id;
    }

    public function getOneData($map){
        $data=$this->where($map)->find();
        return $data;
    }

    /**
     * @param $map where 语句的数组形式
     * @param $data array 数据
     * @return boolean 操作是否成功
     */

    public function editData($map,$data){
        foreach ($data as $k => $v){
            $data[$k]=trim($v);
        }
        $result=$this->where($map)->save($data);
        return $result;
    }

    /**
     * @param $map where匹配条件
     * @return mixed 删除操作是否成功
     */
    public function deleteData($map){
        if(empty($map)){
            die('where为空是危险操作');
        }
        $result=$this->where($map)->delete();
        return $result;
    }

    /**
     * @param array $data 数据源
     * @param string $id 主键
     * @param string $order  排序字段
     * @return bool 操作是否成功
     */

    public function orderData($data,$id='id',$order='order_number'){
        foreach ($data as $k =>$v){
            $v=empty($data)? null : $v;
            $this->where(array($id=>$k))->save(array($order=>$v));
        }

        return true;
    }



    /**
     * @param $model  model对象
     * @param $map  where 条件
     * @param string $order 排序规则
     * @param int $limit  每页显示数量
     * @param string $field  显示字段
     * @return array  分页后的数据
     */
    public function getPage($model,$map,$order='',$limit=10,$field='',$p=1){
        $count=$model
            ->where($map)
            ->count();
        $page=new_page($count,$limit);
        if(empty($field)){
            $list=$model
                ->where($map)
                ->order($order)
                ->page($p,$limit)
                ->select();
            foreach ($list as &$v){
                $v['savepath']=__ROOT__.$v['savepath'];
            }
        }else{
            $list=$model
                ->field($field)
                ->where($map)
                ->order($order)
                ->page($p,$limit)
                ->select();
            foreach ($list as &$v){
                $v['savepath']=__ROOT__.$v['savepath'];
            }
        }
        $data=array(
            'data'=>$list,
            'page'=>$page->show(),
            'total'=>$page->totalPages
        );
        return $data;
    }
    public function transExecuteSql($sqls)
    {
        $this->startTrans();
        if(is_array($sqls))
        {
            foreach($sqls as $k => $sql)
            {
                $result=$this->db->execute($sql);
                if(!$result) {
                $this->rollBack();
                return false;
                }
            }
        }else{
            $result=$this->db->execute($sqls);
            if(!$result) {
                $this->rollBack();
                return false;
            }
        }
        $this->commit();
        return true;
    }

}