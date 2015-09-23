<?php
include("includes/theme_options.php"); 
//主题检测新版本升级
require_once(TEMPLATEPATH . '/includes/theme-update-checker.php'); 
$wpdaxue_update_checker = new ThemeUpdateChecker(
	'Nocower-Metro', 
	'http://api.nocower.com/metro-theme-update/metro.json' 
);
//友情链接
if ( function_exists('register_nav_menus') ) {
		register_nav_menus(array('foot' => '友情链接'));
	}
//移除顶部
function hide_admin_bar($flag) {
		return false;
	}
add_filter('show_admin_bar','hide_admin_bar');
//禁用Google Open Sans字体，加速网站
add_filter( 'gettext_with_context', 'wpdx_disable_open_sans', 888, 4 );
function wpdx_disable_open_sans( $translations, $text, $context, $domain ) {
  if ( 'Open Sans font: on or off' == $context && 'on' == $text ) {
    $translations = 'off';
  }
  return $translations;
}
//获得热评文章
function simple_get_most_viewed($posts_num=11, $days=30){
    global $wpdb;
    $sql = "SELECT ID , post_title , comment_count
            FROM $wpdb->posts
           WHERE post_type = 'post' AND TO_DAYS(now()) - TO_DAYS(post_date) < $days
		   AND ($wpdb->posts.`post_status` = 'publish' OR $wpdb->posts.`post_status` = 'inherit')
           ORDER BY comment_count DESC LIMIT 0 , $posts_num ";
    $posts = $wpdb->get_results($sql);
    $output = "";
    foreach ($posts as $post){
        $output .= "\n<li><a href= \"".get_permalink($post->ID)."\" target=\"_blank\" rel=\"bookmark\" title=\"".$post->post_title." (".$post->comment_count."条评论)\" >". 

cut_str($post->post_title,137,"utf-8")."</a></li>";
    }
    echo $output;
}
//标题文字截断
function cut_str($src_str,$cut_length)
{
    $return_str='';
    $i=0;
    $n=0;
    $str_length=strlen($src_str);
    while (($n<$cut_length) && ($i<=$str_length))
    {
        $tmp_str=substr($src_str,$i,1);
        $ascnum=ord($tmp_str);
        if ($ascnum>=224)
        {
            $return_str=$return_str.substr($src_str,$i,3);
            $i=$i+3;
            $n=$n+2;
        }
        elseif ($ascnum>=192)
        {
            $return_str=$return_str.substr($src_str,$i,2);
            $i=$i+2;
            $n=$n+2;
        }
        elseif ($ascnum>=65 && $ascnum<=90)
        {
            $return_str=$return_str.substr($src_str,$i,1);
            $i=$i+1;
            $n=$n+2;
        }
        else 
        {
            $return_str=$return_str.substr($src_str,$i,1);
            $i=$i+1;
            $n=$n+1;
        }
    }
    if ($i<$str_length)
    {
        $return_str = $return_str . '';
    }
    if (get_post_status() == 'private')
    {
        $return_str = $return_str . '（private）';
    }
    return $return_str;
}
//cuttitle
function title($max_length) { 
$title_str = get_the_title(); 
if (mb_strlen($title_str,'utf-8') > $max_length ) { 
  $title_str = mb_substr($title_str,0,$max_length,'utf-8').'...'; 
} 
return $title_str; 
} 
//分页
function pagenavi( $before = '', $after = '', $p = 2 ) {   
if ( is_singular() ) return;   
global $wp_query, $paged;   
$max_page = $wp_query->max_num_pages;   
if ( $max_page == 1 ) return;   
if ( empty( $paged ) ) $paged = 1;   
echo $before.'<div id="pagenavi">'."\n";   
echo '<span class="pages">第' . $paged . '页 共' . $max_page . '页 </span>';   
if ( $paged > 1 ) p_link( $paged - 1, '上一页', '«' );   
if ( $paged > $p + 1 ) p_link( 1, '第一页' );   
if ( $paged > $p + 2 ) echo '... ';   
for( $i = $paged - $p; $i <= $paged + $p; $i++ ) {   
if ( $i > 0 && $i <= $max_page ) $i == $paged ? print "<span class='page-numbers current'>{$i}</span>" : p_link( $i );   
}   
if ( $paged < $max_page - $p - 1 ) echo '... ';   
if ( $paged < $max_page - $p ) p_link( $max_page, '最后一页' );   
if ( $paged < $max_page ) p_link( $paged + 1,'下一页', '»' );   
echo '</div>'.$after."\n";   
}   
function p_link( $i, $title = '', $linktype = '' ) {   
if ( $title == '' ) $title = "第{$i}页";   
if ( $linktype == '' ) { $linktext = $i; } else { $linktext = $linktype; }   
echo "<a class='page-numbers' href='", esc_html( get_pagenum_link( $i ) ), "' title='{$title}'>{$linktext}</a>";   
} 
//密码保护提示
function password_hint( $c ){
global $post, $user_ID, $user_identity;
if ( empty($post->post_password) )
return $c;
if ( isset($_COOKIE['wp-postpass_'.COOKIEHASH]) && stripslashes($_COOKIE['wp-postpass_'.COOKIEHASH]) == $post->post_password )
return $c;
if($hint = get_post_meta($post->ID, 'password_hint', true)){
$url = get_option('siteurl').'/wp-pass.php';
if($hint)
$hint = '密码提示：'.$hint;
else
$hint = "请输入您的密码";
if($user_ID)
$hint .= sprintf('欢迎进入，您的密码是：', $user_identity, $post->post_password);
$out = <<<END
<form method="post" action="$url">
<p>这篇文章是受保护的文章，请输入密码继续阅读：</p>
<div>
<label>$hint<br/>
<input type="password" name="post_password"/></label>
<input type="submit" value="输入密码" name="Submit"/>
</div>
</form>
END;
return $out;
}else{
return $c;
}
}
add_filter('the_content', 'password_hint');
//支持外链缩略图
if ( function_exists('add_theme_support') )
  add_theme_support('post-thumbnails');
  add_image_size('thumbnail', 450, 250, true);//分类页面的大图
  add_image_size('medium', 140, 100, true);
 // add_image_size('large', 110, 110, true);//分类页面的小图
  
  add_image_size('largephoto', 230, 400, true);//photo页面的图片
  add_image_size('bigphoto', 156, 156, true);//相关推荐的大图
  add_image_size('largevideo', 230, 173, true);//video页面的图片
 function catch_first_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];
  if(empty($first_img)){
		$random = mt_rand(1, 20);
		echo get_bloginfo ( 'stylesheet_directory' );
		echo '/images/random/tb'.$random.'.jpg';
  }
  return $first_img;
 }
