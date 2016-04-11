<?php
/**
 * 公共控制器
 */
class CommonController extends Controller{

 public function __init(){
   if(method_exists($this,'__auto')){
       $this->__auto();
   }
     if(!isset($_SESSION['adminid']) || !isset($_SESSION['username']))
         go('Admin/Login/index');
}
}
?>