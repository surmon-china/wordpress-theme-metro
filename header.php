<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php
$UA = $_SERVER['HTTP_USER_AGENT'];
if(strpos($UA, 'MSIE 8.0'))
echo '<meta http-equiv="X-UA-Compatible" content="ie=7" />';
?>
<?php wp_enqueue_script( 'jquery' );?>
<?php include('includes/seo.php'); ?>
<?php wp_head(); ?>
<?php if (get_option('swt_alt_stylesheet')==''):?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/style.css" />
<?php endif;?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/metrobeta.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/lazyload.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/top.js"></script>
<script type="text/javascript">
	jQuery(function() {          
    	jQuery(".article img, .articles img").not("#respond_box img").lazyload({
        	placeholder:"<?php bloginfo('template_url'); ?>/images/image-pending.gif",
            effect:"fadeIn"
          });
    	});
</script>
</head>
<script type="text/javascript">
$(function(){
	$('.article_b').hover(function(){ 
		 $(this).find('.entry-more').show();
		},function(){
		 $('.entry-more').hide();
		})
	$('.entry-more span').hover(function(){ 
			 $(this).addClass('revedcla');
			 },function(){
			 $(this).removeClass(); 
		    })
	});
$(function(){
	$('.menu-item').each(function(index, element) {
        if($(this).children('.sub-menu').length>0){
			  $(this).addClass('dropdownlink');
			  $(this).find('a').first().append('<span></span>');
			  $(this).children('.sub-menu').find('li').removeAttr('class');
			  $(this).children('.sub-menu').addClass('submenu');
			  $(this).hover(function(){
				  $(this).children('.sub-menu').show();
				  },function(){
				   $(this).children('.sub-menu').hide();
				  })
			}
    });
	})
</script>
<body>
<div id="page">
<script type="text/javascript">
if(screen.width>1030){document.getElementsByTagName('body')[0].className = "widescreen";}
</script>
<div id="container" style="overflow-x: visible; overflow-y: visible; ">
<div id="header">
<div id="logo">
<h1><a title="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>" href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1></div></div>
<div id="nav">
<ul class="nav-ul"><li class="current_page_item">
<a id="nav_home" href="<?php bloginfo('url'); ?>">首页</a></li>
<?php echo stripslashes(get_option('swt_menu')); ?>
</ul>
<a class="nav-rand" title="点我呗！我会给你一个清晰的网站地图！" target="_blank" rel="nofollow" href="<?php bloginfo('url'); ?>/sitemap.html">网站地图</a>
<div class="search">	
<div class="search_site addapted">	
<form id="searchform" method="get" action="<?php bloginfo('home'); ?>">
<input type="submit" value id="searchsubmit" class="button">
<input type="text" id="s" name="s" placeholder="输入关键词搜索..." value="输入关键词搜索..." placeholder="输入关键词搜索..."  onblur="if(this.value=='') this.value='输入关键词搜索...';" onfocus="if(this.value=='输入关键词搜索...') this.value='';" x-webkit-speech lang="zh-CN" >
</form></div></div><div class="clear"></div></div>
<?php if ( is_home() ) { ?>
<div id="content">
<div id="topc">
<div style="clear:both"></div>
<?php } ?>
<div id="map">
<div class="position">当前位置：<a href="<?php bloginfo('home'); ?>"><?php bloginfo('name'); ?></a> >
<?php
if( is_single() ){
$categorys = get_the_category();
$category = $categorys[0];
echo( get_category_parents($category->term_id,true,' >') );echo $s.' 查看文章';
} elseif ( is_page() ){
the_title();
} elseif ( is_category() ){
single_cat_title();
} elseif ( is_tag() ){
single_tag_title();
} elseif ( is_day() ){
the_time('Y年Fj日');
} elseif ( is_month() ){
the_time('Y年F');
} elseif ( is_year() ){
the_time('Y年');
} elseif ( is_search() ){
echo $s.' 的搜索结果';
}
?>
</div><div class="ad-top-right">
<?php echo stripslashes(get_option('swt_index-top-ad')); ?>
</div></div>