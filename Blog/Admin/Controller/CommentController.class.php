<?php
/**
 * 评论控制器
 */
class CommentController extends CommonController{
    /**
     * 评论列表
     */
    public function checkComment(){
        $db=M('comment');
        $total=$db->count();
        $page=new page($total,3);
        $comments=$db->order('time asc')->limit($page->limit())->select();//评论详
        $this->assign('page',$page->show());
        $this->assign('comments',$comments);
        $this->display();
    }

    /**
     * 删除评论
     * @return array
     */
    public function delComment()
    {
        $comid=Q('get.comid',null,array('intval'));
        if(M('comment')->where(array('comid'=>$comid))->del()){
            $this->success('删除评论成功');
        }
    }


}
?>