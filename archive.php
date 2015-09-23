<?php get_header(); ?>
<div id="content">
<?php
     // echo  get_category_root_slug($cat);
   
?>
<?php if(get_category_root_slug($cat)!='photos' && get_category_root_slug($cat)!='videos'):?>
<div class="main">
<?php $count = 1; ?>
<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
<ul <?php post_class(); ?> id="post-<?php the_ID(); ?>">
<li>
<?php if(($count == 1||$count == 2||$count == 3)) : ?>
<div class="post_date">
<span class="date_d"><?php the_time('d') ?></span>
<span class="date_ym"><?php the_time('Y') ?>.<?php echo date('m',get_the_time('U'));?></span></div>
<div class="article">
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="详细阅读 <?php the_title_attribute(); ?>"><?php the_title(); ?></a><span class="new"><?php include('includes/new.php'); ?></span></h2>
<div class="infotop1">
<span class="info-category-icon"><?php the_category(', ') ?></span>
<span class="info-view-icon">超过<?php post_views(' ', ' 次'); ?>围观</span>
<span class="info-comment-icon"><?php comments_popup_link ('0条评论','1条评论','%条评论'); ?></span>
</div>
<div class="thumbnail_box_top">
<div class="thumbnail">
<?php
don_the_thumbnail();
?></div>
</div>
<div class="entry_post_top">
<span style="padding-left:20px"><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 300,"...","utf-8"); ?></span>
<div class="clear"></div>
</div></li></ul>
<div class="clear"></div>
<?php else: ?>
<div class="article_b">
<span class="small-number"><?php the_time('m') ?>-<?php the_time('d') ?></span>
<div class="tagleft"><h2><a href="<?php the_permalink() ?>" rel="bookmark" title="详细阅读 <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2></div>
<div class="infotop">
<span class="info-category-icon"><?php the_category(', ') ?></span>
<span class="info-view-icon">超过<?php post_views(' ', ' 次'); ?>围观</span>
<span class="info-comment-icon"><?php comments_popup_link ('0条评论','1条评论','%条评论'); ?></span>
</div>
<div class="thumbnail_box">
<div class="thumbnail">
<a href="<?php the_permalink() ?>" rel="bookmark" target="_blank" title="<?php the_title(); ?>"><?php 
// 判断该文章是否设置的缩略图，如果有则直接显示
if ( has_post_thumbnail() ) {
the_post_thumbnail('medium',array('alt' => trim(strip_tags( $post->post_title )),'title'=> trim(strip_tags( $post->post_title )))); 
}else { //如果文章没有设置缩略图，则查找文章内是否包含图片
$content = $post->post_content;
preg_match_all('/<img.*?(?: |\\t|\\r|\\n)?src=[\'"]?(.+?)[\'"]?(?:(?: |\\t|\\r|\\n)+.*?)?>/sim', $content, $strResult, PREG_PATTERN_ORDER);
$n = count($strResult[1]);
if($n > 0){ // 如果文章内包含有图片，就用第一张图片做为缩略图
echo '<a href="'.get_permalink().'"><img src="'.$strResult[1][0].'"  width = "140" height="100"/></a>';
}else { // 如果文章内没有图片，则用判断是否为视频。
$imgurl = videclass::parseimgurl($content);
if($imgurl){
	echo "<a href=".get_permalink()."><img src=".$imgurl." width = '140' height='100' /></a>";
	}else{//如果不是视频内容则自动匹配默认缩略图
        $random = mt_rand(1, 20);		
	 echo '<a href="'.get_permalink().'"><img src="'.get_bloginfo ('stylesheet_directory').'/images/random/tb'.$random.'.jpg" /></a>';	
	}
}
}
?>
</a></div></div>
<div class="entry_post">
<span><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 240,"...","utf-8"); ?></span>
<div class="clear"></div>
<div class="monav" style="position:relative;">
<a class="entry-more" href="<?php the_permalink() ?>" itemprop="url" title="查看全文..." ><span></span></a></div></div></li></ul><div class="clear"></div><?php endif;$count++; ?>
		<?php endwhile; ?>
		<?php endif; ?> 
<div class="prev-next" style="border-bottom:none"><?php posts_nav_link(); ?></div>
<?php if (get_option('swt_ad-prev-next') == 'Display') { ?><div class="fyad"><center><?php echo stripslashes(get_option('swt_ad-prev-next-code')); ?></center></div><br><?php } else { } ?>
<div class="navigation"><?php pagenavi(); ?></div></div>
<?php include_once("sidebar.php"); ?>
<?php
 else :
 if(get_category_root_slug($cat)=='photos'):
 include('archive_photos.php');//调用图片列表页面
 else :
 if(get_category_root_slug($cat)=='videos'):
 include('archive_videos.php');//调用视频列表页面
	endif;
	endif;
	endif;
  ?>
<?php get_footer(); ?>