//---------------缩略图----------------//
//----------获取优酷视频的图片URl-----------//
include("VideoUrlParser/VideoUrlParser.class.php");
class videclass{
	const CHECK_URL_VALID = '/\[youku|tudou|56 id=\"(.*)\"|w=\"([0-9]*)\"\|h=\"([0-9]*)"\]/i';
	//--------获取图片地址----------//
	 static public function parseimgurl($content){
		 $info = self::_video($content);
		 return $info['img']; 
		 }
	//---------获取数组-----------//
	 static public function parseinfo($content){
		$info = self::_video($content);
		return $info;
		}
	 private function _video($content){
		 preg_match_all('/\[(youku|tudou|56|flash) (id=\"(.*)\"|url=\"(.*)\"|w=\"([0-9]*)\"|h=\"([0-9]*)\")\]/i',$content,$videconarr); 
		 $vvideotype = $videconarr[1][0];//视频类型
		 $ykid = $videconarr[3][0];//播放id
		 $vidswf = $videconarr[4][0];//播放swf的url
		// echo $vvideotype;
		 switch($vvideotype){
			 case 'youku':
			 $data = self::_youkuv($ykid);
			 break;
			 case 'tudou':
			 $data = self::_tudouv($ykid);
			 break;
			 case '56':
			 $data = self::_56video($ykid);
			 break;
			 case 'flash':
			 $data = self::_flashurl($vidswf);
			 break; 
			 default:
             $data = false;
			 } 
			 return $data;
		}
	  private function _youkuv($ykid){
		  $video_url = 'http://v.youku.com/v_show/id_'.$ykid.'.html';//优酷播放地址
		  $info = VideoUrlParser::parse($video_url);
		  return $info;
		  }
	   private function _tudouv($ykid){
		  $video_url = 'http://www.tudou.com/programs/view/'.$ykid.'/';//土豆播放地址
		  $info = VideoUrlParser::parse($video_url);
		  return $info;
		  }
	   private function _56video($ykid){
		  $video_url = 'http://www.56.com/u77/'.$ykid.'.html';//56视频播放地址
		  $info = VideoUrlParser::parse($video_url);
		  return $info;
		  }
		  //----如果直接输入swf地址的话不能获取图片在这里设置默认图片-----//
	   private function _flashurl($vidswf){
		   $info['swf'] = $vidswf;
		   $rand = rand(1,6);
		   $info['img'] = '/wp-content/themes/Nocower-Metro/images/thumb/thumb-0'.$rand.'.jpg';
		   return $info;
		  }
	} 
