<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<link rel="stylesheet" href="http://localhost/blog/Blog/Admin/View/Public/css/public.css" />
	<title></title>
</head>
<body>
	<form action="<?php echo U('Admin/System/editPasswd');?>" method="post" name="myForm">
		<table class="table">
			<tr >
				<td class="th" colspan="2">修改密码</td>
			</tr>
			<tr>
				<td>用户名</td>
				<td><?php echo $hd['session']['username'];?></td>
			</tr>
			<tr>
				<td>密码：</td>
				<td><input type="password" name="password" id="password"/></td>
			</tr>
			<tr>
				<td>确认密码：</td>
				<td><input type="password" name="repassword" id="repassword"/></td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" value="修改" class="input_button" id="sub"/>
					<input type="reset" class="input_button"/>
				</td>
			</tr>
		</table>
	</form>
<script>
	document.myForm.sub.onclick=function(){
		if(document.myForm.password.value=='') {
			alert('密码不能为空');
			return false;
		}

		if(document.myForm.password.value.length<6) {
			alert('密码不能少于6位');
			return false;
		}

	if(document.myForm.password.value!=document.myForm.repassword.value) {
		alert('两次输入密码不一致');
		return false;

	}
}
</script>
</body>
</html>