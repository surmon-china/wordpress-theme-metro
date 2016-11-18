  $(function() {
  	//获取要定位元素距离浏览器顶部的距离
  	var navH = $("#share_toolbar_wrapper").offset().top;
  	$(window).scroll(function() {
  		//获取滚动条的滑动距离
  		//alert(navH);
  		var scroH = $(this).scrollTop();
  		//滚动条的滑动距离大于等于定位元素距离浏览器顶部的距离，就固定，反之就不固定
  		if (scroH >= navH) {
  			$("#share_toolbar_wrapper").css({
  				"position": "fixed",
  				"top": -5,
  				"z-index": 10000
  			});
  		} else if (scroH < navH) {
  			$("#share_toolbar_wrapper").css({
  				"position": "static",
  				"margin": "0 auto"
  			});
  		}
  		//console.log(scroH==navH); 
  	})
  })