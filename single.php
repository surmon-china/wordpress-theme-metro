<?php get_header(); ?>
<span id="btn_page_prev"><?php next_post_link( '%link', '<span id="fanye">〈</span>' ); ?></span>
<span id="btn_page_next"><?php previous_post_link( '%link', '<span id="fanye">〉</span>' ); ?></span>   
<?php
     $categorys = get_the_category(); 
	 $cat_id = $categorys[0]->category_parent;//获取当前跟分类id
	 $nameparent = '';
	if($cat_id!=0){
		 $parent_id = $categorys[0]->category_parent;
		 $category_parinfo = get_category($cat_id);
		 $nameparent = $category_parinfo->slug; 
		}
    if($categorys[0]->slug!='photos' && $nameparent != 'photos' && $categorys[0]->slug!='videos' && $nameparent != 'videos'):
?>
<div id="content">
<div class="main">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="left">
<div class="post_date">
<span class="date_d"><?php the_time('d') ?></span>
<span class="date_ym"><?php the_time('Y') ?>.<?php echo date('m',get_the_time('U'));?></span>
</div>
<div class="articles" >
<div class="post-title-single">
<h2><?php the_title(); ?></h2></div>
<style>
.post-top-ad{margin-top:50px;}
</style>
<!--滚动条 的滑动分享代码跟着滑动-->
<script type="text/javascript"  src="<?php bloginfo('template_directory'); ?>/js/scroll-share-nav.js"></script> 
<div class="infosingle">
<div id="singleinfo">
<span class="info-tag-icon"><?php the_tags('标签：', ', ', ''); ?></span>
<span class="info-category-icon"><?php the_category(', ') ?></span>
<span class="info-url-icon">
<?php 
     $f = get_post_meta($post->ID, 'f', true);
$furl = get_post_meta($post->ID, 'furl', true);
     if(!empty($f)){
        echo '来自:'."<a href='$furl' target='blank' >$f</a>";
                      }
?></span>
</div></div>
<?php if (get_option('swt_ad-single-top') == 'Display') { ?><div class="post-top-ad" ><?php echo stripslashes(get_option('swt_ad-single-top-code')); ?></div><?php } else { } ?>
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
             <a class="bds_renren" id="stb_btn_renren_small" href="javascript:void(0);" title="分享到人人网"></a>			        
             <span class="bds_more" id="stb_btn_more"><span id="stb_sbtn_more_icon"></span></span>			        
             <a class="shareCount" href="javascript:void(0);" title="累计分享20次">20</a>				
             </div>			
             <div class="stb_divide"></div>			
             <div class="stb_share_buttons stb_group">
             <script>
               $(function(){
				     $('.stb_share_buttons a[rel=prev]').attr('id','stb_btn_next');
					 $('#stb_btn_next').attr('title',$('#stb_btn_next').html());
					 $('.stb_share_buttons a[rel=next]').attr('id','stb_btn_prev'); 
					 $('#stb_btn_prev').attr('title',$('#stb_btn_prev').html());
				   })
               </script>		
               <?php  
				  $categories = get_the_category();         
				  $categoryIDS = array();          
				  foreach ($categories as $category) {              
				  array_push($categoryIDS, $category->term_id);         
				  }          
				  $categoryIDS = implode(",", $categoryIDS); 
		       ?>	
              <?php if (get_next_post($categoryIDS)) { next_post_link('%link','%title',true);} else { echo '<a id="stb_btn_prev" href="javascript:alert(\'前面已经木有啦...\');" title="上一篇：木有了 ">上一篇：木有了</a>';} ?>	
             <?php if (get_previous_post($categoryIDS)) { previous_post_link('%link','%title',true);} else { echo '<a id="stb_btn_next"  href="javascript:alert(\'下面已经木有啦...\');"  title="下一篇：木有了 ">下一篇：木有了</a>';} ?>  	
             </div>			
<div class="stb_group_right"><div class="bdlikebutton" style="margin-top: 4px; margin-right:3px;"></div></div></div></div> 
<script id="bdlike_shell"></script>
<script type="text/javascript"  src="<?php bloginfo('template_directory'); ?>/js/like_shell.js"></script>
<script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=665594" src="<?php bloginfo('template_directory'); ?>/js/bds_s_v2.js"></script>
        <div class="context"> 
        <script>
         $(function(){
			 $('.feed-tip').before('<br>');
			 })
        </script>
        <?php if (get_option('swt_adb') == 'Display') { ?><div style="float:right;border:1px #ccc solid;padding:2px;overflow:hidden;margin:12px 0 1px 2px;"><?php echo stripslashes(get_option('swt_adbcode')); ?></div><?php { echo ''; } ?><?php } else { } ?><?php the_content('Read more...'); ?></div> 
<?php wp_link_pages(array('before' => '<div class="fenye">', 'after' => '</div>',
'next_or_number' => 'next', 'previouspagelink' => '返回本文【上一页】', 'nextpagelink' => "阅读本文【下一页】")); ?>
        <?php if (get_option('swt_adc') == 'Display') { ?><p style="text-align:center;"><?php echo stripslashes(get_option('swt_adccode')); ?></p><?php { echo ''; } ?><?php } else { } ?></div><div class="gengduo">更多内容：</div></div>
<div class="articles" style=" padding-top: 0px; ">
<?php if (get_option('swt_ad-single-bottom') == 'Display') { ?><div id="singlead"><?php echo stripslashes(get_option('swt_ad-single-bottom-code')); ?></div><?php } else { } ?>
</div>
<div class="articles">
<div class="section_title">
<span>关于本文</span></div>
<div class="gybw">
<li>属于分类：<?php the_category('，') ?></li>
<li>本文标签：<?php the_tags('', ', ', ''); ?></li>
<li>本文编辑：<?php the_author(); ?> </li>
<li>流行热度：超过<?php post_views(' ', ' 次'); ?>围观</li>
<li>生产日期：<?php the_time('Y') ?>年<?php echo date('m',get_the_time('U'));?>月<?php the_time('d') ?>日 — <?php the_time(‘m-d-y’) ?></li></div></div>
<div class="articles">
<div id="wumiiDisplayDiv" class="wumiidisplay"></div></div>
<div class="articles">
<div class="section_title">
<span>相关文章</span></div></div>
<div class="articles" style=" padding-top: 0px; ">
<?php include('includes/related.php'); ?>
<div class="clear"></div></div>
<div class="articles">
<div class="section_title">
<span>各种观点</span></div></div>
<div class="articles">
<?php comments_template(); ?></div>
<?php endwhile; else: ?>
<?php endif; ?></div> 
<?php include_once("sidebar.php"); ?>
<?php 
else:
if($categorys[0]->slug=='photos' || $nameparent == 'photos'):
include('single_photos.php');
else:
if($categorys[0]->slug=='videos' || $nameparent == 'videos'):
include('single_videos.php');
endif;
endif;
endif;
?>
<?php get_footer(); ?>