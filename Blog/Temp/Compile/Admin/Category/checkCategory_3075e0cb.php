<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" href="http://localhost/blog/Blog/Admin/View/Public/css/public.css" />
	<script type="text/javascript" src="http://localhost/blog/Blog/Admin/View/Public/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="http://localhost/blog/Blog/Admin/View/Public/js/public.js"></script>
	<script type="text/javascript" src="http://localhost/blog/Blog/Admin/View/Public/js/category.js"></script>
</head>
<body>
	<table class="table">
		<tr>
			<td class="th" colspan="10">查看栏目</td>
		</tr>
		<tr>
			<th>CID</th>
			<th>栏目名称</th>
			<th>状态</th>
			<th>操作</th>
		</tr>
		<?php foreach ($categorys as $k=>$v){?>
		<tr>
			<td><?php echo $v['cid'];?></td>
			<td><a href=""><?php echo $v['cname'];?></a></td>
			    <?php if($v['isoff']==0){ ?>
			<td class="status">开启</td>
				<?php }else{ ?>
			<td class="status">关闭</td>
			<?php } ?>
			<td>
				    <?php if($v['isoff']==0){ ?>
					<a href="javascript:void(0);" class="isoff" url="<?php echo U('Admin/Category/isoff');?>/cid/<?php echo $v['cid'];?>" status="<?php echo $v['isoff'];?>">[关闭]</a>
			<?php }else{ ?>
						<a href="javascript:void(0);" class="isoff" url="<?php echo U('Admin/Category/isoff');?>/cid/<?php echo $v['cid'];?>" status="<?php echo $v['isoff'];?>">[开启]</a>
			<?php } ?>

				<a href="<?php echo U('Admin/Category/edit');?>/cid/<?php echo $v['cid'];?>" class="isoff" url="">[编辑]</a>
				<a href="<?php echo U('Admin/Category/delcategory');?>/cid/<?php echo $v['cid'];?>" class="del"   url="">[删除]</a>
			</td>
		</tr>
		<?php }?>
	</table>
		<div class="page">
			<a href=""><?php echo $page;?></a>
		</div>
</body>
</html>