<?php

/**
 * 评论,文章,栏目三表关联模型
 */
class CommentModel extends ViewModel{

    public $table='comment';
    public $view = array(
        'comment' => array(
            '_type' => 'inner',
            //'_on'=>'article.cid=category.cid'
        ),
        'article'=>array(

            '_type' => 'inner',
            '_on'=>'comment.aid=article.aid'
        ),
        'category'=>array(
            '_type' => 'inner',
            '_on'=>'article.cid=category.cid'
        )
    );
}

?>