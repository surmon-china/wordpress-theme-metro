<?php 
if (have_posts()) : while (have_posts()) : the_post();
?>
<?php  
$content = $post->post_content;//文档内容
$imgurl = videclass::parseimgurl($content);
$info   = videclass::parseinfo($content);
$ykval  =$info['swf'];
?>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/images/wall.css?13" type="text/css" media="screen" /> 
<script language="javascript" src="<?php bloginfo('template_directory');?>/js/masonry.min.js"></script>
<script language="javascript" src="<?php bloginfo('template_directory');?>/js/common.js?7"></script>
<script type="text/javascript">var pagetype = "pic";</script>
<!--[if IE 6]>
<script src="js/DD_belatedPNG.js"></script>
<script>
  DD_belatedPNG.fix('.vidoe_play_bg,.gif_play_bg,.itemtag a');
</script>
<![endif]-->
<script>
  $(function(){ 
	  //获取要定位元素距离浏览器顶部的距离
	  var navH = $("#share_toolbar_wrapper").offset().top;
	  $(window).scroll(function(){
		//获取滚动条的滑动距离
		//alert(navH);
		var scroH = $(this).scrollTop();
		//滚动条的滑动距离大于等于定位元素距离浏览器顶部的距离，就固定，反之就不固定
		if(scroH>=navH){
			$("#share_toolbar_wrapper").css({"position":"fixed","top":-5});
		}else if(scroH<navH){
			$("#share_toolbar_wrapper").css({"position":"static","margin":"0 auto"});
		}
		console.log(scroH==navH);
	})
	  })
 $(function(){
			$('.cate_tabs ul li').removeClass('cat-item');
			if($('.current-cat a').length>0){
			 $('.cate_tabs ul li a').removeClass('current_tab');
			 $('.current-cat a').addClass('current_tab');
			}
			$('.btn_list li').removeClass();
			})
