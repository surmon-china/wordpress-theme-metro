// JavaScript Document
 $(function(){  
	  //获取要定位元素距离浏览器顶部的距离
	  var navH = $("#ubarl").offset().top;
	  var footnah = $("#footer").offset().top;
	  var a=0;
	  $(window).scroll(function(){
		//获取滚动条的滑动距离 
		var scroH = $(this).scrollTop();  
		//滚动条的滑动距离大于等于定位元素距离浏览器顶部的距离，就固定，反之就不固定
		var main = $('.main').height();
		var barnav = $('#sidebar').height();
		// alert(main);
		// alert(barnav);
		if(main>barnav){
		if(scroH>=navH){
			if(scroH>footnah-700){ //当超过指定的像素之后 就会每增加移动一个像素top就会减1 相当于静止
			//alert(1);
			     lenheig = scroH-(footnah-700);
				 $("#ubarl").css({"position":"fixed","top":(0)-lenheig});
				}else{
					$("#ubarl").css({"position":"fixed","top":0});
					} 
		}else if(scroH<navH){
			//alert(1);
			$("#ubarl").css({"position":"static","margin":"0 auto"});
		}
		console.log(scroH==navH);
		}
	   })
	  })