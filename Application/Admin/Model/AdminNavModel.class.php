<?php
/**
 * Created by PhpStorm.
 * User: ps
 * Date: 2017/2/14
 * Time: 13:50
 */
namespace Admin\Model;
class AdminNavModel extends BaseModel
{
    /**
     * @param string $type   tree 树形结构  level层级结构
     * @param string $order  排序规则
     * @param bool $noauth  布尔值 为真 返回带权限的菜单 为假 返回不带权限的菜单
     * @return array|mixed  返回值为菜单数组
     */
    public function getTreeData($type='tree',$order='',$noauth=false){
        //判断是否需要排序
        if(empty($order)){
            $data=$this->select();
        }else{
            $data=$this->order($order)->select();
        }

        //获取树形结构或者层级结构
        if($type=='tree'){
            $data= \Org\Nx\Data::tree($data,'name','id','pid');
        }else{
            $data= \Org\Nx\Data::channelLevel($data,0,'&nbsp;','id');
            if(!$noauth){
                return $data;
            }else{
                //显示带权限菜单
                $auth=new \Think\Auth();
                foreach ($data as $k=>$v){
                    if($v['name']=='#'){
                        foreach ($v['_data'] as $m=>$n){
                            if(!$auth->check($n['name'],$_SESSION['adminuser']['id'])){
                                unset($data[$k]['_data'][$m]);
                            }
                        }
                    }else{
                        if(!$auth->check($v['name'],$_SESSION['adminuser']['id'])){
                            unset($data[$k]);
                        }
                    }

                }
            }

        }
        return $data;
    }

    /**
     * @param where匹配条件 $map
     * @return bool 操作是否成功
     */
    public function deleteData($map)
    {
        $count = $this
            ->where(array('pid' => $map['id']))
            ->count();
        if ($count != 0) {
            return false;
        }
        $this->where(array($map))->delete();
        return true;

    }
}