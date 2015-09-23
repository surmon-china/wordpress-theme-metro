<div id="sidebar">
<?php if (get_option('swt_ad-index-player') == 'Display') { ?>
<?php if ( is_home()) { ?>
<div class="music-player">
<embed align=center src=<?php bloginfo('template_url'); ?>/player.swf?mp3=<?php echo stripslashes(get_option('swt_ad-index-player-code')); ?>&autostart=1&autoreplay=1&volume=50  width=240 height=20 type=application/x-shockwave-flash wmode='transparent' quality='high' ;><param name='wmode' value='transparent'> </embed></div>
<?php } ?><?php } else { } ?>
<?php if (get_option('swt_ad-sidebar1') == 'Display') { ?>
<?php echo stripslashes(get_option('swt_ad-sidebar1-code')); ?>
<?php } else { } ?>
<div class="widget tab_box" id="tab_box_posts">
<ul class="tab_menu tab_menuone">
<li class="current">热门围观</li>
<li>最新文章</li>
<li>最新评论</li>
<li>关注本站</li></ul>
<div class="tab_content tab_content0">
<div class='baer'>
<ul class="tab_post_links">
<?php simple_get_most_viewed(); ?>
</ul>
</div>
<div class="hide baer">
<ul class="tab_post_links"><?php $myposts = get_posts('numberposts=11&offset=0');foreach($myposts as $post) :?>
<li><a href="<?php the_permalink(); ?>" rel="bookmark" title="详细阅读 <?php the_title_attribute(); ?>"><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_title)), 0, 62,"...","utf-8"); ?></a></li><?php endforeach; ?>
</ul></div>
<div class="hide baer">
<div class="r_comment">
<ul>
		<?php
			global $wpdb;
			$sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID, comment_post_ID, comment_author, comment_date_gmt, comment_approved, comment_type,comment_author_url,comment_author_email, SUBSTRING(comment_content,1,16) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID = $wpdb->posts.ID) WHERE comment_approved = '1' AND comment_type = '' AND post_password = '' AND user_id='0' ORDER BY comment_date_gmt DESC LIMIT 7";
			$comments = $wpdb->get_results($sql);
			$output = $pre_HTML;
			foreach ($comments as $comment) {$output .= "\n<li>".get_avatar(get_comment_author_email(), 32).strip_tags($comment->comment_author).":<br />" . " <a href=\"" . get_permalink($comment->ID) ."#comment-" . $comment->comment_ID . "\" title=\"查看 " .$comment->post_title . "\">" . strip_tags($comment->com_excerpt)."</a></li>";}
			$output .= $post_HTML;
			$output = convert_smilies($output);
			echo $output;
		?> 
</ul></div></div>
<div class="hide baer">
<ul class="tab_post_links">
<?php echo stripslashes(get_option('swt_sidebar-guanzhu')); ?>
</ul></div></div></div>
<?php if ( is_home()) { ?>
<script type="text/javascript"  src="<?php bloginfo('template_url'); ?>/js/scroll-index.js"></script>
<?php }else{ ?>
<script type="text/javascript"  src="<?php bloginfo('template_url'); ?>/js/scroll-other.js"></script>
<?php } ?>
<div id="ubarl" style=" width:300px;">
<?php if (get_option('swt_ad-sidebar2') == 'Display') { ?>
<?php echo stripslashes(get_option('swt_ad-sidebar2-code')); ?>
<?php } else { } ?>
<div  class="widget tab_box"> 
      <ul class="tab_menu tab_menutwo">
      <li class="current">发现精彩</li>
      <li>标签云集</li>
      <li>手气不错</li>
      <li>更多精彩</li></ul>
      <div class="tab_content tab_content1">
      <div class="baer">
      <ul class="tab_post_links"><?php $myposts = get_posts('numberposts=9&orderby=rand');foreach($myposts as $post) :?>
      <li><a href="<?php the_permalink(); ?>" rel="bookmark" target="_blank" title="详细阅读 > <?php the_title_attribute(); ?>"><?php echo cut_str($post->post_title,35); ?></a></li><?php endforeach; ?>
      </ul>
      </div>
      <div class="hide baer" style="margin:3px">
      <div class="tags">
      <ul>
          <?php wp_tag_cloud('smallest=12&largest=12&unit=px&number=60&orderby=count&order=RAND');?>		
      </ul></div><div style="clear:both"></div>
      </div>
   <div class="hide baer">
      <ul class="tab_post_links">
<?php $myposts = get_posts('numberposts=9&offset=0');foreach($myposts as $post) :?>
<li><a href="<?php the_permalink(); ?>" rel="bookmark" title="详细阅读 > <?php the_title_attribute(); ?>"><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_title)), 0, 35,"...","utf-8"); ?></a></li><?php endforeach; ?>
</ul></div>
      <div class="hide baer">
      <ul class="tab_post_links">
      <li><a href="<?php bloginfo('home'); ?>/sitemap.html" target="_blank" title="站点地图">站点地图</a></li>
      <li><a href="<?php bloginfo('home'); ?>/guestbook" target="_blank" title="去留言板吐槽一番吧">温情留言板</a></li>
      <li><a rel="external nofollow" href="<?php bloginfo('home'); ?>/feed" target="_blank" title="订阅">RSS订阅</a></li>
       <li><a href="<?php bloginfo('home'); ?>/category/videos" target="_blank" title="唯美图片~">更多唯美图片</a></li>
       <li><a href="<?php bloginfo('home'); ?>/category/photos" target="_blank" title="更多视频~">更多优秀视频</a></li>
       <li><a rel="external nofollow" href="<?php bloginfo('home'); ?>" target="_blank" title="回到本站首页~">回到首页</a></li>
</ul><div style="clear:both"></div></div></div></div></div>