<?php
namespace Admin\Controller;
class MenuController extends BaseController{
    public function index(){
        $this->display();
    }
    public function welcome(){
        $this->display();
    }
    public function dis_menu(){
        $map['id']=$_GET['id'];
        $this->assign('id',$map['id']);
        $this->display();
    }

    public function getOne(){
        $postData =file_get_contents('php://input', true);
        $obj=json_decode($postData,true);
        $map['id']=$obj['id'];
        $data['records']=M('auth_rule')->where($map)->find();
        if($data['records']['type']==1){
            $mapThree['pid']=$obj['id'];
            $data['child']=M('auth_rule')->where($mapThree)->select();
        }
        $mapTwo['id']=$data['records']['pid'];
        $res=M('auth_rule')->where($mapTwo)->find();
        $data['records']['parentMenu']=$res['title'];
        $this->ajaxReturn($data);
    }

    /**
     * 获取菜单
     */
    public function getMenu(){
        $postData =file_get_contents('php://input', true);
        $obj=json_decode($postData,true);

        if(!isset($obj[pid])){
            $map=array(
                'type'=>array('neq',2)
            );
            $data=M('auth_rule')->where($map)->order("sort desc")->select();
            foreach ($data as  $k=>$v){
                switch ($v['type']){
                    case 0:
                        $data[$k]['open']="true";
                        $data[$k]['iconOpen']="admin/css/img/diy/1_open.png";
                        $data[$k]['iconClose']="admin/css/img/diy/1_close.png";
                        //$dataJson.="{id:".$data[$k]['id'].",pId:".$data[$k]['pid'].",name:'".$data[$k]['title']."',open:true,iconOpen:'".$data[$k]['iconOpen']."',iconClose:'".$data[$k]['iconClose']."'},";
                        break;
                    case 1:
                        $data[$k]['icon']="admin/css/img/diy/2.png";
                        //$dataJson.="{id:".$data[$k]['id'].",pId:".$data[$k]['pid'].",name:'".$data[$k]['title']."',icon:".$data[$k]['icon']."},";
                        break;
                }
                unset($data[$k]['name']);
                $data[$k]['pId']=$data[$k]['pid'];
                $data[$k]['name']=$data[$k]['title'];
            }
        }else{
            $map=array(
                'pid'=>0
            );
            $data=M('auth_rule')->where($map)->order("sort desc")->select();
        }

        $this->ajaxReturn($data);
    }

    /**
     * 添加菜单
     */

    public function addMenu(){
        $assign=array(
            'id'=>$_GET['id'],
            'type'=>$_GET['type']+1
        );
        $this->assign($assign);
        $this->display('add_menu');
    }

    /**
     * 添加菜单接口
     */
    public function add_deal(){
        $postData =file_get_contents('php://input', true);
        $obj=json_decode($postData,true);
        if($obj['type']==0){
            $obj['pid']=0;
        }
        $res=M('auth_rule')->add($obj);
        if ($res){
            $data['message']='已添加';
            $data['icon']=1;
        }else{
            $data['message']='添加失败';
            $data['icon']=0;
        }
        $this->ajaxReturn($data);
    }

    /**
     * 编辑菜单页面
     */
    public function editMenu(){
        $assign=array(
            'id'=>$_GET['id'],
            'type'=>$_GET['type']
        );
        $this->assign($assign);
        $this->display('edit_menu');
    }

    /**
     * 编辑菜单接口
     */
    public function save_deal(){
        $obj=getParam();
        $map['id']=$obj['id'];
        $res=M('auth_rule')->where($map)->save($obj);
        if($res){
            $data['message']='已更新';
            $data['icon']=1;
        }else{
            $data['message']="更新失败";
            $data['icon']=0;
        }
        $this->ajaxReturn($data);
    }

    /**
     * 删除菜单接口
     */
    public function deleteMenu(){
        $obj=getParam();
        $mapTwo['pid']=$obj['id'];
        M('auth_rule')->where($mapTwo)->delete();
        $map['id']=$obj['id'];
        M('auth_rule')->where($map)->delete();
        $data['message']='删除成功';
        $data['icon']=1;
        $this->ajaxReturn($data);
    }
    /**
     * 添加权限页面
     */

    public function addAuth(){
        $assign['pid']=$_GET['pid'];
        $map['id']=$_GET['pid'];
        $resData=M('auth_rule')->where($map)->find();
        $assign['title']=$resData['title'];
        $this->assign($assign);
        $this->display('add_auth');
    }

    /**
     * 编辑权限页面
     */
    public function editAuth(){
        $map['id']=$_GET['pid'];
        $resData=M('auth_rule')->where($map)->find();
        $assign['title']=$resData['title'];
        $assign['id']=$_GET['id'];
        $this->assign($assign);
        $this->display('edit_auth');
    }

    public function getAuth(){
        $data=M('auth_rule')->select();
        $arr['records']=\Org\Nx\Data::channelLevel($data,0,'&nbsp;','id');
        $this->ajaxReturn($arr);
    }
}