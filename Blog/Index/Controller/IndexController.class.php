<?php
//测试控制器类
class IndexController extends Controller{
    //动作方法
    public function index(){

        $db=K('Article');
        $where=array('isdel'=>0);
        $total=$db->getTotal($where);
        $page=new page($total,2);

        $articles=$db->getCategorys($page->limit(),$where);
        $this->assign('page',$page->show());


        $this->assign('articles',$articles);
        //显示视图
        $this->display();
    }
}
