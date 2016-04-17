<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
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
        if (empty($newarticles)) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($newarticles as $n) {
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
                $hd['list'][n]['last']= (count($newarticles)-1 <= $listId);
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
        if (empty($newarticles)) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($newarticles as $n) {
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
                $hd['list'][n]['last']= (count($newarticles)-1 <= $listId);
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


                    <?php
        //初始化
        $hd['list']['n'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($newcomment)) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($newcomment as $n) {
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
                $hd['list'][n]['last']= (count($newcomment)-1 <= $listId);
                //总数
                $hd['list'][n]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
                <li><a href="<?php echo U('Index/Article/index');?>/aid/<?php echo $n['aid'];?>"><?php echo $n['content'];?></a></li>
            <?php }}?>
        </ul>
    </div>
    <!-- 最新回复结束 -->
    <!-- 结果统计 -->
    <div class="right_little_box">
        <p class="right_tittle">站点统计</p>
        <ul class="right_des count_bg">
            <li>文章总数：<span><?php echo $articlecount;?></span></li>
            <li>回复总数：<span><?php echo $commentcount;?></span></li>
            <li>浏览总数：<span><?php echo $clickcount;?></span></li>
        </ul>
    </div>
    <!-- 结果统计结束 -->
</div>