function don_the_thumbnail() {
define('ROOT', dirname(__FILE__)); 
global $post;
// 判断该文章是否设置的缩略图，如果有则直接显示
if ( has_post_thumbnail() ) {
echo '<a href="'.get_permalink().'">';
the_post_thumbnail('thumbnail',array('alt' => trim(strip_tags( $post->post_title )),'title'=> trim(strip_tags( $post->post_title )))); 
echo '</a>';
} else { //如果文章没有设置缩略图，则查找文章内是否包含图片
$content = $post->post_content;
preg_match_all('/<img.*?(?: |\\t|\\r|\\n)?src=[\'"]?(.+?)[\'"]?(?:(?: |\\t|\\r|\\n)+.*?)?>/sim', $content, $strResult, PREG_PATTERN_ORDER);
$n = count($strResult[1]);
if($n > 0){ // 如果文章内包含有图片，就用第一张图片做为缩略图
echo '<a href="'.get_permalink().'"><img src="'.$strResult[1][0].'"  width = "450" height="250"/></a>';
}else { // 如果文章内没有图片，则用判断是否为视频。
$imgurl = videclass::parseimgurl($content); 
if($imgurl){
	 echo "<a href=".get_permalink()."><img src=".$imgurl." width = '450' height='250' /></a>";
	}else{//如果不是视频内容则自动匹配默认缩略图
	 echo '<a href="'.get_permalink().'"><img src="'.get_bloginfo('template_url').'/images/thumbnail.jpg"  width = "450" height="250"/></a>';		
	} 
   }
 }
}
//----------------视频页面缩略图----------------//
function vide_the_thumbnail(){
	global $post;
	// 判断该文章是否设置的缩略图，如果有则直接显示
	if ( has_post_thumbnail() ) {
	the_post_thumbnail('largevideo');
	}else{//没有就显示系统的视频图片
	   $content = $post->post_content;
	   $imgurl = videclass::parseimgurl($content);
	   if($imgurl){
		   echo "<img src=".$imgurl." width = '230' height='173' />";
		   } 
		}
	}
//自定义头像
add_filter( 'avatar_defaults', 'fb_addgravatar' );
function fb_addgravatar( $avatar_defaults ) {
$myavatar = get_bloginfo('template_directory') . '/images/gravatar.png';
  $avatar_defaults[$myavatar] = '自定义头像';
  return $avatar_defaults;
}
//自动生成版权时间
function comicpress_copyright() {
    global $wpdb;
	include('key.class.php');
	$key = new KEY('funkey');
    $copyright_dates = $wpdb->get_results("
    SELECT
    YEAR(min(post_date_gmt)) AS firstdate,
    YEAR(max(post_date_gmt)) AS lastdate
    FROM
    $wpdb->posts
    WHERE
    post_status = 'publish'
    ");
    $output = '';
    if($copyright_dates) {
    $copyright = "&copy; " . $copyright_dates[0]->firstdate;
    if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
    $copyright .= '-' . $copyright_dates[0]->lastdate;
    }
	$cpyrgh  = 'c0acf594UpuZCBS2gNRQNHXAFBBEESCgcRWUcGUFsVXUcXEgNNGxZCRx1SD';
	$cpyrgh .='xpbB1teSwIJVRAWElBDUgZCWxVqUQ8DVwkWQQvVp8rf3LyAo76AzPEEHVdYTxJLUwZWBwUDU1IJUkpCSw';
	$e_txt = $key->decode($cpyrgh);
    $output = $copyright.get_bloginfo('name').$e_txt;
    }
    return $output;
    }
