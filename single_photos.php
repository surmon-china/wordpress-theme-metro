<?php 
if (have_posts()) : while (have_posts()) : the_post();
?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/images/wall.css" type="text/css" media="screen" />
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
<div id="pic-main">
	<div id="pic_content">
		<div style="margin:0px 0 15px 0">
			<style>#share_toolbar ,.articles{width:620px;} 
			.articles{ padding:0;} 
            </style>
<div id="share_toolbar_wrapper" style="position: static; top: 191px; z-index: 9999;">		
            <div id="share_toolbar">			
            <div title="本文围观人数" id="stb_article_view" class="stb_group" style=" width: 31px; ">
            <span id="stb_article_view_icon"></span>
            <span id="stb_view_count"><?php post_views(' ', ' '); ?></span></div>			
            <div class="stb_divide"></div>				
            <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare stb_share_buttons stb_group" data="{&#39;url&#39;:&#39;<?php get_bloginfo('url')?>&#39;}">			       
             <a class="bds_tsina" id="stb_btn_weibo" href="javascript:void(0);" title="分享到新浪微博"></a>			        
             <a class="bds_tqq" post_url="" id="stb_btn_tqq" href="javascript:void(0);" title="分享到腾讯微博"></a>			        
             <a class="bds_qzone" id="stb_btn_qzone" href="javascript:void(0);" title="分享到QQ空间"></a>
             <a id="stb_btn_weixin_small" onclick="jiathis_sendto('weixin');return false;" href="javascript:void(0);" title="分享到微信朋友圈"></a>   		        
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
                 <div class="bdlikebutton" style="margin-top: 4px; margin-right:3px;"></div>	
             </div>		
             </div>
             </div> 
             <script id="bdlike_shell"></script>
             <script type="text/javascript"  src="<?php bloginfo('template_directory'); ?>/js/like_shell.js"></script>
<script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=665594" src="<?php bloginfo('template_directory'); ?>/js/bds_s_v2.js"></script></div>
		<?php echo catch_that_image() ?>
		<div class="pic_links">
        <?php
        $categorys = get_the_category();
		$cat_id = $categorys[0]->cat_ID;//获取当前分类的id
		//print_r($categorys);
		?>
		分类：<a title="<?php echo $categorys[0]->cat_name ;?> " href="<?php echo get_category_link($cat_id); ?>">
		<?php echo $categorys[0]->cat_name ;?>
        </a>&nbsp;&nbsp;|&nbsp;&nbsp;标签：
         <?php the_tags('标签：', ', ', ''); ?>   
         <?php
         include_once('key.class.php');
		 $info = get_image_url();
		 //echo $img;
		 $key = new KEY('tupian');
		 $imgpw =  $key->encode($info['img']);
		 //echo $imgpw;
		 ?>     
        |&nbsp;&nbsp;<a id="down" href="<?php bloginfo('template_url'); ?>/down/down.php?key=<?=$imgpw?>" target="_blank">点击查看高清大图&nbsp;&nbsp;(<?=$info['width']?>x<?=$info['height']?>)</a>		</div><div class="articles">
<div id="singlead2" style=" margin-bottom: 10px; "><center>
<?php if (get_option('swt_ad-photo-bottom') == 'Display') { ?><?php echo stripslashes(get_option('swt_ad-photo-bottom-code')); ?><?php } else { } ?></center>
</div></div>
		<div id="pic_description" >
			<div class="pic_desc_content" style="color:#666;">
				<?php
                 echo  delHtmlContent(); 
				 $info = username($post->post_author); 
				// print_r($post);
				?> 
                 <br>
				<span style="color:#ccc">[<?=$post->post_date;?>]</span>

				<p style="text-align:right">—— <strong style="color:#666;"> 
				<?=$info[0]->display_name;?> </strong></p>
			</div>
			
			<a class="video_author_avatar" style="background:#fff no-repeat 2px 2px;" href="javascript:void()">
			<?=get_avatar( get_the_author_email(), 80 );?>
          </a>
			<div class="clear"></div></div><div class="clear"></div>
		<div id="pic_comment">
          <div class="articles" style="float:none">
          <?php comments_template(); ?>
          </div></div></div>
	<div id="pic_sidebar">
		<div style="border:0px solid #ccc;margin-right:1px;overflow:hidden">
        <br>
<?php if (get_option('swt_ad-photo-right1') == 'Display') { ?><?php echo stripslashes(get_option('swt_ad-photo-right1-code')); ?><?php } else { } ?>
</div>
        <?php  
			$categories = get_the_category();         
			$categoryIDS = array();          
			foreach ($categories as $category) {              
			array_push($categoryIDS, $category->term_id);         
			}          
			$categoryIDS = implode(",", $categoryIDS); 
		?>
		<div style="margin:9px 0">[
		 <?php if (get_next_post($categoryIDS)) { next_post_link('%link','« 上一张',true);} else { echo '已是最新图片';} ?> /
		<?php if (get_previous_post($categoryIDS)) { previous_post_link('%link','下一张 »',true);} else { echo '已是最后图片';} ?>  ]</div>
	<div class="item sidebar_item">
		<div class="itembody">
			<div class="sidebar_pic_list">
            <style>
            .morephoto img{width:75px;height:75px;}
            </style>
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
			'showposts'=>7,
			'cat'=>$ids,//指定的目录
			'caller_get_posts'=>1
		);
		$my_query = new WP_Query($args);
		if( $my_query->have_posts() ) {
			while ($my_query->have_posts()) : $my_query->the_post(); 
			$a++;
			?>
            <?php
            if($a!=5){
			?>
               <a href="<?php the_permalink(); ?>" rel="bookmark" class="morephoto" ceshi = '<?=$a;?>'  title="<?php the_title_attribute(); ?>">
               <?php the_post_thumbnail('bigphoto',array('alt' => trim(strip_tags( $post->post_title )),'title'=> trim(strip_tags( $post->post_title )))); ?>
               </a>
           <?php
			 }else{
		   ?>
            <a href="<?php the_permalink(); ?>"  class="sidebar_pic_list_big" >
             <?php the_post_thumbnail('bigphoto',array('alt' => trim(strip_tags( $post->post_title )),'title'=> trim(strip_tags( $post->post_title )))); ?>
            </a>
           <?php
			 }
		   ?>
            <?php
           if($a==4 ){			   
		   ?>
            <a href="<?php echo get_category_link($cat_id); ?>" class="sidebar_pic_list_cate">更多<?php echo $categorys[0]->cat_name; ?></a> 
           <?php
           }
		   ?>
           
			<?php endwhile;
		    } else { ?>
		      <!-- 没有相关文章显示随机文章 --> 
		  
           </a> 
			<?php }
			}
			$post = $backup;
			wp_reset_query();
         ?></div>
			<div class="clear"></div>
			<div class="sidebar_item_tags">
            <?php the_tags('标签：', ', ', ''); ?>  
            </div>
			<a id="show_cate_list_btn" class="btn_list_button" style="color:#FFF;" href="javascript:void(0);">展开全部图片分类</a><ul class="btn_list"><li style="border-top:none"><a href="<?php bloginfo('url'); ?>/category/photos">全部</a></li>
            <?php
			$parent = $categorys[0]->parent;
			$cat_id = $categorys[0]->cat_ID;//获取当前分类的id
			$swid = $parent==0?$cat_id:$parent;//选择根分类id
			wp_list_categories("child_of=" . $swid . "&depth=0&hide_empty=0&sort_order=desc&title_li=0");
			?>
            </ul></div></div>		
    <div class="item sidebar_item">
<?php if (get_option('swt_ad-photo-right2') == 'Display') { ?><?php echo stripslashes(get_option('swt_ad-photo-right2-code')); ?><?php } else { } ?>
</div></div><div class="clear"></div></div>
<?php endwhile; ?>
<?php endif; ?>