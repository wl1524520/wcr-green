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
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <!-- 奔跑吧，国产浏览器 -->
    <meta name="renderer" content="webkit">

    <!-- 百度工具 -->
    <meta name="baidu-site-verification" content="7j7FIKv351" />

    <!-- Bootstrap -->
    <link href="<?php echo esc_url(get_template_directory_uri() . '/statics/bootstrap-3.3.5/css/bootstrap.min.css'); ?>" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="//cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link href="<?php echo esc_url(get_template_directory_uri() . '/statics/font-awesome-4.6.1/css/font-awesome.min.css'); ?>" rel="stylesheet" />

    <!-- lightbox -->
    <link href="<?php echo esc_url(get_template_directory_uri() . '/js/lightbox/lightbox.css'); ?>" rel="stylesheet" />

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- Google Analytics Begin-->
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-64643428-1', 'auto');
    ga('send', 'pageview');
</script>
<!-- Google Analytics End-->

<div id="wrapper">
    <header id="header">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
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

    <?php if ( is_home() || is_front_page() ) : ?>
    <?php $hello = hello_wanglu(); ?>
    <div class="home-title">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <h3><?php bloginfo('name'); ?></h3>
                    <p class="desktop"><?php bloginfo('description'); ?></p>
                    <p class="mobile"><?php echo $hello; ?></p>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="media">
                        <div class="media-left">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/avatar_64x64.png'); ?>" alt="<?php bloginfo('name'); ?>" class="img-circle">
                        </div>
                        <div class="media-body">
                            <p id='hello-wanglu'>
                                <b>欢迎来到戊辰人博客</b><br>
                                <?php echo $hello; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <div class="main-container">
        <div class="container">
            <div class="nav-bread">
                <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
            </div>
        </div>
