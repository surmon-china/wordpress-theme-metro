<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/images/wall.css" type="text/css" media="screen" />
<script language="javascript" src="<?php bloginfo('template_url'); ?>/js/masonry.min.js"></script>
<script language="javascript" src="<?php bloginfo('template_url'); ?>/js/common.js?7"></script>
<script type="text/javascript">var pagetype = "pic";</script>
<script>
        $(function(){
			$('.cate_tabs ul li').removeClass('cat-item');
			if($('.current-cat a').length>0){
			 $('.cate_tabs ul li a').removeClass('current_tab');
			 $('.current-cat a').addClass('current_tab');
			}
			$('.btn_list li').removeClass();
			})
</script>
<div id="list-main">
<table class="list-table">
<tbody><tr>
	<td valign="top" class="list-table-left">
		<div class="cate_tabs"><ul><li><a class="current_tab" href="<?php echo  get_category_link(get_category_root_id($cat));?>">全部</a></li>
<?php
       wp_list_cats("child_of=" . get_category_root_id($cat) . "&depth=0&hide_empty=0&sort_order=asc");
   
?></ul></div><div class="waterfall_loading"></div>
		<div class="waterfall pic-waterfall masonry" style="position: relative;  visibility: hidden; ">
		<?php $count = 1; ?>
        <?php
        /*
		$categorys = get_category($cat);
		$canid = $categorys->term_id;
		$limit = get_option('posts_per_page');
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		query_posts('&showposts=' . $limit = 2 . '&paged=' . $paged . '&cat='.$canid);
		$wp_query->is_archive = true;
		$wp_query->is_home = false;*/
		 if (have_posts()) : ?>
	    <?php while (have_posts()) : the_post(); ?>
		<div class="item masonry-brick" >
			<div class="itembody">
				<a class="itemlink" href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
					<?php the_post_thumbnail('largephoto',array('alt' => trim(strip_tags( $post->post_title )),'title'=> trim(strip_tags( $post->post_title )))); ?>
				</a><div class="itemtag">
                <a href="<?php bloginfo('url'); ?>/tag/<?php
			  $posttags = get_the_tags();
			  $count=0;
			  if ($posttags) {
			  foreach($posttags as $tag) {
				  $count++;
				  if (1 == $count) {
					  $tagu = $tag->name;
				      echo $tag->name . '';
				  }
			    }
			  }
				 ?>"><span>
			<?php
			 echo $tagu;
				 ?>
                 </span></a></div><div class="itemmeta">
					<div class="item_meta">
						<div class="item_meta_content" style=" font-weight: normal; ">
							<a class="user_name" href="#"><?php the_author_meta('display_name');?></a>&nbsp;收录在&nbsp;<?php the_category(', ') ?>
							<br>标签：<?php the_tags('标签：', ', ', ''); ?><br>
						</div>
						<div class="clear"></div></div><p>
                       <?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 150,"...","utf-8"); ?>
                     </p></div></div></div>
		<?php //else: ?>
        <?php endwhile; ?>
		<?php endif; ?> 
		</div><div class="clear"></div><div class="pagenavi graybox">
<div class="navigation"><?php pagenavi(); ?></div></div>
          <div style="clear:both"></div></div></div></td>
	<td valign="top" class="list-table-right">
		<a id="show_cate_list_btn" class="btn_list_button" style="color:#FFF;" href="javascript:void(0);">展开全部图片分类</a>
        <ul class="btn_list">
        <li style="border-top:none"><a href="<?php echo  get_category_link(get_category_root_id($cat));?>">全部</a></li>
         <?php
           wp_list_categories("child_of=" . get_category_root_id($cat) . "&depth=0&hide_empty=0&sort_order=desc&title_li=0");
          ?>
     </ul><div style="margin-bottom:30px;">
<?php if (get_option('swt_ad-liu-right') == 'Display') { ?><?php echo stripslashes(get_option('swt_ad-liu-right-code')); ?><?php } else { } ?>
</div><div></div><div></div></td></tr>
</tbody></table></div><div>
<?php if (get_option('swt_ad-liu-bottom') == 'Display') { ?><?php echo stripslashes(get_option('swt_ad-liu-bottom-code')); ?><?php } else { } ?></div></div>