<?php

/**
 * 文章控制器
 * Class ArticleController
 */
class ArticleController extends Controller{

    public function index(){
    $aid=Q('get.aid',null,array('intval'));
     $article=K('Article')->getOneArticle($aid);//文章详情
     $this->assign('article',$article);
        $db=M('comment');
        $total=$db->where(array('aid'=>$aid))->count();
        $page=new page($total,3);
        $comments=$db->where(array('aid'=>$aid))->order('time asc')->limit($page->limit())->select();//评论详情
        $categorys=M('category')->select();//栏目
        $articles=M('article')->order('time desc')->limit(6)->select();//最新文章
        $this->assign('articles',$articles);
        $this->assign('categorys',$categorys);
        $this->assign('comments',$comments);
        $this->assign('page',$page->show());

        $this->display();
    }

    /**
     * 显示验证码
     */
    public function codeShow(){
        $code =new code();
        $code->show();
    }

    /**
     * 添加评论
     */

    public function addComment(){
        //p($_SESSION);exit;


        if(IS_POST==false) return false;
       $code=Q('post.code',null,array('strtoupper'));
        //p($code);
        if($code!=$_SESSION['code']){
            $this->error('验证码错误');
        }

        $data=$this->getData();
        if(M('comment')->add($data)){
            $this->success('评论成功');
        }

    }

    /**
     * 栏目详情页
     * @return array
     */
    public function category(){

        $this->display();
    }

    public function getData(){
        $data=array();
        $data['aid']=Q('get.aid',null,array('intval'));
        $data['nickname']=Q('post.nickname',null,array('strip_tags'));
        $data['content']=Q('post.content',null,array('strip_tags'));
        $data['time']=time();
        return $data;


    }

}
?>