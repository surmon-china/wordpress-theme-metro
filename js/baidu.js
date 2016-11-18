// JavaScript Document
		var bds_config = {"bdTop":241};
		document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + new Date().getHours();
		
	//-----------百度分享以上整理--------------//	
var source = document.getElementById('mod_mch_metro'); 
var target = document.getElementById('random-mod_mch_metro'); 
var mod_mch_metro = source.getElementsByTagName('li'); 
var arr = new Array(); 
for(var i=0; i<mod_mch_metro.length; i++) { 
arr[i] = i; 
} 
function randomSort(a, b){ 
var tmp = parseInt((Math.random() + 0.5), 10); 
return tmp ? a-b : b-a; 
} 
arr.sort(randomSort); 
for(var i=0; i<arr.length; i++) { 
target.appendChild(mod_mch_metro[arr[i]].cloneNode(true)); 
} 
source.parentNode.removeChild(source); 
target.style.display = 'block'; 
$(function() {
	var sWidth = $("#focus").width(); 
	var len = $("#focus ul li").length; 
	var index = 0;
	var picTimer;
	var btn = "<div class='btnBg'></div><div class='btn'>";
	for(var i=0; i < len; i++) {
		btn += "<span></span>";
	}
	btn += "</div><div class='preNext pre'></div><div class='preNext next'></div>";
	$("#focus").append(btn);
	$("#focus .btnBg").css("opacity",0.5);
	$("#focus .btn span").css("opacity",0.6).mouseenter(function() {
		index = $("#focus .btn span").index(this);
		showPics(index);
	}).eq(0).trigger("mouseenter");
	$("#focus .preNext").css("opacity",0).hover(function() {
		$(this).stop(true,false).animate({"opacity":"0.8"},300);
	},function() {
		$(this).stop(true,false).animate({"opacity":"0"},300);
	});
	$("#focus .pre").click(function() {
		index -= 1;
		if(index == -1) {index = len - 1;}
		showPics(index);
	});
	$("#focus .next").click(function() {
		index += 1;
		if(index == len) {index = 0;}
		showPics(index);
	});
	$("#focus ul").css("width",sWidth * (len));
	$("#focus").hover(function() {
		clearInterval(picTimer);
	},function() {
		picTimer = setInterval(function() {
			showPics(index);
			index++;
			if(index == len) {index = 0;}
		},4000); 
	}).trigger("mouseleave");
	function showPics(index) { 
		var nowLeft = -index*sWidth; 
		$("#focus ul").stop(true,false).animate({"left":nowLeft},300); 
		//$("#focus .btn span").removeClass("on").eq(index).addClass("on"); 
		$("#focus .btn span").stop(true,false).animate({"opacity":"0.4"},300).eq(index).stop(true,false).animate({"opacity":"1"},300); 
	}
});