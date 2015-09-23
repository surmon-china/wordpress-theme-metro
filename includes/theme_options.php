<?php

$themename = "Nocower-Metro";
$shortname = "swt";

$categories = get_categories('hide_empty=0&orderby=name');
$wp_cats = array();
foreach ($categories as $category_list ) {
       $wp_cats[$category_list->cat_ID] = $category_list->cat_name;
}
//Stylesheets Reader
$alt_stylesheet_path = TEMPLATEPATH . '/';
$alt_stylesheets = array();
$alt_stylesheets[] = '';

if ( is_dir($alt_stylesheet_path) ) {
    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) { 
        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) {
            if(stristr($alt_stylesheet_file, ".css") !== false) {
                $alt_stylesheets[] = $alt_stylesheet_file;
            }
        }    
    }
}
$number_entries = array("Select a Number:","1","2","3","4","5","6","7","8","9","10", "12","14", "16", "18", "20" );
$options = array (
	array(  "name" => $themename." Options",
      		"type" => "title"),

//选择颜色风格
    array( "name" => "选择网站配色",
           "type" => "section"),
    array( "type" => "open"),

	array(	"name" => "选择颜色风格",
			"desc" => "一共5种主题风格供您选择",
			"id" => $shortname."_alt_stylesheet",
			"std" => "Select a CSS skin:",
			"type" => "select",
			"options" => $alt_stylesheets,
			"default_option_value" => "默认风格"),
			
//网站基础配置
    array(  "type" => "close"),
	array(  "name" => "网站统基础配置",
			"type" => "section"),
	array(  "type" => "open"),
    array(  "name" => "输入你的网站统计代码",
            "desc" => "此处可以输入统计代码、对联广告、分享代码、淘点金代码等等，将会作用于全站",
            "id" => $shortname."_tjcode",
            "type" => "textarea",
            "std" => "全局代码"),
	array(  "name" => "是否显示网站底部的友情链接",
			"desc" => "默认不显示，友情链接只会在首页显示，在外观-菜单-设置-保存即可",
            "id" => $shortname."_friendlink",
            "type" => "select",
            "std" => "Display",
            "options" => array("Hide", "Display")),
	array(  "name" => "是否显示备案号",
			"desc" => "默认不显示",
            "id" => $shortname."_beian",
            "type" => "select",
            "std" => "Display",
            "options" => array("Hide", "Display")),
	array(  "name" => "输入您的备案号",
			"desc" => "",
            "id" => $shortname."_beianhao",
            "type" => "textarea",
            "std" => "陕ICP备13004859号"),	
	array(  "name" => "请输入首页中部（左）列表ID",
			"desc" => "首页中部CMS模块左侧列表的文章分类ID",
            "id" => $shortname."_index-list-left",
            "type" => "textarea",
            "std" => "输入文章分类的ID即可"),	
	array(  "name" => "请输入首页中部（右）列表ID",
			"desc" => "首页中部CMS模块右侧列表的文章分类ID",
            "id" => $shortname."_index-list-right",
            "type" => "textarea",
            "std" => "输入文章分类的ID即可"),	
	array(  "name" => "是否显示首页播放器",
			"desc" => "默认不显示",
            "id" => $shortname."_ad-index-player",
            "type" => "select",
            "std" => "Display",
            "options" => array("Hide", "Display")),
	array(  "name" => "输入音乐地址",
			"desc" => "音乐地址以”http://*****.mp3“的形式编写，多个地址用“|”隔开即可，输入框内有演示地址",
            "id" => $shortname."_ad-index-player-code",
            "type" => "textarea",
            "std" => "http://sc.111ttt.com/up/mp3/208923/61113E9EB17C06D0694026ADF94AA681.mp3|http://sc.111ttt.com/up/mp3/214765/6AC745CA401941EA61E22E1EE8CDDE73.mp3"),	
	array(  "name" => "搜索框下方的广告位代码",
			"desc" => "建议使用广告联盟的文字广告代码/或者HTML文字连接，大小为300*30，留空默认是空白",
            "id" => $shortname."_index-top-ad",
            "type" => "textarea",
            "std" => "最好使用百度联盟的Metro标签广告那种，效果比较好"),	
	array(  "name" => "边栏【关注本站】HTML",
			"desc" => "完全自定义html代码，只要大小不要过分就好，可以填写为微博秀，二维码关注等等其他社交化组件",
            "id" => $shortname."_sidebar-guanzhu",
            "type" => "textarea",
            "std" => "支持HTML/IFAME等代码"),			
	array(  "name" => "输入网站导航菜单的HTML",
			"desc" => "这里控制并定义网站的头部菜单，由静态HTML编写，请按照类似主题介绍中的规则来编写菜单",
            "id" => $shortname."_menu",
            "type" => "textarea",
            "std" => "请务必按照主题说明所写的默认规则编写，使用愉快！<br> "),			
			array(	"type" => "close") ,
	
//网站广告位设置

    array(  "type" => "close"),
	array(  "name" => "网站广告位设置",
			"type" => "section"),
    array(  "name" => "是否显示首页中部CMS上横幅广告位",
			"desc" => "默认不显示",
            "id" => $shortname."_ad-index1",
            "type" => "select",
            "std" => "Display",
            "options" => array("Hide", "Display")),
	array(  "name" => "输入广告代码",
			"desc" => "",
            "id" => $shortname."_ad-index1-code",
            "type" => "textarea",
            "std" => "这里填写的是首页中部CMS模块中的横幅广告位，建议宽度为960，高度建议为90，内容自定义"),	
    array(  "name" => "是否显示每一个翻页按钮下方的广告位",
			"desc" => "默认不显示",
            "id" => $shortname."_ad-prev-next",
            "type" => "select",
            "std" => "Display",
            "options" => array("Hide", "Display")),
	array(  "name" => "输入广告代码",
			"desc" => "",
            "id" => $shortname."_ad-prev-next-code",
            "type" => "textarea",
            "std" => "这里填写的是【首页、列表页、TAG页、搜索页】的每个列表下方的翻页按钮下方的广告位代码，宽度建议为640，高度270，以内"),	
	array(  "name" => "是否显示普通文章页正文上方 + 视频文章页视频上方广告位",
			"desc" => "默认不显示",
            "id" => $shortname."_ad-single-top",
            "type" => "select",
            "std" => "Display",
            "options" => array("Hide", "Display")),
	array(  "name" => "输入广告代码",
			"desc" => "",
            "id" => $shortname."_ad-single-top-code",
            "type" => "textarea",
            "std" => "普通文章页正文上方，视频文章页视频上方广告位，大小为【336*280】"),			
	array(  "name" => "是否显示普通文章页正文下方广告位",
			"desc" => "默认不显示",
            "id" => $shortname."_ad-single-bottom",
            "type" => "select",
            "std" => "Display",
            "options" => array("Hide", "Display")),
	array(  "name" => "输入广告代码",
			"desc" => "",
            "id" => $shortname."_ad-single-bottom-code",
            "type" => "textarea",
            "std" => "这里的广告显示在普通文章页的正文下方【更多内容处】，宽度为630以内，高度自定义，建议400以内"),					
    array(  "name" => "是否显示边栏上方广告位1",
			"desc" => "默认不显示",
            "id" => $shortname."_ad-sidebar1",
            "type" => "select",
            "std" => "Display",
            "options" => array("Hide", "Display")),
	array(  "name" => "输入广告代码",
			"desc" => "",
            "id" => $shortname."_ad-sidebar1-code",
            "type" => "textarea",
            "std" => "边栏上部广告位，不会下拉悬浮"),	
    array(  "name" => "是否显示边栏中部广告位2（会悬屏停留）",
			"desc" => "默认不显示",
            "id" => $shortname."_ad-sidebar2",
            "type" => "select",
            "std" => "Display",
            "options" => array("Hide", "Display")),
	array(  "name" => "输入广告代码",
			"desc" => "",
            "id" => $shortname."_ad-sidebar2-code",
            "type" => "textarea",
            "std" => "边栏的第二个广告位，在滚动翻页之后，会一直悬浮在右侧顶部"),	
	array(  "name" => "是否显示瀑布流列表页（图片/视频）右侧的广告位",
			"desc" => "默认不显示",
            "id" => $shortname."_ad-liu-right",
            "type" => "select",
            "std" => "Display",
            "options" => array("Hide", "Display")),
	array(  "name" => "输入广告代码",
			"desc" => "",
            "id" => $shortname."_ad-liu-right-code",
            "type" => "textarea",
            "std" => "这里显示的是图片/视频瀑布流列表页的右侧广告位【160宽，高度可以自定义，可以放置多个160*600】"),	
	array(  "name" => "是否显示视频/图片瀑布流列表页底部横幅广告位",
			"desc" => "默认不显示",
            "id" => $shortname."_ad-liu-bottom",
            "type" => "select",
            "std" => "Display",
            "options" => array("Hide", "Display")),
	array(  "name" => "输入广告代码",
			"desc" => "",
            "id" => $shortname."_ad-liu-bottom-code",
            "type" => "textarea",
            "std" => "瀑布流列表页底部的横幅广告位，宽度950，高度90左右"),	
	array(  "name" => "是否显示视频文章页视频下小横幅广告位",
			"desc" => "默认不显示",
            "id" => $shortname."_ad-video-bottom",
            "type" => "select",
            "std" => "Display",
            "options" => array("Hide", "Display")),
	array(  "name" => "输入广告代码",
			"desc" => "",
            "id" => $shortname."_ad-video-bottom-code",
            "type" => "textarea",
            "std" => "视频内容页，视频内容下方的小横幅广告位，建议【728*90】"),	
	array(  "name" => "是否显示视频文章页右侧竖幅广告位",
			"desc" => "默认不显示",
            "id" => $shortname."_ad-video-right",
            "type" => "select",
            "std" => "Display",
            "options" => array("Hide", "Display")),
	array(  "name" => "输入广告代码",
			"desc" => "",
            "id" => $shortname."_ad-video-right-code",
            "type" => "textarea",
            "std" => "显示在视频文章页右侧，相关视频下方的竖幅广告位【160宽度】高度建议不要太高"),			
	array(  "name" => "是否显示图片文章页图片下小横幅广告位",
			"desc" => "默认不显示",
            "id" => $shortname."_ad-photo-bottom",
            "type" => "select",
            "std" => "Display",
            "options" => array("Hide", "Display")),
	array(  "name" => "输入广告代码",
			"desc" => "",
            "id" => $shortname."_ad-photo-bottom-code",
            "type" => "textarea",
            "std" => "图片文章页图片下方的广告位，宽度为【620】高度建议120之内。"),
	array(  "name" => "是否显示图片文章页右侧上部广告位",
			"desc" => "默认不显示",
            "id" => $shortname."_ad-photo-right1",
            "type" => "select",
            "std" => "Display",
            "options" => array("Hide", "Display")),
	array(  "name" => "输入广告代码",
			"desc" => "",
            "id" => $shortname."_ad-photo-right1-code",
            "type" => "textarea",
            "std" => "图片文章页右侧边栏顶部广告位，大小为【336*280】"),	
	array(  "name" => "是否显示图片文章页右侧下部广告位",
			"desc" => "默认不显示",
            "id" => $shortname."_ad-photo-right2",
            "type" => "select",
            "std" => "Display",
            "options" => array("Hide", "Display")),
	array(  "name" => "输入广告代码",
			"desc" => "",
            "id" => $shortname."_ad-photo-right2-code",
            "type" => "textarea",
            "std" => "图片文章页右侧边栏下部广告位，大小为【336*280】"),			
	array(	"type" => "close") 
);
function mytheme_add_admin() {
global $themename, $shortname, $options;
if ( $_GET['page'] == basename(__FILE__) ) {
	if ( 'save' == $_REQUEST['action'] ) {
		foreach ($options as $value) {
	update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }
foreach ($options as $value) {
	if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
	header("Location: admin.php?page=theme_options.php&saved=true");
die;
}
else if( 'reset' == $_REQUEST['action'] ) {
	foreach ($options as $value) {
		delete_option( $value['id'] ); }
	header("Location: admin.php?page=theme_options.php&reset=true");
die;
}
}
add_theme_page($themename." Options", "前端中央集控台", 'edit_themes', basename(__FILE__), 'mytheme_admin');
}
function mytheme_add_init() {
$file_dir=get_bloginfo('template_directory');
wp_enqueue_style("functions", $file_dir."/includes/options/options.css", false, "1.1", "all");
wp_enqueue_script("rm_script", $file_dir."/includes/options/rm_script.js", false, "1.0");
}
function mytheme_admin() {
global $themename, $shortname, $options;
$i=0;
if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' 主题设置已保存</strong></p></div>';
if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' 主题已重新设置</strong></p></div>';
echo"<script type=\"text/javascript\" src=\"http://api.nocower.com/metro-theme-update/metro.js\"></script>"
 ."";
?>
<script type="text/javascript">
var _version = '<?php $theme_data = get_theme_data(dirname(__FILE__) . '/../style.css');echo $theme_data['Version'];?>';
jQuery(document).ready(function(){
	jQuery("span.version_number").text(weisaytheme_latest_version);
	jQuery("a.downloand_add").attr("href",downloand_add);
	jQuery("a.author_add").attr("href",author_add);
	if(_version < weisaytheme_latest_version ){
		jQuery(".version_tips").fadeIn(1000);
	}
	else {
		jQuery(".version_tips").hide();
	};
	jQuery(".close_version_tips").click(function(){
		jQuery(this).parent().fadeOut(1000);
	});
	jQuery(".fl_cbradio_op:checked").each(function() {
		jQuery(this).parent().parent().children().eq(3).show();
	});
	jQuery(".fl_cbradio_cl:checked").each(function() {
		jQuery(this).parent().parent().children().eq(3).hide();
	});
	jQuery(".fl_cbradio_cl").click(function(){
		jQuery(this).parent().parent().children().eq(3).slideUp();
	});
	jQuery(".fl_cbradio_op").click(function(){
		jQuery(this).parent().parent().children().eq(3).slideDown();
	});
   jQuery(".theme_options_content > div:not(:first)").hide();
   jQuery(".theme_options_tab li").each(function(index){
       jQuery(this).click(
	   	  function(){
			  jQuery(".theme_options_tab li.current").removeClass("current");
			  jQuery(this).addClass("current");
			  jQuery(".theme_options_content > div:visible").hide();
			  jQuery(".theme_options_content > div:eq(" + index + ")").show();
	  })
   })
})
</script>
<div class="wrap rm_wrap" style=" width: 940px; margin: 30px auto; background-color: #72b332; padding: 10px; ">
<div style=" padding: 0 10px; height: 35px; background-color: #fff; line-height: 35px; margin-bottom: 10px; font-size: 15px; "><p style=" padding: 0; margin: 0px; line-height: 35px; float: left; ">前端中央集控台</p><span style=" float: right; font-size: 14px; " target="_blank"><a href="http://admin.nocower.com" target="_blank" style=" text-decoration: none; ">前往主题发布中心</a></span></div>
<div class="rm_opts">
<div class="rm_opts">
<form method="post"> 
<?php foreach ($options as $value) {
switch ( $value['type'] ) {
case "open":
?>
<?php break;
case "close":
?>
</div>
</div>

<?php break;
case "title":
?>
<?php break;
case 'text':
?>
<div class="rm_input rm_text">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'])  ); } else { echo $value['std']; } ?>" />
 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 </div>
<?php
break;
case 'textarea':
?>
<div class="rm_input rm_textarea">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id']) ); } else { echo $value['std']; } ?></textarea>
 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 </div>
<?php
break;
case 'select':
?>
<div class="rm_input rm_select">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
<?php foreach ($value['options'] as $option) { ?>
		<option value="<?php echo $option;?>" <?php if (get_settings( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>>
		<?php
		if ((empty($option) || $option == '' ) && isset($value['default_option_value'])) {
			echo $value['default_option_value'];
		} else {
			echo $option; 
		}?>
		
		</option><?php } ?>
</select>
	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
</div>
<?php
break;
case "checkbox":
?>
<div class="rm_input rm_checkbox">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 </div>
<?php break; 
case "section":
$i++;
?>
<div class="rm_section">
<div class="rm_title"><h3><img src="<?php bloginfo('template_directory')?>/includes/options/clear.png" class="inactive" alt="""><?php echo $value['name']; ?></h3><span class="submit"><input name="save<?php echo $i; ?>" type="submit" value="保存设置" />
</span><div class="clearfix"></div></div>
<div class="rm_options">
<?php break;
}
}
?>
<input type="hidden" name="action" value="save" />
</form>
<form method="post" style=" background-color: #fff; padding: 8px 10px; margin-top: 10px; ">
<p class="submit" style=" margin: 0; padding: 0; ">
<input name="reset" type="submit" value="恢复默认" /> <font color=red>提示：此按钮将恢复主题初始状态，您的所有设置将消失！</font>
<input type="hidden" name="action" value="reset" />
<span
</p>
</form>
 </div> 
 <div class="kg"></div>
 </div>
<?php
}
?>
<?php
function mytheme_wp_head() { 
	$stylesheet = get_option('swt_alt_stylesheet');
	if($stylesheet != ''){?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/<?php echo $stylesheet; ?>" />
<?php }
} 
add_action('wp_head', 'mytheme_wp_head');
add_action('admin_init', 'mytheme_add_init');
add_action('admin_menu', 'mytheme_add_admin');
?>