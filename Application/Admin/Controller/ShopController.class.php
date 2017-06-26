<?php
namespace Admin\Controller;
class ShopController extends BaseController {
	

    public function shoplist(){
         $data=D('Good')->getAllInfo();
         $this->assign('data',$data);
         $this->display();
    }
	

    public function addGood(){
        if (IS_AJAX) {
            $data = I('post.');
            $data['savepath'] = $data['image'][0];
            var_dump($data);
            exit();
            $map=array(
                'id'=>$data['typeid']
            );
            $goodtype=D('goodtype')->selectOne($map);
            $data['pid']=$goodtype['pid'];
            $result = D('Good')->addData($data);
            if ($result) {
                $this->ajaxReturn(true);
            } else {
                $this->ajaxReturn(false);
            }
        } else {
            $menu = D('Goodtype')->lists();
            $data = '';
            if ($menu) {
                //	生成树型结构
                $array = array();
                $tree = new \Org\Nx\Tree;
                foreach ($menu as $r) {
                    $r['cname'] = $r['typename'];
                    $array[] = $r;

                }
                $tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ',
                    '&nbsp;&nbsp;&nbsp;└─ ');
                $tree->nbsp = '&nbsp;&nbsp;&nbsp;';
                $op = "<option value='\$id' >\$spacer \$cname</option>";
                $tree->init($array);
                $data = $tree->get_tree(0, $op);

            }

            $this->assign('data', $data);
            $this->display("add_good");
        }   
    }

   public function editGood(){
        if(IS_AJAX){
            $data = I('post.');
            $where = array('id'=>$data['id']);
            unset($data['id']);
            if(!empty($data['image'][0])){
                $data['savepath']=$data['image'][0];
            }
            $map=array(
                'id'=>$data['typeid']
            );
            $goodtype=D('goodtype')->selectOne($map);
            $data['pid']=$goodtype['pid'];
            $result=D('Good')->editData($where,$data);
            if ($result) {
                $this->ajaxReturn(true);
            } else {
                $this->ajaxReturn(false);
            }
            
        }else{
            $id = isset($_GET['id']) ? $_GET['id'] : '';
            if (!empty($id)) {
                $where = array('id' => $id);
                $goodinfo = D('Good')->getOneData($where);
                $goodinfo['savepath'] = __ROOT__ . $goodinfo['savepath'];
                $this->assign('goodinfo', $goodinfo);
            }

            $menu = D('Goodtype')->lists();
            $data = '';
            if ($menu) {
                //	生成树型结构
                $array = array();
                $tree = new \Org\Nx\Tree;
                foreach ($menu as $r) {
                    $r['cname'] = $r['typename'];
                    $r['selected'] = $r['id'] == $goodinfo['typeid'] ? 'selected' : '';
                    $array[] = $r;
                }
                $tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ',
                    '&nbsp;&nbsp;&nbsp;└─ ');
                $tree->nbsp = '&nbsp;&nbsp;&nbsp;';
                $op = "<option value='\$id' \$selected>\$spacer \$cname</option>";
                $tree->init($array);
                $data = $tree->get_tree(0, $op);

            }
            $this->assign('data', $data);
            $this->display("edit_good");
        }   
    }
    
    /**
     * 删除商品
     */
    public function deleteGood(){
        //删除
        $map=array(
            'id'=>$_POST['id']
        );
        $result=D('Good')->deleteData($map);
        if($result){
            $this->ajaxReturn(true);
        }else{          
            $this->ajaxReturn(false);
        }
    }

    /**
     * 添加分类页面展示
     */
    public function addTypePage(){
        $menu = D('Goodtype')->lists();
        $data = '';
        if ($menu) {
            //	生成树型结构
            $array = array();
            $tree = new \Org\Nx\Tree;
            foreach ($menu as $r) {
                $r['cname'] = $r['typename'];
                $array[] = $r;
            }
            $tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ',
                '&nbsp;&nbsp;&nbsp;└─ ');
            $tree->nbsp = '&nbsp;&nbsp;&nbsp;';
            $op = "<option value='\$id' \$selected>\$spacer \$cname</option>";
            $tree->init($array);
            $data = $tree->get_tree(0, $op);
        }
        $this->assign('lay', $data);
        $this->display('add_type');
    }

    /**
     * 编辑分类页面展示
     */
    public function editTypePage(){
        $map=array(
            'id'=>$_GET['id']
        );
        $goodtype=M('Goodtype')->where($map)->find();
        $menu = D('Goodtype')->lists();
        $data = '';
        if ($menu) {
            //	生成树型结构
            $array = array();
            $tree = new \Org\Nx\Tree;
            foreach ($menu as $r) {
                $r['cname'] = $r['typename'];
                $r['selected'] = $r['id'] == $goodtype['pid'] ? 'selected' : '';
                $array[] = $r;
            }
            $tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ',
                '&nbsp;&nbsp;&nbsp;└─ ');
            $tree->nbsp = '&nbsp;&nbsp;&nbsp;';
            $op = "<option value='\$id' \$selected>\$spacer \$cname</option>";
            $tree->init($array);
            $data = $tree->get_tree(0, $op);
        }
        $this->assign('lay', $data);
        $this->assign('name',$goodtype);
        $this->display('edit_type');
    }
    
    public function goodTypeList(){
        $menu = D('Goodtype')->lists();
        $data = '';
        if ($menu) {
            //	生成树型结构
            $array = array();
            $tree = new \Org\Nx\Tree;
            foreach ($menu as $r) {
                $r['cname'] = $r['typename'];
                $r['str_manage'] = '<button class="layui-btn layui-btn-small" deal="edit" aa="' . $r['id'] . '"><i class="layui-icon"></i></button><button class="layui-btn layui-btn-small" deal="del" aa="' . $r['id'] . '"><i class="layui-icon"></i></button>';
                $array[] = $r;
            }
            $str = "<tr>
                    <td><input type='checkbox' lay-skin='primary'></td>
                    <td>\$id</td>
				    <td >\$spacer\$cname</td>
				    <td >\$str_manage</td>
				</tr>";

            $tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ',
                '&nbsp;&nbsp;&nbsp;└─ ');
            $tree->nbsp = '&nbsp;&nbsp;&nbsp;';

            $tree->init($array);
            $data = $tree->get_tree(0, $str);
            //add and edit
            $op = "<option value='\$id' \$selected>\$spacer \$cname</option>";
            $tree->init($array);
            $lay = $tree->get_tree(0, $op);

        }
        $this->assign('data', $data);
        $this->assign('lay', $lay);
        $this->display("good_type_list");
    }
    
    public function addGoodType(){
        $data = I('post.');
        $result = D('Goodtype')->addData($data);
        if ($result) {
            $this->ajaxReturn(true);
        } else {
            $this->ajaxReturn(false);
        }
    }


    public function editGoodType(){
        $data = I('post.');
        $map = array(
            'id' => $data['id']
        );
        $result = D('Goodtype')->editData($map, $data);
        if ($result) {
            $this->ajaxReturn(true);
        } else {
            $this->ajaxReturn(false);
        }
    }
    
    /**
     * 删除节点
     */
    public function deleteGoodType(){
        //判断是否有子类 没有就返回false
        $data = array('status' => false);
        $where = array(
            'pid' => $_POST['id']
        );
        $son = D('Goodtype')->selectOne($where);
        if ($son) {
            $data['info'] = '当前节点含有子节点，请先删除子节点';
            $this->ajaxReturn($data);
        }
        //删除
        $map = array(
            'id' => $_POST['id']
        );
        $result = D('Goodtype')->deleteData($map);
        if ($result) {
            $data['status'] = true;
            $data['info'] = '删除成功';
            $this->ajaxReturn($data);
        } else {
            $data['info'] = '删除失败';
            $this->ajaxReturn($data);
        }
    }
    
    
     /**
     * 读取节点
     */
    public function SelectOneNode(){
        $map=array(
            'id'=>$_POST['id']
        );
    
        $data=D('Goodtype')->selectOne($map);
       
        if(!empty($data)){
            $data['returnMsg']=true;
            $this->ajaxReturn($data);
        }else{
            $data['returnMsg']=false;
            $this->ajaxReturn($data);
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
        // 如果是post提交则显示上传的文件 否则显示上传页面
        if(IS_POST){
            print_r($_POST);die;
        }else{
            $this->display();
        }
    }

    /**
     * 添加图片页面
     */
    public function addImg(){
        $data=I("get.");
        $map=array(
            'goodid'=>$data['id']
        );
        $resdata=M('goodimg')->where($map)->select();
        foreach ($resdata as &$vo){
            $vo['savepath']=__ROOT__.$vo['savepath'];
        }
        $count=M('goodimg')->where($map)->count();
        $last=5-$count;
        $assign=array(
            'list'=>$resdata,
            'last'=>$last,
            'id'=>$data['id']
        );
        $this->assign($assign);
        $this->display("add_img");
    }

    /**
     * 遍历添加图片
     */
    public function uploadImg(){
        $data=I('post.');

        $sqls=array();
        foreach ($data[image] as $v){
            $sqls[]="insert into ps_goodimg(goodid,savepath) VALUES (".$data[id].",'".$v."');";
        }
        $deal=D('Goodimg');
        $res=$deal->transExecuteSql($sqls);
        if ($res){
            $this->ajaxReturn(true);
        }else{
            $this->ajaxReturn(false);
        }
    }

    /**
     * 删除图片
     */

    public function deleteImg(){
        $map=I('post.');
        $result=M('goodimg')->where($map)->delete();
        if($result){
            $this->ajaxReturn(true);
        }else{
            $this->ajaxReturn(false);
        }
    }

    public function addModelImg(){
        if (IS_GET){
            $map=array(
                'id'=>$_GET['id']
            );
            $data=M('good')->where($map)->find();
            $data['imgcontent']=json_decode($data['imgcontent'],true);
            $this->assign('good',$data);
            $this->display("add_model_img");
        }else{
            $this->error('页面错误');
        }

    }

    /**
     * 上传人物模型
     */
    public function uploadImgModel(){
        if (IS_AJAX){
            $receive=I('post.');
            if($receive['image']==null||$receive['position']==null){
                $this->ajaxReturn(false);
            }
            $map=array('id'=>$receive['id']);
            $data=M('good')->field('id,imgcontent')->where($map)->find();
            if(empty($data['imgcontent'])){
                $arr=array(
                    'left'=>'',
                    'right'=>'',
                    'behind'=>'',
                    'front'=>''
                );
            }else{
                $arr=json_decode($data['imgcontent'],true);
            }
            $arr[$receive['position']]=$receive['image'][0];
            $data['imgcontent']=json_encode($arr);
            $res=M('good')->where($map)->save($data);
            if ($res) {
                $this->ajaxReturn(true);
            } else {
                $this->ajaxReturn(false);
            }

        }
    }

    /**
     * 删除衣服模型
     */

    public function deleteImgModel(){
        $data=I('post.');
        $map=array(
            'id'=>$data['id']
        );
        $recData=M('good')->where($map)->find();
        $img=json_decode($recData['imgcontent'],true);
        $img[$data['pos']]='';
        $recData['imgcontent']=json_encode($img);
        $res=M('good')->where($map)->save($recData);
        if($res){
            $this->ajaxReturn(true);
        }else{
            $this->ajaxReturn(false);
        }
    }

    /**
     * 添加衣服规格
     */
    public function addSize(){
        $data=I('get.');
        $map=array(
            'good_id'=>$data['id']
        );
        $size=M('size')->where($map)->select();
        $this->assign('size',$size);
        $this->assign('id',$data['id']);
        $this->display('add_size');
    }

    public function addSizeDeal(){
        $data=I('post.');
        $size=array(
            'good_id'=>$data['id'],
            'size'=>$data['size']
        );
        $res=M('size')->add($size);
        if($res){
            $this->ajaxReturn(true);
        }else{
            $this->ajaxReturn(false);
        }
    }

    public function deleteSize(){
        $data=I('post.');
        $map=array(
            'id'=>$data['id']
        );
        $res=M('size')->where($map)->delete();
        if($res){
            $this->ajaxReturn(true);
        }else{
            $this->ajaxReturn(false);
        }
    }
}