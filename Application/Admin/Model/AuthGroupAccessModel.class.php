<?php
/**
 * Created by PhpStorm.
 * User: ps
 * Date: 2017/2/10
 * Time: 9:38
 */
namespace Admin\Model;
class AuthGroupAccessModel extends BaseModel{

    public function  getAllData(){
        $data=$this
            ->field('u.id,u.username,u.status,u.logintime,aga.group_id,ag.title')
            ->alias('aga')
            ->join('ps_admin u on aga.uid=u.id','RIGHT')
            ->join('ps_auth_group ag ON aga.group_id=ag.id','LEFT')
            ->select();
        // 获取第一条数据
        $first=$data[0];
        $first['title']=array();
        $first['group']=array();
        $user_data[$first['id']]=$first;

        // 组合数组
        foreach ($data as $k => $v) {
            foreach ($user_data as $m => $n) {
                $uids=array_map(function($a){return $a['id'];}, $user_data);
                if (!in_array($v['id'], $uids)) {
                    $v['title']=array();
                    $user_data[$v['id']]=$v;
                }
            }
        }
        // 组合管理员title数组
        foreach ($user_data as $k => $v) {
            foreach ($data as $m => $n) {
                if ($n['id']==$k) {
                    $user_data[$k]['title'][]=$n['title'];
                    $user_data[$k]['group'][]=$n['group_id'];
                }

            }
            $user_data[$k]['title']=implode('、', $user_data[$k]['title']);
        }
        return $user_data;
    }
}