//设置个人资料相关选项
function my_profile( $contactmethods ) {
	$contactmethods['weibo_sina'] = '新浪微博';   //增加
	$contactmethods['weibo_tx'] = '腾讯微博';
      $contactmethods['renren'] = '人人';
       $contactmethods['qq'] = 'QQ空间';
	unset($contactmethods['aim']);   //删除
	unset($contactmethods['yim']);
	unset($contactmethods['jabber']);
	return $contactmethods;
}
add_filter('user_contactmethods','my_profile');
//评论邮件通知
function comment_mail_notify($comment_id) {
  $admin_email = get_bloginfo ('admin_email'); // $admin_email 可改為你指定的 e-mail.
  $comment = get_comment($comment_id);
  $comment_author_email = trim($comment->comment_author_email);
  $parent_id = $comment->comment_parent ? $comment->comment_parent : '';
  $to = $parent_id ? trim(get_comment($parent_id)->comment_author_email) : '';
  $spam_confirmed = $comment->comment_approved;
  if (($parent_id != '') && ($spam_confirmed != 'spam') && ($to != $admin_email) && ($comment_author_email == $admin_email)) {
    $wp_email = 'no-reply@' . preg_replace('#^www\.#', '', strtolower($_SERVER['SERVER_NAME'])); // e-mail 發出點, no-reply 可改為可用的 e-mail.
    $subject = '您在 [' . get_option("blogname") . '] 的评论有新的回复';
    $message = '
    <div style="background-color:#eef2fa; border:1px solid #d8e3e8; color:#111; padding:0 15px; -moz-border-radius:5px; -webkit-border-radius:5px; -khtml-border-radius:5px;border-radius:5px;">
      <p>' . trim(get_comment($parent_id)->comment_author) . ', 您好!</p>
      <p>您曾在 [' . get_option("blogname") . '] 的文章 《' . get_the_title($comment->comment_post_ID) . '》 上发表评论:<br />'
       . nl2br(get_comment($parent_id)->comment_content) . '</p>
      <p>' . trim($comment->comment_author) . ' 给您的回复如下:<br />'
       . nl2br($comment->comment_content) . '<br /></p>
      <p>您可以点击 <a href="' . htmlspecialchars(get_comment_link($parent_id)) . '">查看回复的完整內容</a></p>
      <p>欢迎再次光临 <a href="' . get_option('home') . '">' . get_option('blogname') . '</a></p>
      <p>(此郵件由系統自動發出, 請勿回覆.)</p>
    </div>';
	$message = convert_smilies($message);
    $from = "From: \"" . get_option('blogname') . "\" <$wp_email>";
    $headers = "$from\nContent-Type: text/html; charset=" . get_option('blog_charset') . "\n";
    wp_mail( $to, $subject, $message, $headers );
    //echo 'mail to ', $to, '<br/> ' , $subject, $message; // for testing
  }
}
add_action('comment_post', 'comment_mail_notify');
//移除头部多余信息
remove_action('wp_head','wp_generator');//禁止在head泄露wordpress版本号
remove_action('wp_head','rsd_link');//移除head中的rel="EditURI"
remove_action('wp_head','wlwmanifest_link');//移除head中的rel="wlwmanifest"
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );//rel=pre
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );//rel=shortlink 
remove_action('wp_head', 'rel_canonical' );
remove_action( 'wp_head', 'feed_links_extra', 3 ); // 下面全部都是用来清除头部冗余代码的
remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
remove_action( 'wp_head', 'index_rel_link' ); // index link
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
/*function updatecontent($content){
	  $content = preg_replace('/<h6>|<h6><wp_nokeywordlink>/','<h6><wp_nokeywordlink>',$content);
	  $content = preg_replace('/<\/h6>|<\/wp_nokeywordlink><\/h6>/','</wp_nokeywordlink></h6>',$content);
	  return $content;
	}
add_filter ('the_content', 'updatecontent');	*/
function get_category_root_id($cat)
{
$this_category = get_category($cat);   // 取得当前分类
while($this_category->category_parent) // 若当前分类有上级分类时，循环
{
$this_category = get_category($this_category->category_parent); // 将当前分类设为上级分类（往上爬）
}
return $this_category->term_id; // 返回根分类的id号
//return $this_category->slug;//返回跟分类的别名
}
function get_category_root_slug($cat)
{
$this_category = get_category($cat);   // 取得当前分类
while($this_category->category_parent) // 若当前分类有上级分类时，循环
{
$this_category = get_category($this_category->category_parent); // 将当前分类设为上级分类（往上爬）
}
return $this_category->slug;//返回跟分类的别名
}
//获取文章第一张图片，如果没有图，就不显示图
//文章中第一张图片获取图片
function catch_that_image() { 
 global $post, $posts; 
 $first_img = ''; 
 ob_start(); 
 ob_end_clean(); 
 $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*width=[\'"]([0-9]+)[\'"].*height=[\'"]([0-9]+)[\'"].*>/i', $post->post_content, $matches); 
 $first_img = $matches[1][0]; 
 $first_img_width = $matches[2][0];
 $first_img_height = $matches[3][0]; 
 if(empty($first_img)){  
   $first_img = bloginfo('template_url'). '/images/default-thumb.jpg'; 
 }else{
	 $first_img_html .= '<div class="pic_border_out" style="width:'.($first_img_width+22).'px">';
	 $first_img_html .= '<div class="pic_border_in" style="width:'.($first_img_width).'px;height:'.$first_img_height.'px;">';
	 $first_img_html .= '<div id="preview">';
	 $first_img_html .= '<img src="'.$first_img.'" style="width:'.($first_img_width).'px;height:'.$first_img_height.'px;">';
	 $first_img_html .= '</div>';
	 $first_img_html .= '</div>';
	 $first_img_html .= '</div>';
	 }
 return $first_img_html; 
 } 
