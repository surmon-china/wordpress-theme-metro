<?php get_header(); ?>
<div id="content" style=" height: 460px; ">
	<script type="text/javascript" src="http://www.qq.com/404/search_children.js" charset="utf-8"></script>
	<style type="text/css">
	.mod_lost_child,.mod_lost_child_little{color:#000;font:14px Microsoft YaHei,宋体,Arial,Verdana,Helvetica,sans-serif!important;margin:2px auto;width:100%}
	.mod_lost_child .hd .wrong{color:#333;font-size:48px;left:290px;top:40px}
	.mod_lost_child .hd .other_info{left:400px;top:30px;width:250px}
	.mod_lost_child .child_info .info_person{padding:5px 0 5px 265px}
	.mod_lost_child .ft .support_company,.mod_lost_child_little .ft .support_company{display:none}
	.mod_lost_child .ft .baby_back,.mod_lost_child_little .ft .baby_back{display:none}
	.info{display:none}
	.lost_child_box{border:3px solid #eee;border-radius:0;box-shadow:none;color:#5f5f5f}
	.mod_lost_child .hd{border-radius:0;background:#f9f9f9;border-bottom:3px solid #eee}
	.mod_lost_child .ft,.mod_lost_child_little .ft{background-color:#f3f3f3;background-image:none;background-repeat:repeat-x;border-radius:0;border-top:3px solid #eee}
	.mod_lost_child .hd p span{color:#0898dd}
	</style>
	<div style=" margin-top: -54px; margin-left: 20px; font-size: 15px; font-weight: bold; "><a href="http://www.qq.com/404/" target="_blank">我的网站也要加入「帮孩子回家」特别行动 &gt;&gt;</a></div>
<script type="text/javascript">  
  var i = 3;  
  var intervalid;  
    intervalid = setInterval("fun()", 1000);  
    function fun() {  
          if (i == 0) {  
                  window.location.href = "<?php bloginfo('url'); ?>";  
                        clearInterval(intervalid);  
                      }  
  document.getElementById("secondsDisplay").innerHTML = i;  
  i--;   
    }  
</script>
<?php get_footer(); ?>