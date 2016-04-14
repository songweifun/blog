<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<link rel="stylesheet" href="http://localhost/blog/Blog/Admin/View/Public/css/public.css" />
	<title></title>
</head>
<body>
	<form action="<?php echo U('Admin/Article/addArticle');?>" method="post" enctype="multipart/form-data">
		<table class="table">
			<tr >
				<td class="th" colspan="2">添加博文</td>
			</tr>
			<tr>
				<td>博客标题</td>
				<td>
					<input type="text" name="title" class="title"/>
				</td>
			</tr>
			<tr>
				<td>缩略图</td>
				<td><input type="file" name="thumb"/></td>
			</tr>
			<tr>
				<td>栏目</td>
				<td>
					<select name='cid'>
						<option value="0">====选择栏目====</option>
						<?php foreach ($category as $k=>$v){?>
						<option value="<?php echo $v['cid'];?>"><?php echo $v['cname'];?></option>
						<?php }?>
					</select>
				</td>

			</tr>
			<tr>
				<td>内容</td>
				<td>
					<textarea id="editor_id" name="content" style="width:700px;height:300px;"></textarea>

				</td>
			</tr>
			<tr>
				<td>点击次数</td>
				<td>
					<input type="" name='click' value="100"/>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" value="发表" class="input_button"/>
					<input type="reset" class="input_button"/>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>