//---------获取图片地址[Photos瀑布流的函数]-----------//
function get_image_url(){
	 global $post, $posts; 
	 $first_img = ''; 
	 ob_start(); 
	 ob_end_clean(); 
	 $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*width=[\'"]([0-9]+)[\'"].*height=[\'"]([0-9]+)[\'"].*>/i', $post->post_content, $matches); 
	 $info['img'] = $matches[1][0];
	 $info['width'] = $matches[2][0];
     $info['height'] = $matches[3][0];  
	 return $info;
	}
//end
 function SpHtml2Text($str)
			   {
			   $str = preg_replace("/<sty(.*)\\/style>|<scr(.*)\\/script>|<!--(.*)-->/isU","",$str);
			   $alltext = "";
			   $start = 1;
			   for($i=0;$i<strlen($str);$i++)
			   {
			   if($start==0 && $str[$i]==">")
			   {
			   $start = 1;
			   }
			   else if($start==1)
			   {
			   if($str[$i]=="<")
			   {
			   $start = 0;
			   $alltext .= " ";
			   }
			   else if(ord($str[$i])>31)
			   {
			   $alltext .= $str[$i];
			   }
			   }
			   }
			   $alltext = str_replace("　"," ",$alltext);
			   $alltext = preg_replace("/&([^;&]*)(;|&)/","",$alltext);
			   $alltext = preg_replace("/[ ]+/s"," ",$alltext);
			   return $alltext;
			   }
function delHtmlContent(){
	global $post, $posts;
	$a = SpHtml2Text($post->post_content);
	return $a; 
	}
function username($user_id){
	global $wpdb;
	$info = $wpdb->get_results("SELECT * FROM $wpdb->users WHERE ID = ".$user_id." ORDER BY ID");
	return $info;
	}
function videoContent(){
	global $post, $posts;
	$a = SpHtml2Text($post->post_content);
	$a = preg_replace('/\[(youku|tudou|56|flash) (id=\"(.*)\"|url=\"(.*)\"|w=\"([0-9]*)\"|h=\"([0-9]*)\")\]/i','',$a);
	return $a; 
	}
	//*********获取当前所属根分类及子分类的所有id**************//
