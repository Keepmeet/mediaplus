<?php
/**
 *
 */
if( isset($_POST['tougao_form']) && $_POST['tougao_form'] == 'send') {
    global $wpdb;
    $current_url = ''.esc_url( home_url( '/' ) ).'type';   // 注意修改此处的链接地址
    $last_post = $wpdb->get_var("SELECT `post_date` FROM `$wpdb->posts` ORDER BY `post_date` DESC LIMIT 1");
    // 博客当前最新文章发布时间与要投稿的文章至少间隔30秒。
    // 可自行修改时间间隔，修改下面代码中的30即可
    // 相比Cookie来验证两次投稿的时间差，读数据库的方式更加安全
    if ( (date_i18n('U') - strtotime($last_post)) < 30 ) {
        wp_die('You post too fast,take a break!<a href="'.$current_url.'">Click here to return</a>');
    }
       
    // 表单变量初始化
    $title =  isset( $_POST['tougao_title'] ) ? trim(htmlspecialchars($_POST['tougao_title'], ENT_QUOTES)) : '';
    $category =  isset( $_POST['cat'] ) ? (int)$_POST['cat'] : 0;
	$tags =  isset( $_POST['tougao_tags'] ) ? trim(htmlspecialchars($_POST['tougao_tags'], ENT_QUOTES)) : '';
    $img =  isset( $_POST['tougao_img'] ) ? trim(htmlspecialchars($_POST['tougao_img'], ENT_QUOTES)) : '';
	$link =  isset( $_POST['tougao_link'] ) ? trim(htmlspecialchars($_POST['tougao_link'], ENT_QUOTES)) : '';
    $content =  isset( $_POST['tougao_content'] ) ? trim($_POST['tougao_content']) : '';
    $content = str_ireplace('?>', '?&gt;', $content);
    $content = str_ireplace('<?', '&lt;?', $content);
    $content = str_ireplace('<script', '&lt;script', $content);
    $content = str_ireplace('<a ', '<a rel="external nofollow" ', $content);
   
    // 表单项数据验证
	if ( empty($link) || mb_strlen($link) < 0) {
        wp_die('Must upload video:)<a href="'.$current_url.'">Click here to return</a>');
    }
	if ( empty($img) || mb_strlen($img) < 0) {
        wp_die('Must upload cover:)<a href="'.$current_url.'">Click here to return</a>');
    }
    if ( empty($content) || mb_strlen($content) > 200 || mb_strlen($content) < 0) {
        wp_die('Content must type,the length of not more than 200 words, not less than 0 word.
<a href="'.$current_url.'">Click here to return</a>');
    }
   
    $post_content = '<video src="'.$link.'" controls="controls" preload="meta" poster="'.$img.'"></video><br />'.$content.'<br />';
   
    $tougao = array(
        'post_title' => $title,
        'post_content' => $post_content, 'post_status' => 'publish',
		'tags_input' => $tags, //标签
        'post_category' => array($category) //分类
    );
    // 将文章插入数据库
    $status = wp_insert_post( $tougao );
 
    if ($status != 0) {
        // 投稿成功给博主发送邮件
        // somebody#example.com替换博主邮箱
        // My subject替换为邮件标题，content替换为邮件内容
        wp_mail("Mark#huijui.com","Post Success!","Mark single post success");
        wp_die('Post Success!<a href="'.$current_url.'">Click here to return</a>', 'Post Success');
    }
    else {
        wp_die('Post Fail!<a href="'.$current_url.'">Click here to return</a>');
    }
}
get_header(); ?>
<?php echo get_sns_css(); ?>
            <div id="primary" class="content-area">
		    <main id="main" class="site-main" role="main">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		// Post thumbnail.
		twentyfifteen_post_thumbnail();
	?>

	<div class="entry-content">
	<div style="text-align:center;padding-top:10px;"><?php require 'menu.php';?><br /><strong><?php _e( 'Short Video', 'mediaplus' ); ?></strong><small style="color:red"><?php _e( '(less than 5 minute)', 'mediaplus' ); ?></small></div>

<?php
if ( is_user_logged_in() ) {
    require 'upform.php';
} else {?>
<div style="text-align: center; padding-top: 10px;"><strong><?php _e( 'Welcome! Please', 'mediaplus' ); ?> <a href="<?php echo esc_url( home_url( '/' ) );?>wp-login.php"><?php _e( 'Login', 'mediaplus' ); ?></a> <?php _e( 'To Upload Short Video', 'mediaplus' ); ?></strong> ^_^</div><script type="text/javascript">window.location.href="<?php echo esc_url( home_url( '/' ) );?>wp-login.php";</script><?php } ?>
                        <p></p>
	</div></article>
	</main><!-- .site-main -->
	</div><!-- .content-area -->
<?php get_footer(); ?>