<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="zh-CN"><head profile="http://gmpg.org/xfn/11"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
	<title>下载高清原图</title>
<style>
	body{background:#212121 url('bg.jpg');}
	ul,li,body{padding:0;margin:0;}
	.clear{clear:both}
	#header{background:#111;border-bottom:2px dashed #666666; overflow: hidden; padding: 25px 0;clear:both}
	#header ul{margin:0 auto;display:block;width:970px}
	#header ul li{float:left;width:120px;display:block}
	#header ul .gg{width:730px}
	#img{display:inline-block;margin:15px auto 25px auto;border:13px solid #fff;background:#fff;}
	.button{margin-top:29px;display:inline-block;width:105px;height:40px;background:url("button.jpg") no-repeat;}
	.back:hover{background-position:0 -46px}
	.close{float:right;background-position:-112px 0}
	.close:hover{background-position:-112px -46px}
</style><style type="text/css">#yddContainer{display:block;font-family:Microsoft YaHei;position:relative;width:100%;height:100%;top:-4px;left:-4px;font-size:12px;border:1px solid}#yddTop{display:block;height:22px}#yddTopBorderlr{display:block;position:static;height:17px;padding:2px 28px;line-height:17px;font-size:12px;color:#5079bb;font-weight:bold;border-style:none solid;border-width:1px}#yddTopBorderlr .ydd-sp{position:absolute;top:2px;height:0;overflow:hidden}.ydd-icon{left:5px;width:17px;padding:0px 0px 0px 0px;padding-top:17px;background-position:-16px -44px}.ydd-close{right:5px;width:16px;padding-top:16px;background-position:left -44px}#yddKeyTitle{float:left;text-decoration:none}#yddMiddle{display:block;margin-bottom:10px}.ydd-tabs{display:block;margin:5px 0;padding:0 5px;height:18px;border-bottom:1px solid}.ydd-tab{display:block;float:left;height:18px;margin:0 5px -1px 0;padding:0 4px;line-height:18px;border:1px solid;border-bottom:none}.ydd-trans-container{display:block;line-height:160%}.ydd-trans-container a{text-decoration:none;}#yddBottom{position:absolute;bottom:0;left:0;width:100%;height:22px;line-height:22px;overflow:hidden;background-position:left -22px}.ydd-padding010{padding:0 10px}#yddWrapper{color:#252525;z-index:10001;background:url(chrome-extension://eopjamdnofihpioajgfdikhhbobonhbb/ab20.png);}#yddContainer{background:#fff;border-color:#4b7598}#yddTopBorderlr{border-color:#f0f8fc}#yddWrapper .ydd-sp{background-image:url(chrome-extension://eopjamdnofihpioajgfdikhhbobonhbb/ydd-sprite.png)}#yddWrapper a,#yddWrapper a:hover,#yddWrapper a:visited{color:#50799b}#yddWrapper .ydd-tabs{color:#959595}.ydd-tabs,.ydd-tab{background:#fff;border-color:#d5e7f3}#yddBottom{color:#363636}#yddWrapper{min-width:250px;max-width:400px;}</style></head>

<body>
<div id="header">
<?php
include('key.class.php');
$key = new KEY('tupian');
$img = $_GET['key'];
$imgpw =  $key->decode($img);
?>
	<ul>
		<li><a class="button back" href="javascript:window.close();"></a></li>
		<li class="gg">
			<div style="width:730px;height:93px; color:#FFF">
			
	<table width="729" height="90" border="0" bgcolor="#FFFFFF">
  <tr>
    <td>
	<a href="http://s.click.taobao.com/t?e=m%3D2%26s%3DRXVYJoJeGW4cQipKwQzePCperVdZeJvipRe%2F8jaAHci5VBFTL4hn2Urd%2F9BMJB8HHBMajAjK1gCAFeafH4QErWnnYrXxa5MUmboFpbUf1bP77vtxsAD0fL0CYBEjBf0r9c4%2BDfHF4VV%2BPGXoAieI2kkaGVtp31Rb" target="_blank"><img src="http://img01.taobaocdn.com/tps/i1/T1rf2NXlFhXXXG_RZI-728-90.jpg" /></a>
	</td>
  </tr>
</table> 

			</div>
		</li>
		<li><a class="button close" href="javascript:window.close();"></a></li>
	</ul>
</div>
<div id="content">
	<center><img id="img" src="<?=$imgpw;?>"></center>
	<div class="clear"></div>
</div>


</body></html>