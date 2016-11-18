<div class="clear"></div></div>
<div class="clear"></div></div></div>
<div class="footbar"></div>
<div id="footer">
<div id="footer-body">
<a id="footer-logo"  href="<?php bloginfo('home'); ?>" title="<?php bloginfo('name'); ?>"></a>
<div id="footer-content">
Copyright © <?php bloginfo('name'); ?> ™ |  <a href="<?php bloginfo('home'); ?>/sitemap.xml" target="_blank" rel="nofllow">网站地图 </a>| Powered By <a href="http://cn.wordpress.org/" target="_blank" rel="nofllow">Wordpress</a> + <a href="http://admin.nocower.com/3901.html" target="_blank" rel="nofllow">Metro</a> |
 <?php if (get_option('swt_beian') == 'Display') { ?><a href="http://www.miitbeian.gov.cn/" target="_blank" rel="nofllow"><?php echo stripslashes(get_option('swt_beianhao')); ?></a>
<?php { echo '| '; } ?><?php } else { } ?><?php echo stripslashes(get_option('swt_tjcode')); ?>
</div>
<?php if (get_option('swt_friendlink') == 'Display'&& is_home()) { ?>
<div id="footer-friend">
<b class="friendb">友情链接：</b>
<?php
	if(function_exists('wp_nav_menu')) {
	wp_nav_menu(array('theme_location'=>'foot','fallback_cb' => 'link_to_menu_editor','menu_class'=>'foot','menu_id'=>'foot','container'=>'foot'));
	}
    ?>
</div>
<?php } else { } ?>
<a href="#top">
<div id="gotop" >
</div>
</a>
<?php
if( is_single() ){?>
<script type="text/javascript">
$(function(){
$("#btn_page_prev,#btn_page_next").hover(function(){$(this).find("span").show();},function(){$(this).find("span").hide();});
});
</script> 
<?php }?></div><?php wp_footer(); ?></div></div>
<!-- JiaThis Button BEGIN -->
<script type="text/javascript" >
var jiathis_config={
	siteNum:15,
	sm:"ishare,qzone,tsina,tqq,weixin,renren,kaixin001,tieba,douban,cqq,xiaoyou,hi,qq,tifeng,copy",
	summary:"",
	marginTop:220,
	imageWidth:24,
	imageUrl:"http://bdimg.share.baidu.com/static/images/l5.gif",
	ralateuid:{
		"tsina":"nocower"
	},
	showClose:false,
	shortUrl:false,
	hideMore:false
}
</script>
<script type="text/javascript" src="http://v3.jiathis.com/code/jiathis_r.js?type=left&btn=l2.gif&move=0" charset="utf-8"></script>
<!-- JiaThis Button END -->
</body>
</html>