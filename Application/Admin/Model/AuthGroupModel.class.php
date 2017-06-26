<?php
/**
 * Created by PhpStorm.
 * User: ps
 * Date: 2017/2/9
 * Time: 10:39
 */
namespace Admin\Model;
class AuthGroupModel extends BaseModel{

    /**
     * @param array $map  传递主键id
     * @return boolean 操作是否成功
     */
    public function deleteData($map){
        $this->where($map)->delete();
        $group_map=array(
            'group_id'=>$map['id']
        );
        $result =D(AuthGroupAccess)->deleteData($group_map);
        return $result;
    }

    /**
     * @param $map 传入匹配 where
     * @return mixed 返回查询出的单条数据
     */
    public  function selectOne($map){

        $data=$this->where($map)->find();
        $data['rules']=explode(',',$data['rules']);
        return $data;
    }

    public function selectOneData($map){
        $data=$this->where($map)->find();
        $rules=explode(',',$data['rules']);
        foreach ($rules as &$v) {
            $map = array(
                'id' => $v
            );
            $RuleDate = D('AuthRule')->where($map)->find();
            $v = $RuleDate['title'];
        }
        $data['rules']=implode(',',$rules);
        return $data;
    }

    /**
     * 查询用户组 所拥有的权限
     * @return array 返回用户组权限数据
     */
    public function selectData(){
        $data=$this->select();
        //explode($data[rules]);

        for($i=0;$i<count($data);$i++) {
            $rules=explode(',',$data[$i]['rules']);
            foreach ($rules as &$v) {
                $map = array(
                    'id' => $v
                );
                $RuleDate = D('AuthRule')->where($map)->find();
                $v = $RuleDate['title'];
            }
            $data[$i]['rules']=implode(',',$rules);
        }

        return $data;
    }


}