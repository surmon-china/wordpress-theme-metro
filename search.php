<?php get_header(); ?>
<div id="roll"><div title="回到顶部" id="roll_top"></div><div title="转到底部" id="fall"></div></div>
<div id="content">
<div class="main">
<div style=" color: #6D6D6D; margin: 10px 0; height: 40px; width: 100%; font-size: 14px; text-align: center; line-height: 40px; border-bottom: 3px solid #72b332; font-weight: bold; ">下面是为您搜索到的关于【 <?php echo $s; ?> 】的文章，如果没有找到您需要的文章，建议您更换更准确的关键词</div>
<?php $count = 1; ?>
<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
<ul <?php post_class(); ?> id="post-<?php the_ID(); ?>">
<li>
<?php if(($count == 1||$count == 2||$count == 3)) : ?>
<div class="post_date">
<span class="date_d"><?php the_time('d') ?></span>
<span class="date_ym"><?php the_time('Y') ?>.<?php echo date('m',get_the_time('U'));?></span>
</div>
<div class="article">
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="详细阅读 <?php the_title_attribute(); ?>"><?php the_title(); ?></a><span class="new"><?php include('includes/new.php'); ?></span></h2>
<div class="infotop1">
<span class="info-category-icon"><?php the_category(', ') ?></span>
<span class="info-view-icon">超过<?php if(function_exists(the_views)) { the_views(' 次', true);}?>围观</span>
<span class="info-comment-icon"><?php comments_popup_link ('0条评论','1条评论','%条评论'); ?></span>
</div>
<div class="thumbnail_box_top">
<div class="thumbnail">
<a href="<?php the_permalink() ?>" rel="bookmark" target="_blank" title="<?php the_title(); ?>"><?php the_post_thumbnail('thumbnail',array('alt' => trim(strip_tags( $post->post_title )),'title'=> trim(strip_tags( $post->post_title )))); ?></a></div>
</div>
<div class="entry_post_top">
<span style="padding-left:20px"><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 150,"...","utf-8"); ?></span>
<div class="clear"></div>
</div></li></ul><div class="clear"></div>
<?php else: ?>
<div class="article_b">
<span class="small-number"><?php the_time('m') ?>-<?php the_time('d') ?>
</span>
<div class="tagleft"><h2><a href="<?php the_permalink() ?>" rel="bookmark" title="详细阅读 <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2></div>
<div class="infotop">
<span class="info-category-icon"><?php the_category(', ') ?></span>
<span class="info-view-icon">超过<?php if(function_exists(the_views)) { the_views(' 次', true);}?>围观</span>
<span class="info-comment-icon"><?php comments_popup_link ('0条评论','1条评论','%条评论'); ?></span>
</div>
<div class="thumbnail_box">
<div class="thumbnail">
<a href="<?php the_permalink() ?>" rel="bookmark" target="_blank" title="<?php the_title(); ?>"><?php the_post_thumbnail('medium',array('alt' => trim(strip_tags( $post->post_title )),'title'=> trim(strip_tags( $post->post_title )))); ?></a></div>
</div>
<div class="entry_post">
<span><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 240,"...","utf-8"); ?></span>
<div class="clear"></div>
<!--<div class="readmore"><a href="<?php the_permalink() ?>" title="详细阅读 <?php the_title(); ?>" rel="bookmark" style="opacity: 1; ">阅读全文</a></div>-->
</div></li></ul><div class="clear"></div><?php endif;$count++; ?>
		<?php endwhile; else: ?>
<div class="left">
<div class="article">
<h3 class="center">非常抱歉，无法搜索到与之相匹配的信息。</h3>
</div></div>
		<?php endif; ?> 
<div class="prev-next" style="border-bottom:none"><?php posts_nav_link(); ?></div>
<?php if (get_option('swt_ad-prev-next') == 'Display') { ?><div class="fyad"><center><?php echo stripslashes(get_option('swt_ad-prev-next-code')); ?></center></div><br><?php } else { } ?>
<div class="navigation"><?php pagenavi(); ?></div>
</div>
<?php include_once("sidebar.php"); ?>
<?php get_footer(); ?>