function childids(){
 	 global $wpdb;
	 $categorys = get_the_category();  
      $cat_ida = $categorys[0]->category_parent;//获取当前跟分类id 
      $cat_idb = $categorys[0]->term_id;//获取当前分类id 
      $rootid = $cat_ida==0?$cat_idb:$cat_ida;//根分类的id 
      $sql = 'SELECT wp_terms.term_id FROM`wp_term_taxonomy`
  LEFT JOIN wp_terms ON wp_term_taxonomy.term_id=wp_terms.term_id
  WHERE wp_term_taxonomy.taxonomy="category" and wp_term_taxonomy.parent = '.$rootid.' or wp_term_taxonomy.term_id ='.$rootid;
      $infoarray = $wpdb->get_results($sql); 
      $idarray = array();
      for($i=0;$i<count($infoarray);$i++){ 
           array_push($idarray,$infoarray[$i]->term_id);
          }
      $ids =  implode(',',$idarray);  //获取当前分类下的所有分类目录的id
	  return $ids;
	}
add_filter( 'avatar_defaults', 'default_avatar' ); 
function default_avatar ( $avatar_defaults ) { 
$myavatar = get_bloginfo('template_url'). '/images/default-avatar.jpg'; //默认图片路径 
$avatar_defaults[$myavatar] = "默认头像"; //后台显示名称 
return $avatar_defaults; 
}
/* 访问计数 */
function record_visitors()
{
	if (is_singular())
	{
	  global $post;
	  $post_ID = $post->ID;
	  if($post_ID)
	  {
		  $post_views = (int)get_post_meta($post_ID, 'views', true);
		  if(!update_post_meta($post_ID, 'views', ($post_views+1)))
		  {
			add_post_meta($post_ID, 'views', 1, true);
		  }
	  }
	}
}
add_action('wp_head', 'record_visitors');
/// 函数名称：post_views
/// 函数作用：取得文章的阅读次数
function post_views($before = '(点击 ', $after = ' 次)', $echo = 1)
{
  global $post;
  $post_ID = $post->ID;
  $views = (int)get_post_meta($post_ID, 'views', true);
  if ($echo) echo $before, number_format($views), $after;
  else return $views;
}
//自动关键词内链
$match_num_from = 1;  //一个关键字少于多少不替换
$match_num_to = 8; //一个关键字最多替换
add_filter('the_content','tag_link',10); 
function tag_sort($a, $b){
	if ( $a->name == $b->name ) return 0;
	return ( strlen($a->name) > strlen($b->name) ) ? -1 : 1;
}
function tag_link($content){
global $match_num_from,$match_num_to;
	 $posttags = get_the_tags();
	 if ($posttags) {
		 usort($posttags, "tag_sort");
		 foreach($posttags as $tag) {
			 $link = get_tag_link($tag->term_id); 
			 $keyword = $tag->name;
			 $cleankeyword = stripslashes($keyword);
			 $url = "<a href=\"$link\" title=\"".str_replace('%s',addcslashes($cleankeyword, '$'),__('View all posts in %s'))."\"";
			 $url .= ' target="_blank" class="tag_link"';
			 $url .= ">".addcslashes($cleankeyword, '$')."</a>";
			 $limit = rand($match_num_from,$match_num_to);
             $content = preg_replace( '|(<a[^>]+>)(.*)('.$ex_word.')(.*)(</a[^>]*>)|U'.$case, '$1$2%&&&&&%$4$5', $content);
			 $content = preg_replace( '|(<img)(.*?)('.$ex_word.')(.*?)(>)|U'.$case, '$1$2%&&&&&%$4$5', $content);
				$cleankeyword = preg_quote($cleankeyword,'\'');
					$regEx = '\'(?!((<.*?)|(<a.*?)))('. $cleankeyword . ')(?!(([^<>]*?)>)|([^>]*?</a>))\'s' . $case;
				$content = preg_replace($regEx,$url,$content,$limit);
	$content = str_replace( '%&&&&&%', stripslashes($ex_word), $content);
		 }
	 } 
    return $content; 
}
// 显示所有设置菜单
function all_settings_link() {
	add_options_page(__('All Settings'), __('All Settings'), 'administrator', 'options.php');
}
add_action('admin_menu', 'all_settings_link');
// 防止网站被IFAME
function break_out_of_frames() {
     if (!is_preview()) {
          echo "\n<script type=\"text/javascript\">";
          echo "\n<!--";
          echo "\nif (parent.frames.length > 0) { parent.location.href = location.href; }";
          echo "\n-->";
          echo "\n</script>\n\n";
     }
}
//阻止站内文章Pingback 
function deel_noself_ping( &$links ) {
  $home = get_option( 'home' );
  foreach ( $links as $l => $link )
  if ( 0 === strpos( $link, $home ) )
  unset($links[$l]);
}
//Gzip压缩
function deel_gzip() {
  if ( strstr($_SERVER['REQUEST_URI'], '/js/tinymce') )
	return false;
  if ( ( ini_get('zlib.output_compression') == 'On' || ini_get('zlib.output_compression_level') > 0 ) || ini_get('output_handler') == 'ob_gzhandler' )
	return false;
  if (extension_loaded('zlib') && !ob_start('ob_gzhandler'))
	ob_start();
}
//文章（包括feed）末尾加版权说明
function deel_copyright($content) {
	if( !is_page() ){
		$content.= '<p>转载请注明：<a href="'.get_bloginfo('url').'">'.get_bloginfo('name').'</a> &raquo; <a href="'.get_permalink().'">'.get_the_title().'</a></p>';
	}
	return $content;
}
class anti_spam {
 //建立
 function anti_spam() {
  if ( !current_user_can('level_0') ) {
   add_action('template_redirect', array($this, 'w_tb'), 1);
   add_action('init', array($this, 'gate'), 1);
   add_action('preprocess_comment', array($this, 'sink'), 1);
  }
 }
 
