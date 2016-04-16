<?php
/**
 * 博文控制器
 */

class ArticleController extends CommonController{

    /**
     * 添加博文
     */
    public function addArticle(){
        $aid=Q('get.aid',null,array('intval'));
        if(IS_POST){
            $data=$this->getData();
            if($aid==null) {//添加
                if (M('article')->add($data)) {
                    $this->success('添加博文成功');
                } else {
                    $this->success('添加博文失败');
                }
            }else{//修改

                if (M('article')->where(array('aid'=>$aid))->save($data)) {
                    $this->success('编辑博文成功');
                } else {
                    $this->success('编辑博文失败');
                }

            }

        }
        $category=M('category')->select();
        $this->assign('category',$category);

        $this->display();
    }
    /**
     * 博文列表
     */
    public function checkArticle()
    {
/*
        $total =M()->join('__category__ c JOIN __article__ a ON c.cid=a.cid')->count();
        $page=new page($total);
        $articles=M()->join('__category__ c JOIN __article__ a ON c.cid=a.cid')->limit($page->limit())->select();
*/
        $db=K('Article');
        $where=array('isdel'=>0);
        $total=$db->getTotal($where);
        $page=new page($total);

        $articles=$db->getCategorys($page->limit(),$where);
        $this->assign('page',$page->show());

        //$articles=M('article')->select();

        $this->assign('articles',$articles);
        return $this->display();
    }

    /**
     * 博文回收站
     */

    public function recycleArticle()
    {

        $db=K('Article');
        $where=array('isdel'=>1);
        $total=$db->getTotal($where);
        $page=new page($total);

        $articles=$db->getCategorys($page->limit(),$where);
        $this->assign('page',$page->show());

        //$articles=M('article')->select();

        $this->assign('articles',$articles);

        return $this->display();
    }

    /**
     * 置顶博文
     */
    public function istop(){

        $aid=Q('get.aid',null,array('intval'));
        $status=Q('get.status',null,array('intval'));
        if($status==0){
            M('article')->where(array('aid'=>$aid))->save(array('istop'=>1));
        }else{
            M('article')->where(array('aid'=>$aid))->save(array('istop'=>0));
        }
        $this->success('操作成功');
    }
    /**
     * 编辑博文
     */

    public function editArticle(){
        $aid=Q('get.aid',null,array('intval'));
        $article=M('article')->where(array('aid'=>$aid))->find();
        $this->assign('article',$article);

        $category=M('category')->select();
        $this->assign('category',$category);
        $this->display();
    }

    /**
     *将文章移入回收站
     * @return array
     */
    public function isdel()
    {
        $aid=Q('get.aid',null,array('intval'));
        $status=Q('get.status',null,array('intval'));
        if($status==0) {
            if (M('article')->where(array('aid' => $aid))->save(array('isdel' => 1))) {
                $this->success('文章成功移入回收站');
            }
        }else{

            if (M('article')->where(array('aid' => $aid))->save(array('isdel' => 0))) {
            $this->success('文章成功从回收站恢复',U('checkArticle'));
             }
        }

    }

    /**
     * 彻底删除文章
     */
    public function delAriticle()
    {
        $aid=Q('get.aid',null,array('intval'));
        M('comment')->where(array('aid'=>$aid))->del();
        M('article')->where(array('aid'=>$aid))->del();
        $this->success('删除博文成功');
    }

    /**
     *
     * 过滤post数据
     */

    public function getData()

    {
        $data=array();
        $upload = new upload();
        $uplofiles =$upload->upload();
        //p($uplofiles);exit;
        if($uplofiles){

            //如果存在old说明是编辑
            if(isset($_POST['old_img'])){
                //$pathInfo=pathinfo($_POST['old_img']);

                unlink($_POST['old_img']);
                //p($pathInfo);exit;
            }

            $img = new image();
            $thumb=$uplofiles[0]['dir'].date("Y-m-d").'/'.$uplofiles[0]['name'].time().'_300x210.'.$uplofiles[0]['ext'];
            $img->thumb($uplofiles[0]['path'],$thumb,300,210,2);
            $data['thumb']=$thumb;
            unlink($uplofiles[0]['path']);
        }
        $data['title']=Q('post.title',null,array('strip_tags'));
        $data['content']=Q('post.content',null);
        $data['cid']=Q('post.cid',null,array('intval'));
        $data['suminfo']=mb_substr(Q('post.content',null,array('strip_tags')),0,100,'UTF-8');
        $data['click']=Q('post.click',null,array('intval'));
        $data['time']=time();
       return $data;
    }
}
?>