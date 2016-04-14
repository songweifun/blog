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

    /**
     * 登录
     * @return array
     */
    public function login()
    {
        //print_const();exit;
        $username=Q('post.username');
        $passwd=Q('post.passwd',NULL,array('md5'));
        $code=Q('post.code',NULL,array('htmlspecialchars','strtoupper'));
        if($code!=$_SESSION['code']) $this->error('验证码不正确!');
         $user=M('admin')->field('adminid,password')->where(array('username'=>$username))->find();
        if(!$user || $passwd!=$user['password']) $this->error('用户名或密码错误');
        $_SESSION['adminid']=$user['adminid'];
        $_SESSION['username']=$username;
        $this->success('登陆成功,正在为您跳转......',U('Admin/Index/index'));
    }

    /**
     * 退出登录
     */
    public function quit()
    {
        session_unset();
        session_destroy();
        $this->success('退出成功!');
    }
}

?>