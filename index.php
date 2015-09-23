<?php get_header(); ?>
<div class="main">
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
<span class="info-view-icon">超过<?php post_views(' ', ' 次'); ?>围观</span>
<span class="info-comment-icon"><?php comments_popup_link ('0条评论','1条评论','%条评论'); ?></span>
</div>
<div class="thumbnail_box_top">
<div class="thumbnail">
<?php
don_the_thumbnail();
?>
</div></div>
<div class="entry_post_top">
<span style="padding-left:20px"><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 300,"...","utf-8"); ?></span>
<div class="clear"></div>
</div></li></ul><div class="clear"></div>
<?php else: ?>
<div class="article_b">
<span class="small-number"><?php the_time('m') ?>-<?php the_time('d') ?></span>
<div class="tagleft"><h2><a href="<?php the_permalink() ?>" rel="bookmark" title="详细阅读 <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2></div>
<div class="infotop">
<span class="info-category-icon"><?php the_category(', ') ?></span>
<span class="info-view-icon">超过<?php post_views(' ', ' 次'); ?>围观</span>
<span class="info-comment-icon"><?php comments_popup_link ('0条评论','1条评论','%条评论'); ?></span></div>
<div class="thumbnail_box">
<div class="thumbnail">
<a href="<?php the_permalink() ?>" rel="bookmark" target="_blank" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" >
<?php 
// 判断该文章是否设置的缩略图，如果有则直接显示
if ( has_post_thumbnail() ) {
the_post_thumbnail('medium',array('alt' => trim(strip_tags( $post->post_title )),'title'=> trim(strip_tags( $post->post_title )))); 
}else { //如果文章没有设置缩略图，则查找文章内是否包含图片
$content = $post->post_content;
preg_match_all('/<img.*?(?: |\\t|\\r|\\n)?src=[\'"]?(.+?)[\'"]?(?:(?: |\\t|\\r|\\n)+.*?)?>/sim', $content, $strResult, PREG_PATTERN_ORDER);
$n = count($strResult[1]);
if($n > 0){ // 如果文章内包含有图片，就用第一张图片做为缩略图
echo '<a href="'.get_permalink().'"><img src="'.$strResult[1][0].'"  width = "130" height="180"/></a>';
}else { // 如果文章内没有图片，则用判断是否为视频。
$imgurl = videclass::parseimgurl($content);
if($imgurl){
	echo "<a href=".get_permalink()."><img src=".$imgurl." width = '130' height='180' /></a>";
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
<a class="entry-more" href="<?php the_permalink() ?>" itemprop="url" title="查看全文..." style="">
<span></span></a></div></div></li></ul><div class="clear"></div>
<?php endif;$count++; ?>
		<?php endwhile; ?>
		<?php endif; ?> 
<div class="prev-next" style="border-bottom:none"><?php posts_nav_link(); ?></div>
<?php if (get_option('swt_ad-prev-next') == 'Display') { ?><div class="fyad"><center><?php echo stripslashes(get_option('swt_ad-prev-next-code')); ?></center></div><br><?php } else { } ?>
<div class="navigation"><?php pagenavi(); ?></div></div>
<?php get_sidebar(); ?></div></div>
<div style="width:100%;overflow:hidden">
<ul id="vidsl" class="vidsl"></ul></div>
<div style="width:100%;overflow:hidden">
<div class="sssd"><a style="left:431px;" href="<?php bloginfo('url'); ?>/category/videos" target="_blank" rel="external nofollow">更多精彩图片</a></div>
<div id="ext_post">
<div class="ext_post_show">
<?php if (get_option('swt_ad-index1') == 'Display') { ?><center><?php echo stripslashes(get_option('swt_ad-index1-code')); ?></center><br><?php } else { } ?>
<div class="ext_post_show_l"><div></div></div>
<div class="ext_post_show_r"></div><div class="clear"></div></div>
<div class="ext_post_l"><ul><?php
    $args=array(
        'cat' => get_option('swt_index-list-left'),   // 分类ID
        'posts_per_page' => 8, // 显示篇数
    );
    query_posts($args);
    if(have_posts()) : while (have_posts()) : the_post();
?><li><a href="<?php the_permalink(); ?>" title=" <?php if (has_excerpt()) {
                echo $description = get_the_excerpt(); //文章编辑中的摘要
            }else {
                echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 95,"…"); //文章编辑中若无摘要，自定截取文
            } ?>"> 《<?php the_title(); ?>》- 
        <?php if (has_excerpt()) {
                echo $description = get_the_excerpt(); //文章编辑中的摘要
            }else {
                echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 32,"…"); //文章编辑中若无摘要，自定截取文
            } ?>
</a></li>
<?php  endwhile; endif; wp_reset_query(); ?></ul></div>
<div class="ext_post_r"><ul><?php
    $args=array(
        'cat' => get_option('swt_index-list-right'),   // 分类ID
        'posts_per_page' => 8, // 显示篇数
    );
    query_posts($args);
    if(have_posts()) : while (have_posts()) : the_post();
?><li><a href="<?php the_permalink(); ?>" title=" <?php if (has_excerpt()) {
                echo $description = get_the_excerpt(); //文章编辑中的摘要
            }else {
                echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 95,"…"); //文章编辑中若无摘要，自定截取文
            } ?>"> 《<?php the_title(); ?>》- 
        <?php if (has_excerpt()) {
                echo $description = get_the_excerpt(); //文章编辑中的摘要
            }else {
                echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 44,"…"); //文章编辑中若无摘要，自定截取文
            } ?>
</a></li>
<?php  endwhile; endif; wp_reset_query(); ?>
</ul></div><div class="clear"></div>
<div class="ext_post_foot"><a href="<?php bloginfo('url'); ?>/category/photos" target="_blank"><?php bloginfo('name'); ?> - 更多精彩图片...</a></div></div>
<div class="section_title" style="margin-top:40px;margin-bottom:60px;">
<a href="<?php bloginfo('url'); ?>/category/videos" style="left: 435px;">更多精彩视频</a></div>
<ul class="index1" >       
<?php query_posts(array('orderby' => 'rand','showposts' => 13));
if (have_posts()) :
while (have_posts()) : the_post();?>
<?php if (get_the_post_thumbnail($post->ID, 'bigphoto', true)) : ?>
			<li class="index2"><p class="images2"><a target="_blank" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_post_thumbnail('bigphoto',array('alt' => trim(strip_tags( $post->post_title )),'title'=> trim(strip_tags( $post->post_title )))); ?></a></p><p class="text2"><a target="_blank" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?> | <?php bloginfo('name'); ?></a></p></li>
			<?php else: ?>
			<li class="index2"><p class="images2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/random/tb<?php echo rand(1,20)?>.jpg" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" /></a></p><p class="text2"><a target="_blank" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?> | <?php bloginfo('name'); ?></a></p></li>
			<?php endif; ?>
<?php endwhile;endif; ?>
<?php wp_reset_query(); ?> 
</ul>
<div class="clear"></div>
<?php get_footer(); ?>