<?php
/**
 * 博文控制器
 */

class ArticleController extends CommonController{

    /**
     * 添加博文
     */
    public function addArticle(){
        if(IS_POST){
            $data=$this->getData();
            if(M('article')->add($data)){
                $this->success('添加博文成功');
            }else{
                $this->success('添加博文失败');
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
        $total=$db->getTotal();
        $page=new page($total);
        $articles=$db->getCategorys($page->limit());
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
        return $this->display();
    }

    /**
     *
     * 添加博文
     */

    public function getData()

    {
        $data=array();
        $upload = new upload();
        $uplofiles =$upload->upload();
        //p($uplofiles);exit;
        if($uplofiles){
            //$data['thumb']=__ROOT__.'/'.$uplofiles[0]['dir'].$uplofiles[0]['name'].'_300x210.'.$uplofiles[0]['ext'];
            $img = new image();
            $img->thumb($uplofiles[0]['path'],APP_PATH.$uplofiles[0]['dir'].$uplofiles[0]['name'].'_300x210.'.$uplofiles[0]['ext'],300,210,2);
            $data['thumb']=__ROOT__.'/'.$uplofiles[0]['dir'].$uplofiles[0]['name'].'_300x210.'.$uplofiles[0]['ext'];
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