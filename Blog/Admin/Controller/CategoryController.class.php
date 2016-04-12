<?php
/**
 * 栏目管理控制器
 */
class CategoryController extends CommonController{

    /**
     * 添加栏目
     */
    public function addCategory(){

        if(IS_POST){
            $cid=Q('get.cid',null,array('intval'));
            $data=$this->getData();
            //p($data);exit;
            $db=M('category');
          if($cid!=null){//存在栏目时编辑

              if ($db->where(array('cid'=>$cid))->save($data)) {
                  $this->success('编辑栏目成功');
              } else {
                  $this->error('编辑栏目失败');
              }

          }else {//不存在添加
              if ($db->add($data)) {
                  $this->success('添加栏目成功');
              } else {
                  $this->error('添加栏目失败');
              }
          }
        }
        $this->display();
    }

    /**
     * 查看栏目
     */
    public function checkCategory(){
        $db=M('category');
        $total=$db->count();
        $page=new page($total);
        $data=$db->limit($page->limit())->select();
        //p($data);exit;
        $this->assign('categorys',$data);
        $this->assign('page',$page->show());
        $this->display();
    }


    /**
     * 开启关闭栏目
     */
    public function isoff()
    {
        if(IS_AJAX==false) exit('非法访问');
       $cid=Q('get.cid',null,array('intval'));
       $status=Q('get.status',null,array('intval'));

        $db=M('category');
        if($status==1){
            $db->where(array('cid'=>$cid))->save(array('isoff'=>0));

        }else{
            $db->where(array('cid'=>$cid))->save(array('isoff'=>1));
        }
        exit(json_encode(array('status'=>$status)));

    }

    /**
     * 编辑栏目
     */
    public function edit()
    {
        $cid=Q('get.cid',null,array('intval'));
        $data=M('category')->where(array('cid'=>$cid))->find();
        $this->assign('category',$data);
        $this->display();
    }

    /**
     * 删除栏目
     */
    public function delcategory()
    {
        $cid=Q('get.cid',null,array('intval'));
        if(M('category')->where(array('cid'=>$cid))->del()){
            $this->success('删除栏目成功');
        }else{
            $this->error('删除栏目失败');
        }
    }

    /**
     * 获得post数据并处理
     * @return array
     */
    public function getData()
    {
        $data=array();
        $data['cname']=Q('post.cname',null,array('htmlspecialchars'));
        $data['isoff']=Q('post.isoff',null,array('intval'));
        $data['keywords']=Q('post.keywords',null,array('htmlspecialchars'));
        $data['description']=Q('post.description',null,array('htmlspecialchars'));

        return $data;
    }
}
?>