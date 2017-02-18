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
<!-- <head>
<meta charset="utf-8">
<title>不来彼方</title> -->
<!-- SAE -->
<!-- <link rel="stylesheet" type="text/css" href=".__PUBLIC__/Css/main.css" />


<script type="text/javascript" src=".__PUBLIC__/Js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src=".__PUBLIC__/Js/main.js"></script> -->
<!-- 本地 -->
<!-- <link rel="stylesheet" type="text/css" href="../../../blog/Public/Css/main.css" />
<script type="text/javascript" src="../../../blog/Public/Js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="../../../blog/Public/Js/main.js"></script> -->
<!-- </head> -->

<body>
<div id="container"> 
	<!-- <div id="left">
    	<div id="information"> -->
        	<!--<div class="pic">-->
        		<!-- <a href=""><img src=".__PUBLIC__/Image/m.png" alt="Junhui"/></a> -->

            <!--</div>-->
            <!-- <span class="user"><?php echo ($me['name']); ?></span>
            <span>做个有力量的人</span> -->
            <!-- <span ><?php echo (date('Y-m-d H:i:s',$now)); ?></span> -->
        <!-- </div>
        <div id="menu">
        	<ul>
            	<li><a href="<?php echo U('Home/Index/index'); ?>" class="menulist current">HOME | 主页</a></li>
                <li><a href="<?php echo U('Home/Article/essay');?>" class="menulist">ESSAY | 随笔</a></li>
                <li><a href="#" class="menulist">NOTE | 学习笔记</a></li>
                <li><a href="<?php echo U('Home/Index/aboutMe'); ?>" class="menulist">ABOUT ME | 关于我</a></li>
            </ul>
        </div>
    </div> --><!--left-->
    
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
                            <a href='<?php echo U('Home/Article/singleArticle',array('id'=>$item['id']));?>'><?php echo ($item["title"]); ?></a>
                        </h3>
                        <div class='author'>
                            <a href="<?php echo U('Home/Article/author',array('author'=>$item['author']));?>"><?php echo ($item["author"]); ?></a>
                        </div>
                        <div class='comments'>
                            <a href='<?php echo U('Home/Article/singleArticle',array('id'=>$item['id']));?>#clocation'><?php echo ($item["commentcount"]); ?> 条评论</a>
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

    	<!-- 循环输出 offset为输出起始位置，长度为3-->
        <!-- <?php if(is_array($person)): $i = 0; $__LIST__ = array_slice($person,0,3,true);if( count($__LIST__)==0 ) : echo "数据为0" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i; echo ($data['name']); ?>--------<?php echo ($data['age']); ?><br/><?php endforeach; endif; else: echo "数据为0" ;endif; ?> -->
        <!-- foreach循环 -->
       <!--  <?php if(is_array($person)): foreach($person as $key=>$data): echo ($data['name']); ?>--------<?php echo ($data['age']); ?><br/><?php endforeach; endif; ?> -->
        <!-- eq= neq!= gt> egt>= lt< elt<= heq=== nheq!== -->
        <!-- for循环 -->
       <!--  <?php $__FOR_START_28272__=0;$__FOR_END_28272__=10;for($k=$__FOR_START_28272__;$k < $__FOR_END_28272__;$k+=1){ echo ($k); ?><br/><?php } ?> -->
        <!-- if判断 只有一个属性 condition-->
       <!--  <?php if($num > 10): ?>num大于10
        <?php elseif($num < 10): ?>num小于10
        <?php else: ?>num等于10<?php endif; ?> -->
        <!-- switch -->
       <!--  <?php switch($me): case "老师": ?>老师好<?php break;?>
            <?php case "小红": ?>小明出去<?php break;?>
            <?php default: ?>努力~奋斗~<?php endswitch;?> -->
        <!-- 实例 -->
        <!-- <?php if(is_array($person)): foreach($person as $key=>$data): if(($data["age"]) >= "18"): echo ($data["name"]); ?>已经成年了<?php else: echo ($data['name']); ?>还是个孩子<?php endif; ?><br/><?php endforeach; endif; ?> -->

        <!-- 原生php结合 -->
       <!--  <?php echo $person[1]['name'] ?> -->

        <!-- <div id="footer">
        	
        </div> -->
    </div><!--end of right-->
</div><!--end of container-->
</body>
</html>