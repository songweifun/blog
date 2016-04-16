<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>后盾网博客-</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link rel="stylesheet" href="http://localhost/blog/Blog/Index/View/Public/css/article.css" />
	<script type="text/javascript" src="http://localhost/blog/Blog/Index/View/Public/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="http://localhost/blog/Blog/Index/View/Public/js/index.js"></script>
	<link rel="stylesheet" href="http://localhost/blog/Blog/Index/View/Public/css/index.css" />
</head>
<body>
	<!-- 头部 -->
	<div id="wrapper"></div>
	<div id="top">
		<!-- 头部左侧 -->
		<div id="top_left">
			<p id="logo"></p>
			<span>强大的后盾网，我们永远的后盾！</span>
		</div>
		<!-- 头部右侧(导航条) -->
		<div id="top_right">
			<ul>
				<li><a href="">主页</a></li>
				<li><a href="">博文</a></li>
				<li><a href="">了解后盾</a></li>
			</ul>
			<p id="bar"></p>
		</div>
	</div>
	<!-- 头部结束 -->
	<!-- 发布内容区域 -->
	<div id="arc" >
		<!-- 左侧区域 -->
		<div class="arc_left_box_read">
			<div class="arc_show_read">
				<h2>文章阅读</h2>
				<b>
					<span>创作于：</span>
					<span class="red"><?php echo date('Y-m-d',$article['time']);?></span>
					<span>栏目：</span>
					<span class="red"><?php echo $article['cname'];?>&nbsp&nbsp</span>
					<span>阅读：</span>
					<span class="red"><?php echo $article['click'];?>次</span>
				</b>
				
			</div>
			<div class="arc_left_read">

				<div class="arc_left_content">
					<p class="arc_tittle_read"><?php echo $article['title'];?></p>
					<div class="arc_read"><?php echo $article['content'];?></div>
				</div>
			</div>
			<!-- 用户留言区域 -->
			<div id="msg_read">
				<p id="msg_tittle">用户评论</p>
				<ul>
					        <?php
        //初始化
        $hd['list']['n'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($comments)) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($comments as $n) {
                //开始值
                if ($listId<0) {
                    $listId++;
                    continue;
                }
                //步长
                if($listId!=$listNextId){$listId++;continue;}
                //显示条数
                if($listShowNum>=100)break;
                //第几个值
                $hd['list'][n]['index']++;
                //第1个值
                $hd['list'][n]['first']=($listId == 0);
                //最后一个值
                $hd['list'][n]['last']= (count($comments)-1 <= $listId);
                //总数
                $hd['list'][n]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
					<li>
						<b><?php echo $hd['list']['n']['index'];?>楼</b>&nbsp&nbsp
						<span><?php echo $n['nickname'];?></span>&nbsp&nbsp
						<em><?php echo date('Y-m-d',$n['time']);?></em>
						<br />
						<br />
						<p><?php echo $n['content'];?></p>
						<br />
					</li>
					<?php }}?>
				</ul>
			</div>
			<div class="page">
				<?php echo $page;?>
			</div>
			<!-- 用户留言区域结束 -->

			<!-- 用户发布留言区域 -->
			<div id="send_content">
				<form action="<?php echo U('Index/Article/addComment');?>/aid/<?php echo $article['aid'];?>" method="POST" name="myForm">
					<table class="table">
						<tr>
							<td>
								<input type="text" name="nickname" id="uname"/>&nbsp&nbsp昵称(必填)<span class="star">*</span>
							</td>
						</tr>
						<tr>
							<td>
								<input type="text" name="code" id="verify"/>
								<img src="<?php echo U('Index/Article/codeShow');?>" alt="" id="verify_img"/>
								&nbsp&nbsp验证码(必填)<span class="star">*</span>
							</td>
						</tr>
						<tr>
							<td><textarea name="content" id="contents"></textarea></td>
						</tr>
						<tr>
							<td>
								◎欢迎参与讨论，请在这里发表您的看法、交流您的观点。
								<!--
								<input type="text" value="<?php echo $hd['session']['code'];?>" id="scode"/>
								-->
								<input type="submit" value="提交评论" id="sub"/>
							</td>
						</tr>
					</table>
					
				</form>
			</div>
			<script>
				document.myForm.sub.onclick=function(){
					//alert(<?php echo $hd['session'];?>)
					if(document.myForm.uname.value==''|| document.myForm.verify.value=='') {
						alert('用户名或验证码不能为空');

						return false;
					}


					/*var code=document.myForm.scode.value;
					alert(code);

					if(document.myForm.verify.value!=code){
						//alert(<?php echo $hd['session']['cid'];?>);
						alert('验证码不正确');
						return false;
					}*/
				}

			</script>
			<!-- 用户发布留言区域结束 -->
		</div>
		<!-- 左侧区域结束 -->
		<!-- 右侧区域 -->
		<div class="arc_right_box">
			<!-- 关于后盾网 -->
			<div class="right_little_box">
				<p class="right_tittle">关于后盾网</p>
				<a href=""><img src="http://localhost/blog/Blog/Index/View/Public/images/houdunwang.jpg" alt="" id="logo_img"/></a>
				<ul class="right_des">
					<li>北京后盾计算机技术培训有限责任公司是专注于培养中国互联网优秀的程序语言专业人才的专业型培训机构。</li>
				</ul>
			</div>
			<!-- 关于后盾网 -->

			<!-- 栏目列表 -->
			<div class="right_little_box">
				<p class="right_tittle">栏目列表</p>
				
				<ul class="right_category">
					        <?php
        //初始化
        $hd['list']['n'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($categorys)) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($categorys as $n) {
                //开始值
                if ($listId<0) {
                    $listId++;
                    continue;
                }
                //步长
                if($listId!=$listNextId){$listId++;continue;}
                //显示条数
                if($listShowNum>=100)break;
                //第几个值
                $hd['list'][n]['index']++;
                //第1个值
                $hd['list'][n]['first']=($listId == 0);
                //最后一个值
                $hd['list'][n]['last']= (count($categorys)-1 <= $listId);
                //总数
                $hd['list'][n]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
					<li><a href="<?php echo U('Index/Article/category');?>/cid/<?php echo $n['cid'];?>"><?php echo $n['cname'];?></a></li>
					<?php }}?>
				</ul>
			</div>
			<!-- 栏目列表结束 -->
			<!-- 最新文章 -->
			<div class="right_arc_little_box">
				<p class="right_tittle">最新文章</p>
				<div class="hot_arc">
					<div class="arc_js_move">
						<div class="right_roll">
							<ul class="right_des">
								        <?php
        //初始化
        $hd['list']['n'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($articles)) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($articles as $n) {
                //开始值
                if ($listId<0) {
                    $listId++;
                    continue;
                }
                //步长
                if($listId!=$listNextId){$listId++;continue;}
                //显示条数
                if($listShowNum>=100)break;
                //第几个值
                $hd['list'][n]['index']++;
                //第1个值
                $hd['list'][n]['first']=($listId == 0);
                //最后一个值
                $hd['list'][n]['last']= (count($articles)-1 <= $listId);
                //总数
                $hd['list'][n]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
									<li><a href="<?php echo U('Index/Article/index');?>/aid/<?php echo $n['aid'];?>"><?php echo $n['title'];?></a></li>
								<?php }}?>
							</ul>
						</div>

						<div class="right_roll">
							<ul class="right_des">
								        <?php
        //初始化
        $hd['list']['n'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($articles)) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($articles as $n) {
                //开始值
                if ($listId<0) {
                    $listId++;
                    continue;
                }
                //步长
                if($listId!=$listNextId){$listId++;continue;}
                //显示条数
                if($listShowNum>=100)break;
                //第几个值
                $hd['list'][n]['index']++;
                //第1个值
                $hd['list'][n]['first']=($listId == 0);
                //最后一个值
                $hd['list'][n]['last']= (count($articles)-1 <= $listId);
                //总数
                $hd['list'][n]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
									<li><a href="<?php echo U('Index/Article/index');?>/aid/<?php echo $n['aid'];?>"><?php echo $n['title'];?></a></li>
								<?php }}?>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- 最新文章结束 -->
			<!-- 最新回复 -->
			<div class="right_little_box">
				<p class="right_tittle">最新回复</p>
				<ul class="right_answer">
					<li><a href="">支持后盾网</a></li>
				</ul>
			</div>
			<!-- 最新回复结束 -->
			<!-- 结果统计 -->
			<div class="right_little_box">
				<p class="right_tittle">站点统计</p>
				<ul class="right_des count_bg">
					<li>文章总数：<span>20篇</span></li>
					<li>回复总数：<span>20条</span></li>
					<li>浏览总数：<span>20次</span></li>
				</ul>
			</div>
			<!-- 结果统计结束 -->
		</div>
		<!-- 右侧区域结束 -->

	</div>
	<!-- 发布内容区域结束 -->
	<!-- 返回顶部按钮 -->
	<div>
		<a href="javascript:void(0)" id="back_top"></a>
	</div>
	<!-- 返回顶部结束 -->
	<!-- 底部foot区域 -->
	<div id="foot_box">
		<div id="foot">
			<p id="foot_l">Copyright © 2013-2013 xiaofan. All rights reserved.</p>
			<p id="foot_r">
			
			</p>
		</div>
	</div>

	</div>
	<!--[if IE 6]>
    <script type="text/javascript" src="http://localhost/blog/Blog/Index/View/Public/js/iepng.js"></script>
    <script type="text/javascript">
        DD_belatedPNG.fix('#arc .arc_left .arc_left_date p,#arc .arc_left_box #foucs_photo .foucs_photo_l img','background');
    </script>
	<![endif]-->
</body>
</html>
	<!-- 底部foot区域结束 -->