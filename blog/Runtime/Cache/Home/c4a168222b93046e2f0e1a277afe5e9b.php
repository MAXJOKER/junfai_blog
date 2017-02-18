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
    <!--<head>
        <meta charset="utf-8">
        <title>不来彼方</title> -->
<!-- SAE -->
<!-- <link rel="stylesheet" type="text/css" href=".__PUBLIC__/Css/main.css" />
<link rel="stylesheet" type="text/css" href=".__PUBLIC__/Css/other.css" />

<script type="text/javascript" src=".__PUBLIC__/Js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src=".__PUBLIC__/Js/main.js"></script> -->
<!-- 本地 -->
<!-- <link rel="stylesheet" type="text/css" href="../blog__PUBLIC__/Css/main.css" />
<link rel="stylesheet" type="text/css" href="../blog__PUBLIC__/Css/other.css" />

<script type="text/javascript" src="../blog__PUBLIC__/Js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="../blog__PUBLIC__/Js/main.js"></script> -->

<!-- </head>-->

    <body>
        <div id="container"> 
	<!-- <div id="left">
    	<div id="information"> -->
        	<!--<div class="pic">-->
        		<!-- <a href="about.html"><img src=".__PUBLIC__/image/m.png" alt="Junhui"/></a> -->
            <!--</div>-->
           <!--  <span class="user">关于钧辉的一切</span>
            <span>做个有力量的人</span>
        </div>
        <div id="menu">
        	<ul>
            	<li><a href="<?php echo U('Home/Index/index'); ?>" class="menulist">HOME | 主页</a></li>
                <li><a href="<?php echo U('Home/Article/essay');?>" class="menulist">ESSAY | 随笔</a></li>
                <li><a href="#" class="menulist">NOTE | 学习笔记</a></li>
                <li><a href="<?php echo U('Home/Index/aboutMe'); ?>" class="menulist current">ABOUT ME | 关于我</a></li>
            </ul> -->
        <!--</div>menu-->
    <!--</div>left-->
    
            <div id="right">
            	<div id="junhui">
                	<h2>关于钧辉</h2>
                    <span class="time">2015-08-26</span>
                    <p>张钧辉，目前大四在读，资深菜鸟一枚，平日熟人面前表现如同重度中二+精神病患者，然而陌生人面前则犹如一个自闭症儿童。有很多欲望，奈何能力不足，未能实现所有欲望，内心也因此常常感到十分痛苦与无奈，如今正在一点一点地改变自己，要成为最有力量的人。</p>
                </div><!--junhui-->
                <!-- <div id="footer"> -->
                	
                <!--</div>end of footer-->
            </div><!--end of right-->
        </div><!--end of container-->
    </body>
</html>