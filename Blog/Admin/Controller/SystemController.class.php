
<?php

/**
 * 系统管理控制器
 */
class SystemController extends CommonController{
    /**
     * 系统信息
     */
    public function index(){
        $this->display();
    }
    /**
     * 修改密码
     */
    public function editPasswd(){
        if(IS_POST){
            $adminid=$_SESSION['adminid'];
            $password=Q('post.password',null,array('strip_tags'));
            $repassword=Q('post.repassword',null,array('strip_tags'));
            if(strlen($password)<6) $this->error('密码不能少于6位');
            if($password!=$repassword) $this->error('两次密码输入不一致,无法修改');
            if(M('admin')->where(array('adminid'=>$adminid))->save(array('password'=>md5($password)))){
                $this->success('修改密码成功');
            }
        }
        $this->display();
    }
}

?>