<?php
//测试控制器类
class IndexController extends CommonController{
    //动作方法
    public function index(){
        //显示视图
        $this->display();
    }
}
