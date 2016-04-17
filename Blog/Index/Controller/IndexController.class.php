<?php
//测试控制器类
class IndexController extends CommonController{
    //动作方法
    public function index(){

        $db=K('Article');
        $where=array();
        $where['isdel']=0;
        $where['_logic']='AND';
        $where['isoff']=0;
        $total=$db->getTotal($where);
        $page=new page($total,2);

        $articles=$db->getCategorys($page->limit(),$where);
        $this->assign('page',$page->show());


        $this->assign('articles',$articles);
        //显示视图
        $this->display();
    }

    /**
     * 博文列表
     */
    public function article_list(){
        $db=K('Article');
        $where=array();
        $where['isdel']=0;
        $where['_logic']='AND';
        $where['isoff']=0;
        $total=$db->where($where)->count();
        $page=new page($total,2);

        $articles=$db->field('title,time,aid,istop')->where($where)->order('istop desc')->limit($page->limit())->select();
        $this->assign('page',$page->show());


        $this->assign('articles',$articles);

        $this->display();
    }

    /**
     * 筛选栏目文章
     */
    public function category(){
        $cid=Q('get.cid',null,array('intval'));
        $db=K('Article');
        $where=array();
        $where['isdel']=0;
        $where['_logic']='AND';
        $where['article.cid']=$cid;
        $total=$db->getTotal($where);
        $page=new page($total,2);

        $articles=$db->getCategorys($page->limit(),$where);
        $this->assign('page',$page->show());


        $this->assign('articles',$articles);
        $this->display();
    }

    /**
     * 了解后盾
     */
    public function about(){
        $this->display();
    }
}
