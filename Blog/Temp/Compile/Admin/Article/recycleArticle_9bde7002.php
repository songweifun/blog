<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" href="http://localhost/blog/Blog/Admin/View/Public/css/public.css" />
	<script type="text/javascript" src="http://localhost/blog/Blog/Admin/View/Public/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="http://localhost/blog/Blog/Admin/View/Public/js/public.js"></script>
</head>
<body>
	<table class="table">
		<tr>
			<td class="th" colspan="10">被删博文</td>
		</tr>
		<tr>
			<td class="tdLittle1">AID</td>
			<td>标题</td>
			<td class="tdLittle2">博客分类</td>
			<td class="tdLtitle3">查看次数</td>
			<td class="tdLtitle4">创作时间</td>
			<td class="tdLtitle6">操作</td>
		</tr>
		<?php foreach ($articles as $k=>$v){?>
		<tr>
			<td><?php echo $v['aid'];?></td>
			<td><?php echo $v['title'];?></td>
			<td><?php echo $v['cname'];?></td>
			<td><?php echo $v['click'];?></td>
			<td><?php echo date('Y-m-d',$v['time']);?></td>
			<td>
				<a href="<?php echo U('Admin/Article/isdel');?>/aid/<?php echo $v['aid'];?>/status/<?php echo $v['isdel'];?>">[恢复]</a>
				<a href="<?php echo U('Admin/Article/delAriticle');?>/aid/<?php echo $v['aid'];?>" class="del">[彻底删除]</a>
			</td>
		</tr>
		<?php }?>
	</table>
</body>
</html>