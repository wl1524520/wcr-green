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
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
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
    <div class="home-title">
        <div class="container">
            <p class="wp-slogan">青，取之于蓝而青于蓝；冰，水为之而寒于水。</p>
        </div>
    </div>
    <?php //endif; ?>

    <div class="container">
        <div class="nav-bread">
            <?php if (function_exists('dimox_breadcrumbs')) {dimox_breadcrumbs();} ?>
        </div>
    </div>
