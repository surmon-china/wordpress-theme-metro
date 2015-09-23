<?php
/**
 * Template Name: 投稿
 */
 
if( isset($_POST['tougao_form']) && $_POST['tougao_form'] == 'send')
{
    global $wpdb;
    $last_post = $wpdb->get_var("SELECT post_date FROM $wpdb->posts WHERE post_type = 'post' ORDER BY post_date DESC LIMIT 1");
 
    // 博客当前最新文章发布时间与要投稿的文章至少间隔120秒。
    // 可自行修改时间间隔，修改下面代码中的120即可
    // 相比Cookie来验证两次投稿的时间差，读数据库的方式更加安全
    if ( current_time('timestamp') - strtotime($last_post) < 120 )
    {
        wp_die('您投稿也太勤快了吧，先歇会儿！');
    }
 
    // 表单变量初始化
    $name = isset( $_POST['tougao_authorname'] ) ? trim(htmlspecialchars($_POST['tougao_authorname'], ENT_QUOTES)) : '';
    $email =  isset( $_POST['tougao_authoremail'] ) ? trim(htmlspecialchars($_POST['tougao_authoremail'], ENT_QUOTES)) : '';
    $blog =  isset( $_POST['tougao_authorblog'] ) ? trim(htmlspecialchars($_POST['tougao_authorblog'], ENT_QUOTES)) : '';
    $title =  isset( $_POST['tougao_title'] ) ? trim(htmlspecialchars($_POST['tougao_title'], ENT_QUOTES)) : '';
    $category =  isset( $_POST['cat'] ) ? (int)$_POST['cat'] : 0;
    $content =  isset( $_POST['tougao_content'] ) ? trim(htmlspecialchars($_POST['tougao_content'], ENT_QUOTES)) : '';
    $tags = isset( $_POST['tougao_tags'] ) ? $_POST['tougao_tags'] : '';
    // 表单项数据验证
    if ( empty($name) || mb_strlen($name) > 20 )
    {
        wp_die('作者名称必须填写，且长度不得超过20字');
    }
 
    if ( empty($email) || strlen($email) > 60 || !preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email))
    {
        wp_die('Email必须填写，且长度不得超过60字，必须符合Email格式');
    }
 
    if ( empty($title) || mb_strlen($title) > 40 )
    {
        wp_die('标题必须填写，且长度不得超过40字');
    }
 
    if ( empty($content) || mb_strlen($content) > 9000 || mb_strlen($content) < 100)
    {
        wp_die('内容必须填写，且长度不得超过9000字，不得少于100字');
    }
 
    $post_content = '昵称: '.$name.'<br />Email: '.$email.'<br />blog: '.$blog.'<br />内容:<br />'.$content;
 
    $tougao = array(
        'post_title' => $title,
        'post_content' => $post_content,
        'tags_input' => $tags,
        'post_category' => array($category)
    );
 
 
    // 将文章插入数据库
    $status = wp_insert_post( $tougao );
 
    if ($status != 0) 
    { 
        // 投稿成功给博主发送邮件
        // somebody#example.com替换博主邮箱
        // My subject替换为邮件标题，content替换为邮件内容
         wp_mail("somebody#example.com","My subject","content");
        wp_die('投稿成功！您的文章将在审核通过后发布！','投稿成功！');
    }
    else
    {
        wp_die('投稿失败！');
    }
} get_header(); ?>
<style>
#wp-tougao_content-editor-tools,.wp-editor-tools hide-if-no-js{display: none;}
.shuru{text-align: left;
height: 40px;
line-height: 40px;
font-size: 14px;
margin-bottom: 10px;}
#tougao-cat,.postform{border: 1px solid #eee;
font-family: 微软雅黑;
height: 27px;}
.shuru a{font-size: 12px;
color: #BBB;}
.wp-editor-wrap{border: 1px solid #eee;}
</style>
<div id="roll"><div title="回到顶部" id="roll_top"></div><div title="查看评论" id="ct"></div><div title="转到底部" id="fall"></div></div>
<div id="content">
<!-- 关于表单样式，请自行调整-->
<form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>" style=" border: 1px solid #eeeeee; padding: 15px; margin-top: 5px; ">
    <div class="shuru">
        <label for="tougao_title">文章标题：</label>
<input type="text" size="40" value="" id="tougao_title" name="tougao_title" style=" border: 1px solid #eeeeee; height: 27px; padding-left: 3px; font-family: 微软雅黑;width: 50%; " /><a>&nbsp;*&nbsp;必须填写，标题字数不可超过40字</a></div>
<div class="shuru">
        <label for="tougao_authorname">作者名称：</label>
<input type="text" size="40" value="" id="tougao_authorname" name="tougao_authorname" style=" border: 1px solid #eeeeee; height: 27px; padding-left: 3px; font-family: 微软雅黑; width: 50%;" /><a>&nbsp;*&nbsp;可选填写，可以使用化名也可真名</a></div>
<div class="shuru">
        <label for="tougao_authorblog">博客地址：</label>
        <input type="text" size="40" value="" id="tougao_authorblog" name="tougao_authorblog" style=" border: 1px solid #eeeeee; height: 27px; padding-left: 3px; font-family: 微软雅黑;width: 50%; " /><a>&nbsp;*&nbsp;博客地址，可以填写微博或者网址</a></div>
<div class="shuru">
         <label for="tougao_authoremail">你的邮箱：</label>
<input type="text" size="40" value="" id="tougao_authoremail" name="tougao_authoremail" style=" border: 1px solid #eeeeee; height: 27px; padding-left: 3px; font-family: 微软雅黑;width: 50%; " /><a>&nbsp;*&nbsp;必须填写，务必填写真实有效邮箱</a>
    </div>
<div class="shuru">
<label>文章标签：</label>
<input type="text" size="40" value="" name="tougao_tags" style=" border: 1px solid #eeeeee; height: 27px; padding-left: 3px; font-family: 微软雅黑;width: 50%; "/><a>&nbsp;*&nbsp;多个文章标签用半角逗号“,”隔开</a>
</div>
<div class="shuru">
<label for="tougaocategorg">文章分类：</label>
<?php wp_dropdown_categories('show_option_none=请选择文章分类&id=tougao-cat&show_count=1&hierarchical=1&hide_empty=0'); ?>

<embed title="每日一首好心情~" style=" background-color: #eee; width: 294px; border: 3px solid #eeeeee;margin-bottom: 3px; margin-right: -3px;" align=center src=http://swf123.sinaapp.com/dewplayer.swf?mp3=http://sc.111ttt.com/up/mp3/133296/4FA6A9769BDD4515DBCB4FC9ABB183B7.mp3&autostart=1&autoreplay=1&volume=30  width=240 height=20 type=application/x-shockwave-flash wmode='transparent' quality='high' ;><param name='wmode' value='transparent'></embed>

<a>&nbsp;*&nbsp;必须选择，选择最相近的文章分类</a></div>

      <div class="shuru2" style=" margin-top: 15px; ">
<?php wp_editor( '', tougao_content, $settings = array(
        'quicktags'=> 0,
        //WP默认按钮有strong,em,link,block,del,ins,img,ul,ol,li,code,more,spell,close 请自行选择
        'quicktags'=> array('buttons' => 'strong,em,link,del,img,ul,ol,li,code,spell,close',),
        'tinymce'=>1,
        'media_buttons'=>0,
        'textarea_rows'=>20,
        'editor_class'=>"tougao_content"
) ); ?></div>
    <div style="font-family: 微软雅黑;
height: 50px;
margin-top: 10px;
background-color: #eee;">
        <input type="hidden" value="send" name="tougao_form" />
        <input type="submit" value="提交" style=" background-color: #009ad9; cursor: pointer;font-family: 微软雅黑; color: #ffffff; height: 50px; line-height: 50px; width: 70%; font-size: 16px; float: left;margin-right: 1px;" />
        <input type="reset" value="重填" style="cursor: pointer; width: 29.8%; height: 50px; background-color: #72B332; font-family: 微软雅黑; color: #fff; font-size: 16px; "/></div>
</form>
</div>
<?php get_footer(); ?>