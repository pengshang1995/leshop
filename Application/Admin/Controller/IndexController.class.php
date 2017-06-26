<?php
namespace Admin\Controller;
class IndexController extends BaseController {
    public function index(){
        $nav=$this->getNav();
        $this->assign("nav",$nav);
        $this->display();
    }
    public function getNav(){
        $map['pid']=0;
        $data=D('auth_rule')->where($map)->select();
        $auth=new \Think\Auth();
        foreach ($data as  $k=>$v){
            $mapGroup=array(
                'uid'=>$_SESSION['adminuser']['id']
            );
            $group=M('auth_group_access')
                ->alias('a')
                ->join('ps_auth_group b ON a.group_id = b.id')
                ->where($mapGroup)
                ->find();
            $id=explode(',',$group['rules']);
            if(in_array($v['id'],$id)){
                $mapchild['pid']=$v['id'];
                $data[$k]['href']='javascript:;';
                $child=D('auth_rule')->where($mapchild)->select();
                foreach ($child as $key=>$value){
                    if(!$auth->check($value['name'],$_SESSION['adminuser']['id'])){
                        unset($child[$key]);
                    }else{
                        $child[$key]['href']=U("$value[name]");
                    }
                }
                if(empty($child)){
                    unset($data[$k]);
                }else{
                    $data[$k]['child']=$child;
                }
            }else{
                unset($data[$k]);
            }

        }
        return $data;
    }

    public function weclome(){
        $info=array(
            '操作系统'=>PHP_OS,
            '运行环境'=>$_SERVER["SERVER_SOFTWARE"],
            '主机名'=>$_SERVER['SERVER_NAME'],
            'WEB服务端口'=>$_SERVER['SERVER_PORT'],
            '网站文档目录'=>$_SERVER["DOCUMENT_ROOT"],
            '浏览器信息'=>substr($_SERVER['HTTP_USER_AGENT'], 0, 40),
            '通信协议'=>$_SERVER['SERVER_PROTOCOL'],
            '请求方法'=>$_SERVER['REQUEST_METHOD'],
            'ThinkPHP版本'=>THINK_VERSION,
            '上传附件限制'=>ini_get('upload_max_filesize'),
            '执行时间限制'=>ini_get('max_execution_time').'秒',
            '服务器时间'=>date("Y年n月j日 H:i:s"),
            '北京时间'=>gmdate("Y年n月j日 H:i:s",time()+8*3600),
            '服务器域名/IP'=>$_SERVER['SERVER_NAME'].' [ '.gethostbyname($_SERVER['SERVER_NAME']).' ]',
            '用户的IP地址'=>$_SERVER['REMOTE_ADDR'],
            '剩余空间'=>round((disk_free_space(".")/(1024*1024)),2).'M',
        );
        $this->info=$info;
        $this->display();
    }
}