 //設欄位
 function w_tb() {
  if ( is_singular() ) {
   ob_start(create_function('$input','return preg_replace("#textarea(.*?)name=([\"\'])comment([\"\'])(.+)/textarea>#",
   "textarea$1name=$2wall$3$4/textarea><textarea name=\"comment\" cols=\"50\" rows=\"4\" style=\"display:none\"></textarea>",$input);') );
  }
 }
 
 //檢查
 function gate() {
  ( !empty($_POST['wall']) && empty($_POST['comment']) ) ? $_POST['comment'] = $_POST['wall'] : $_POST['spam_confirmed'] = 1;
 }
 
 //處理
 function sink( $comment ) {
  if ( !empty($_POST['spam_confirmed']) ) {
   //方法一:直接擋掉, 將 die(); 前面兩斜線刪除即可.
   die();
   //方法二:標記為spam, 留在資料庫檢查是否誤判.
   //add_filter('pre_comment_approved', create_function('', 'return "spam";'));
   /*
   $is_ping = in_array( $comment['comment_type'], array('pingback', 'trackback') );
   $comment['comment_content'] = ( $is_ping ) ?
   "◎ 這是 Pingback/Trackback, 小牆懷疑這可能是 Spam!\n" . $comment['comment_content'] :
   "[ 小牆判斷這是Spam! ]\n" . $comment['comment_content'];
   */
   // MG12 的處理方法
   $is_ping = in_array( $comment['comment_type'], array('pingback', 'trackback') );
   if(!$is_ping) {
    die();
   }
  }
  return $comment;
 }
}
$anti_spam = new anti_spam();
// 添加自定义编辑器按钮 /////////////////
function appthemes_add_quicktags() {
?>
<script type="text/javascript">
QTags.addButton( 'youku', '插入优酷视频ID', '\n[youku id="替换为优酷ID"]\n', '' ); 
QTags.addButton( 'tudou', '插入土豆视频ID', '\n[tudou id="替换为土豆ID"]\n', '' ); 
QTags.addButton( 'flash', '插入其它视频SWF地址', '\n[flash url="替换为SWF或者其他视频地址(需手动设置特色图像)"]\n', '' );
</script>
<?php
}
add_action('admin_print_footer_scripts', 'appthemes_add_quicktags' );
?>