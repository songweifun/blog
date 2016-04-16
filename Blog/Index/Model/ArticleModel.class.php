<?php
class ArticleModel extends viewModel{
    public $table='article';
    public $view = array(
        'article' => array(
            '_type' => 'inner',
            //'_on'=>'article.cid=category.cid'
        ),
        'category'=>array(

            '_type' => 'inner',
            '_on'=>'article.cid=category.cid'
        )
);

    /**
     * 获得文章总数
     * @return mixed
     */
    public function getTotal($where)
    {
        return $this->where($where)->count();
    }

    /**
     * 获得文章数据
     * @return mixed
     */
    public function getCategorys($limit,$where)
    {
        return $this->where($where)->limit($limit)->select();
    }

    /**
     * 获取单个文章信息
     */
    public function getOneArticle($aid){
        return $this->where(array('aid'=>$aid))->find();
    }
}

?>