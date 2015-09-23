	<?php
	$backup = $post; 
	$tags = wp_get_post_tags($post->ID);
	$tagIDs = array();
	if ($tags) {
		echo '<ul class="related-post"  style="wight:660px;" >';
		$tagcount = count($tags);
		for ($i = 0; $i < $tagcount; $i++) {
			$tagIDs[$i] = $tags[$i]->term_id;
		}
		$args=array(
			'tag__in' => $tagIDs,
			'post__not_in' => array($post->ID),
			'showposts'=>12,
			'caller_get_posts'=>1
		);
		$my_query = new WP_Query($args);
		if( $my_query->have_posts() ) {
			while ($my_query->have_posts()) : $my_query->the_post(); ?>
			<li><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">《<?php echo cut_str($post->post_title,58); ?>》 - <?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 40,"...","utf-8"); ?> -  <?php comments_number(' ','(1)','(%)'); ?></a></li>
			<?php endwhile;
				echo '</ul>';
		} else { ?>
		<!-- 没有相关文章显示随机文章 -->
	<div class="related-post" style="margin-right: 50px;">
		<?php
		query_posts(array('orderby' => 'rand', 'showposts' => 12, 'caller_get_posts' => 4));
		if (have_posts()) :
		while (have_posts()) : the_post();?>
		<li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php echo cut_str($post->post_title,58); ?><?php comments_number(' ','(1)','(%)'); ?></a></li>
		<?php endwhile;endif; ?>
	</div>
	<?php }
	}
	$post = $backup;
	wp_reset_query();
	?>