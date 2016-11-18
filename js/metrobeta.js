jQuery(document).ready(function(){
jQuery('.article h2 a').click(function(){
    jQuery(this).text('页面载入中……');
    window.location = jQuery(this).attr('href');
    });
});

// 滚屏
jQuery(document).ready(function(){
jQuery('#roll_top').click(function(){jQuery('html,body').animate({scrollTop: '0px'}, 800);}); 
jQuery('#ct').click(function(){jQuery('html,body').animate({scrollTop:jQuery('#comments').offset().top}, 800);});
jQuery('#fall').click(function(){jQuery('html,body').animate({scrollTop:jQuery('#footer').offset().top}, 800);});
});

//顶部导航下拉菜单
jQuery(document).ready(function(){
jQuery(".dropdownlink").hover(function(){
jQuery(this).children("ul").stop().fadeTo('fast', 1);
jQuery(this).addClass("li01");
},function(){
jQuery(this).children("ul").stop().fadeOut();
jQuery(this).removeClass("li01");
});
});

//侧边栏TAB效果
jQuery(document).ready(function(){
jQuery('.tab_menu li').mouseover(function(){
	jQuery(this).addClass("current").siblings().removeClass();
        jQuery(".tab_content > div").eq(jQuery('.tab_menu li').index(this)).fadeIn(0).siblings().hide();;
});
});

//图片渐隐
jQuery(function () {
jQuery('.thumbnail img').hover(
function() {jQuery(this).fadeTo("fast", 0.9);},
function() {jQuery(this).fadeTo("fast", 1);
});
});

//新窗口打开
jQuery(document).ready(function(){
	jQuery("a[rel='external'],a[rel='external nofollow']").click(
	function(){window.open(this.href);return false})
});