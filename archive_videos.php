<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/images/wall.css" type="text/css" media="screen" />
<script language="javascript" src="<?php bloginfo('template_url'); ?>/js/masonry.min.js"></script>
<script language="javascript" src="<?php bloginfo('template_url'); ?>/js/common.js?7"></script>
<script type="text/javascript">var pagetype = "pic";</script>
<table class="list-table">
<tbody>
<tr><td valign="top" class="list-table-left">
<div class="cate_tabs"><ul><li><a class="current_tab" href="<?php echo  get_category_link(get_category_root_id($cat));?>">全部</a></li>   
 <?php
       wp_list_cats("child_of=" . get_category_root_id($cat) . "&depth=0&hide_empty=0&sort_column=name");
   
?>
        </ul></div><div class="waterfall_loading"></div>
		<div class="waterfall masonry" style="position: relative; height: 2376px; visibility: hidden; ">
		<?php $count = 1; ?>
        <?php if (have_posts()) : ?>
	    <?php while (have_posts()) : the_post(); ?>
		<div class="item masonry-brick" style="position: absolute; top: 0px; left: 0px;">
			<div class="itembody">
				<a class="itemlink itemlink_video" href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
					<?php 
					vide_the_thumbnail(); 
					?>
					<div class="vidoe_play_bg"></div></a>
				<div class="itemmeta">
					<a class="item_title" href="<?php the_permalink() ?>"><?=the_title();?></a> <?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 150,"...","utf-8");?></div>
			</div></div> 
        <?php //else: ?>
        <?php endwhile; ?>
		<?php endif; ?> 
        </div><div class="clear"></div>
<div class="pagenavi graybox">
<div class="navigation"><?php pagenavi(); ?></div></div></td>
<td valign="top" class="list-table-right">
<a class="btn_list_button" href="javascript:void(0);" style="color: #ffffff;">展开全部视频分类</a><ul class="btn_list"><li style="border-top:none"><a href="<?php echo  get_category_link(get_category_root_id($cat));?>">全部</a></li>
         <?php
           wp_list_categories("child_of=" . get_category_root_id($cat) . "&depth=0&hide_empty=0&sort_order=desc&title_li=0");
          ?>
          </ul>		<div style="margin-bottom:30px;">
<?php if (get_option('swt_ad-liu-right') == 'Display') { ?><?php echo stripslashes(get_option('swt_ad-liu-right-code')); ?><?php } else { } ?>
		  </div>		
<div></div></td></tr></tbody></table><div> 
<?php if (get_option('swt_ad-liu-bottom') == 'Display') { ?><?php echo stripslashes(get_option('swt_ad-liu-bottom-code')); ?><?php } else { } ?></div>