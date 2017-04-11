<?php
/*
 * 戊辰人博客header模板
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">

    <!-- 奔跑吧，国产浏览器 -->
    <meta name="renderer" content="webkit">

    <!-- 百度工具 -->
    <meta name="baidu-site-verification" content="7j7FIKv351" />

    <!-- Bootstrap -->
    <link href="<?php echo esc_url(get_template_directory_uri() . '/statics/bootstrap-3.3.5/css/bootstrap.min.css'); ?>" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="<?php echo esc_url(get_template_directory_uri() . '/statics/html5shiv.min.js'); ?>"></script>
        <script src="<?php echo esc_url(get_template_directory_uri() . '/statics/respond.min.js'); ?>"></script>
    <![endif]-->

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="wrapper">
    <header id="header">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#wcr-nav-menu">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                        <img width="120" height="50" alt="<?php bloginfo('name'); ?>" src="<?php echo esc_url(get_template_directory_uri() . '/images/logo.png'); ?>" />
                    </a>
                </div>
                <?php wcr_nav_menu(); ?>
            </div><!-- /.container-fluid -->
        </nav>
    </header>

    <?php //if ( is_home() || is_front_page() ) : ?>
    <?php 
        if(function_exists('hello_wanglu')) {
            // hello-wanglu 插件
            // 插件地址：https://github.com/wl1524520/hello-wanglu.git
            $hello = hello_wanglu();
        } else {
            $hello = '不记初心，方得始终。';
        }
        $hello = '累了就休息一下，但千万不要放弃！';
    ?>
    <div class="home-title">
        <div class="container">
            <h1 class="wp-caption"><?php bloginfo('name'); ?></h1>
            <p class="wp-slogan"><?php echo $hello; ?></p>
        </div>
    </div>
    <?php //endif; ?>

    <div class="container">
        <div class="nav-bread">
            <?php if (function_exists('dimox_breadcrumbs')) {dimox_breadcrumbs();} ?>
        </div>
    </div>