</script>
<div id="main">
<div id="video_content">
<div >
<?php if (get_option('swt_ad-single-top') == 'Display') { ?><div class="post-top-ad" ><?php echo stripslashes(get_option('swt_ad-single-top-code')); ?></div><?php } else { } ?></div>
<h2><?=the_title();?></h2>
		<div class="video_border_out">
		<div class="video_border_in">
			<script type="text/javascript">
			if(isMobile()){document.write('<video width="687" height="500" controls="" src="<?=$ykval;?>" tabindex="0"></video>');}else{document.write('<embed width="687" height="500" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" src="<?=$ykval;?>" allowfullscreen="true" quality="high" flashvars="isShowRelatedVideo=false&amp;showAd=0&amp;show_pre=1&amp;show_next=1&amp;isAutoPlay=false&amp;isDebug=false&amp;UserID=&amp;winType=interior&amp;playMovie=true&amp;MMControl=false&amp;MMout=false&amp;RecordCode=1001,1002,1003,1004,1005,1006,2001,3001,3002,3003,3004,3005,3007,3008,9999" play="true" loop="true" menu="true"></embed>');}
			</script>
            <embed width="687" height="500" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" src="<?=$ykval;?>" allowfullscreen="true" quality="high" flashvars="isShowRelatedVideo=false&amp;showAd=0&amp;show_pre=1&amp;show_next=1&amp;isAutoPlay=false&amp;isDebug=false&amp;UserID=&amp;winType=interior&amp;playMovie=true&amp;MMControl=false&amp;MMout=false&amp;RecordCode=1001,1002,1003,1004,1005,1006,2001,3001,3002,3003,3004,3005,3007,3008,9999" play="true" loop="true" menu="true">		</div></div>
		<div >
			<style>
			#share_toolbar,.articles{width:726px;}.comment-duoshuo{width:705px;float:none;}
			#comment{width:670px;}
            </style><div id="share_toolbar_wrapper" style="position: static; top: 191px; z-index: 9999;">		
            <div id="share_toolbar">			
            <div title="本文围观人数" id="stb_article_view" class="stb_group" style=" width: 35px; ">
            <span id="stb_article_view_icon"></span>
            <span id="stb_view_count"><?php post_views(' ', ' '); ?></span></div>			
            <div class="stb_divide"></div>				
            <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare stb_share_buttons stb_group" data="{&#39;url&#39;:&#39;<?php get_bloginfo('url')?>&#39;}">			       
             <a class="bds_tsina" id="stb_btn_weibo" href="javascript:void(0);" title="分享到新浪微博"></a>			        
             <a class="bds_tqq" post_url="" id="stb_btn_tqq" href="javascript:void(0);" title="分享到腾讯微博"></a>			        
             <a class="bds_qzone" id="stb_btn_qzone" href="javascript:void(0);" title="分享到QQ空间"></a>
             <a id="stb_btn_weixin_small" onclick="jiathis_sendto('weixin');return false;" href="javascript:void(0);" title="分享到微信朋友圈"></a>   
             <a class="bds_renren" id="stb_btn_renren_small" href="javascript:void(0);" title="分享到人人网"></a>			        
             <span class="bds_more" id="stb_btn_more"><span id="stb_sbtn_more_icon"></span></span>			        
             <a class="shareCount" href="javascript:void(0);" title="累计分享20次">20</a>				
             </div>			
             <div class="stb_divide"></div>			
             <div class="stb_share_buttons stb_group">	
               <?php  
				  $categories = get_the_category();         
				  $categoryIDS = array();          
				  foreach ($categories as $category) {              
				  array_push($categoryIDS, $category->term_id);         
				  }          
				  $categoryIDS = implode(",", $categoryIDS); 
		       ?>
               <script>
               $(function(){
				     $('.stb_share_buttons a[rel=prev]').attr('id','stb_btn_next');
					 $('#stb_btn_next').attr('title',$('#stb_btn_next').html());
					 $('.stb_share_buttons a[rel=next]').attr('id','stb_btn_prev'); 
					 $('#stb_btn_prev').attr('title',$('#stb_btn_prev').html());
				   })
               </script>	
             <?php if (get_next_post($categoryIDS)) { next_post_link('%link','%title',true);} else { echo '<a id="stb_btn_prev" href="javascript:alert(\'前面已经木有啦...\');" title="上一篇：木有了 ">上一篇：木有了</a>';} ?>	
             <?php if (get_previous_post($categoryIDS)) { previous_post_link('%link','%title',true);} else { echo '<a id="stb_btn_next"  href="javascript:alert(\'下面已经木有啦...\');"  title="下一篇：木有了 ">下一篇：木有了</a>';} ?>  		
             </div>			
             <div class="stb_group_right">		 	
             <div class="bdlikebutton" style="margin-top: 4px; margin-right:3px;"></div></div></div></div> 
             <script id="bdlike_shell"></script>
             <script type="text/javascript"  src="<?php bloginfo('template_directory'); ?>/js/like_shell.js"></script>
<script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=665594" src="<?php bloginfo('template_directory'); ?>/js/bds_s_v2.js"></script></div>
<div style="margin-top:10px">
<?php if (get_option('swt_ad-video-bottom') == 'Display') { ?><?php echo stripslashes(get_option('swt_ad-video-bottom-code')); ?><?php } else { } ?>
</div><div id="video_description">
			<div class="video_desc_content" >
				<div class="video_content_img"><p><img src="<?=$imgurl;?>"></p></div>
				<?php
                echo videoContent();
				$info = username($post->post_author);
				?><br>
				<p>—— <strong><?=$info[0]->display_name;?></strong></p>
			</div>
			<a class="video_author_avatar" href="javascript:void()"><?=get_avatar( get_the_author_email(), 80 );?></a>
			<div class="clear"></div></div>
		<div class="clear"></div>
		<div id="wumiiRelatedItems"></div>
		<div id="video_comment">
			<div class="comment-duoshuo" >
              <?php comments_template(); ?>
             </div></div></div>
	<div id="video_sidebar">
		<a class="btn_link_button" href="<?php bloginfo('url'); ?>/category/videos" >发现更多视频</a><a class="btn_list_button" href="javascript:void(0);" >展开全部视频分类</a>
        <ul class="btn_list"><li ><a href="<?php bloginfo('url'); ?>/category/videos">全部</a></li>
         <?php
			$parent = $categorys[0]->parent;
			$cat_id = $categorys[0]->cat_ID;//获取当前分类的id
			$swid = $parent==0?$cat_id:$parent;//选择根分类id
			wp_list_categories("child_of=" . $swid . "&depth=0&hide_empty=0&sort_order=desc&title_li=0");
			?>  
        </ul><ul class="relatedVideo">
	 <?php
    $ids = childids(); 
	$backup = $post; 
	$tags = wp_get_post_tags($post->ID);
	$tagIDs = array();
	$a = 0;
	if ($tags) { 
		$tagcount = count($tags);
		for ($i = 0; $i < $tagcount; $i++) {
			$tagIDs[$i] = $tags[$i]->term_id;
		}
		$args=array(
			'tag__in' => $tagIDs,
			'post__not_in' => array($post->ID),
			'showposts'=>6,
			'cat'=>$ids,//指定的目录
			'caller_get_posts'=>1
		);
		$my_query = new WP_Query($args);
		if( $my_query->have_posts() ) {
			while ($my_query->have_posts()) : $my_query->the_post();  
			$content = $post->post_content;//文档内容
		    $info   = videclass::parseinfo($content);
			?>
		<li>
		<a class="video_thumb" href="<?php the_permalink(); ?>">
        <?php
        if ( has_post_thumbnail() ) {
			the_post_thumbnail('largevideo');
			}else{
		?>
        <img src="<?=$info['img'];?>">
        <?php
        }
		?>
        </a>
		<a href="<?php the_permalink(); ?>"><?php the_title_attribute(); ?></a>
		</li>
        <?php endwhile;
		    } ?>
            
			<?php  
			}
			$post = $backup;
			wp_reset_query();
         ?>
        </ul>		<div>
<?php if (get_option('swt_ad-video-right') == 'Display') { ?><?php echo stripslashes(get_option('swt_ad-video-right-code')); ?><?php } else { } ?>
</div></div><div class="clear"></div></div>
<?php endwhile; ?>
<?php endif; ?>