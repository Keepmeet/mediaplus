<?php  
/*
Plugin Name: MediaPlus
Plugin URI: http://www.xxxx.com/plugins/
Description: 一个简单且具有前台发布视频功能的插件
Version: 1.0.0
Author: Rovun
Author URI: http://www.xxxx.com/
License: GPL
*/

//定义模板文件路径前缀，这里使用插件根目录
define('MP_PLUGIN_DIR', plugin_dir_path(__FILE__));

//要引入的外部模板列表
$templates_new = array(
    "video.php"=>"Short Video"
);

function mp_register_page(){

    add_filter('theme_page_templates', 'mp_add_template');
    add_filter('template_include', 'mp_view_template');
}

function mp_add_template( $posts_templates ) {
    global  $templates_new;
    $posts_templates = array_merge( $posts_templates,$templates_new );
    return $posts_templates;
}

function mp_view_template( $template ) {
    global $post;
    global  $templates_new;
    if ( !isset( $post ) ) return $template;
    //拿到页面模板名称
    $t_template_name = get_post_meta( $post->ID, '_wp_page_template', true );
    //页面模板不在自定义列表中，直接返回
    if ( ! isset( $templates_new[ $t_template_name ] ) ) {
        return $template;
    }
    //拼接模板正确路径
    //假设模板存放于 本插件目录/page/ 下
    $file = MP_PLUGIN_DIR . 'page/' . $t_template_name;
    //(MediaPlus)
    if( file_exists( $file ) ) {
        return $file;
    }
    return $template;
}

add_action( "plugins_loaded", "mp_register_page");

?> 