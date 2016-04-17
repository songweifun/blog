<?php

/**
 * 公共控制器
 * Class CommonController
 */
class CommonController extends Controller{

    public function __init(){

        $categorys=M('category')->where(array('isoff'=>0))->select();//栏目

        $where=array();
        $where['isdel']=0;
        $where['_logic']='AND';
        $where['isoff']=0;
        $newarticles=K('article')->where($where)->order('time desc')->limit(6)->select();//最新文章

        $where=array();
        $where['isdel']=0;
        $where['_logic']='AND';
        $where['isoff']=0;
        $newcomment=K('comment')->field('comment.content,comid,article.aid')->where($where)->order('comment.time desc')->limit(6)->select();//最新评论

        $articlecount=K('article')->where($where)->count();//文章总数
        $commentcount=K('comment')->where($where)->count();//评论总数
        $clickcount=K('article')->where($where)->sum('click');//浏览总数

        $this->assign('newarticles',$newarticles);
        $this->assign('categorys',$categorys);
        $this->assign('newcomment',$newcomment);
        $this->assign('articlecount',$articlecount);
        $this->assign('commentcount',$commentcount);
        $this->assign('clickcount',$clickcount);
    }


}

?>