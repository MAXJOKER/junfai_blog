<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
	<head>
		<title>不来彼方</title>
		<meta charset="utf-8">
		<meta name="keywords" content="不来彼方">
		<meta name='description' content='在这里，读懂关于钧辉的一切。'>
		<link rel="stylesheet" type="text/css" href=".__PUBLIC__/Css/main.css" />
		<link rel="stylesheet" type="text/css" href=".__PUBLIC__/Css/other.css" />

		<script type="text/javascript" src=".__PUBLIC__/Js/jquery-1.11.2.min.js"></script>
		<script type="text/javascript" src=".__PUBLIC__/Js/main.js"></script>

	</head>
		<div class='bg-image'></div>
		<div id="left">
	    	<div id="information">
	        	<!--<div class="pic">-->
	        		<a href="<?php echo U('Home/Index/aboutMe'); ?>"><img src=".__PUBLIC__/Image/me.png" alt="Junhui"/></a>
	            <!--</div>-->
	            <!-- <span class="user">关于钧辉的一切</span> -->
	            <span class='user'><?php echo C("BLOG_NAME");?></span>
	            <!-- <span>做个有力量的人</span> -->
	            <span><?php echo ($user[0]['introduce']); ?></span>
	        </div>
	        <div id="menu">
	        	<ul>
	            	<li><a href="<?php echo U('Home/Index/index'); ?>" class="menulist">主页 | HOME</a></li>
	                <li><a href="<?php echo U('Home/Article/essay');?>" class="menulist">随笔 | ESSAY</a></li>
	                <li><a href="<?php echo U('Home/Article/note');?>" class="menulist">笔记 | NOTE</a></li>
	                <li><a href="<?php echo U('Home/Index/picture'); ?>" class="menulist">图片 | PICS</a></li>
	                <li><a href="<?php echo U('Home/Index/aboutMe'); ?>" class="menulist">关于 | ABOUT</a></li>
	            </ul>
	        </div><!--menu-->
	    </div><!--left-->
	    <div id="footer">
		
		</div><!--end of footer-->
<html>

<body>
<div id="container">     
    <div id="right">
        
        <?php if(is_array($article)): foreach($article as $key=>$item): ?><div class='info'>
                <div class='header_info'>
                    <div class='date'>
                        <div class='day'>
                            <?php echo (date('d',strtotime($item["posttime"]))); ?>
                        </div>
                        <div class='month'>
                            <?php echo (date('M',strtotime($item["posttime"]))); ?>
                        </div>
                    </div><!-- end of date -->
                    <div class='article_header'>
                        <h3 class='title'>
                            <a href='#'><?php echo ($item["title"]); ?></a>
                        </h3>
                        <div class='author'>
                            <!-- <?php echo ($item["author"]); ?> -->
                            <a href="<?php echo U('Home/Article/author',array('author'=>$item['author']));?>"><?php echo ($item["author"]); ?></a>
                        </div>
                        <div class='comments'>
                            <a href='#'><?php echo ($item["commentcount"]); ?> 条评论</a>
                        </div>
                        <div class='tags'>
                            <!-- <a href="#"><?php echo ($item["tags"]); ?></a> -->
                            <!-- 循环输出标签 -->
                            <?php if(is_array($item['tags'])): $i = 0; $__LIST__ = $item['tags'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$t): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Home/Article/tags',array('tag'=>$t));?>"><?php echo ($t); ?></a>&nbsp;&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                    </div><!-- end of article_header-->
                </div><!-- end of header_info-->
                <div class='clearFix'></div>
                <div class='contents'>
                    <?php echo (htmlspecialchars_decode($item["content"])); ?>
                </div>
            </div><!-- end of info --><?php endforeach; endif; ?>
    </div><!--end of right-->
</div><!--end of container-->
</body>
</html>