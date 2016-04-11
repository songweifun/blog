<?php
/**
 * 博文控制器
 */

class ArticleController extends CommonController{

    /**
     * 添加博文
     */
    public function addArticle(){

        $this->display();
    }
    /**
     * 博文列表
     */
    public function checkArticle()
    {
        return $this->display();
    }

    /**
     * 博文回收站
     */

    public function recycleArticle()
    {
        return $this->display();
    }
}
?>