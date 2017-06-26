<?php
namespace Admin\Controller;
class UploadController extends BaseController {
  /**
     * 轮播图列表
     */
    public function index(){
        $data=M('img')->select();
       /*  print_r($data);
        exit; */
        $this->assign('data',$data);
        $this->display();
    }
    /*轮播图添加也没  */
    public function add_img(){
    	$this->display();
    }

    public function SelectOne(){
    	$map=array(
    			'id'=>$_POST['id']
    	);
    	$data=M('img')->where($map)->find();
    	if(!empty($data)){
    		$data['returnMsg']=true;
    		$this->ajaxReturn($data);
    	}else{
    		$data['returnMsg']=false;
    		$this->ajaxReturn($data);
    	}
    }
    
    //删除
    public function del_img(){
    	$map=array(
    			'id'=>$_POST['id']
    	);
    	$result=M('img')->where($map)->delete();
    	if($result){
    		$this->ajaxReturn(true);
    	}else{
    		$this->ajaxReturn(false);
    	}
    }
    
    /* 改变状态 */
    public function change_sta(){

    	$map=array(
    			'id'=>$_POST['id']
    	);
    	if($_POST['state']){
    		$state = 0;
    	}else{
    		$state = 1;
    	}
    	$arr=array(
    			'state'=>$state
    	);
    	$result=M('img')->where($map)->save($arr);
    	if($result){
    		$this->ajaxReturn(true);
    	}else{
    		$this->ajaxReturn(false);
    	}
    }
    
    /**
     * webuploader 上传文件
     */
    public function ajax_upload(){
    	// 根据自己的业务调整上传路径、允许的格式、文件大小
    	
    	ajax_upload('/Upload/image/');
    }
    
    
    /**
     * webuploader 上传demo
     */
    public function webuploader(){
        if (IS_POST) {
            //p($_POST);
            //print_r($_POST);
            $img_path = $_POST['image'];
            foreach ($img_path as $v) {
                $arr = array(
                    'img_path' => $v,
                    'state' => 1
                );
                $res = M('img')->data($arr)->add();

            }
            $this->redirect('Upload/add_img');
        } else {
            $this->error('报错了', U('Upload/add_img'));
        }
    }
}