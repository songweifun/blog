<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<link rel="stylesheet" href="http://localhost/blog/Blog/Admin/View/Public/css/public.css" />
	<title></title>
</head>
<body>
	<form action="<?php echo U('Admin/Category/addCategory');?>" method="post">
		<table class="table">
			<tr >
				<td class="th" colspan="2">添加栏目</td>
			</tr>
			<tr>
				<td>栏目名称</td>
				<td><input type="text" name="cname" id="cname"/></td>
			</tr>
			<tr>
				<td>开启状态</td>
				<td>
					<input type="radio" name="isoff" value="0" checked="checked"/>开启
					<input type="radio" name="isoff" value="1" />关闭
				</td>

			</tr>
			<tr>
				<td>关键字</td>
				<td><input type="text" name="keywords" id="keywords"/></td>
			</tr>
			<tr>
				<td>描述</td>
				<td>
					<textarea name="description" id="description" class="textarea"></textarea>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" value="添加" class="input_button"/>
					<input type="reset" class="input_button" id="resetCategory"/>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>
<script>
	//$('#resetCategory').click(function(){
		//$(this).parent.siblings('#cname').val('');
	//})
</script>