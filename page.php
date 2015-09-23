<?php get_header(); ?>
<div id="roll"><div title="回到顶部" id="roll_top"></div><div title="查看评论" id="ct"></div><div title="转到底部" id="fall"></div></div>
<div id="content">
<div class="main"><?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="left">
<div class="context"><?php the_content('Read more...'); ?></div>
</div>
<div class="articles">
<?php comments_template(); ?>
</div>
	<?php endwhile; else: ?>
	<?php endif; ?>
</div>
<?php include_once("sidebar3.php"); ?>
<?php get_footer(); ?>