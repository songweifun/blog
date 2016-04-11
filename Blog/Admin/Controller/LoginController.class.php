<?php
/**
 * 后台登录控制器
 */
class LoginController extends Controller{
    public function index()
    {

        $this->display();
    }

    /**
     * 显示验证码
     */
    public function showCode(){
        $code=new code();
        $code->show();
    }
}

?>