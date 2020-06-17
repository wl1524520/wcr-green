<?php
/*
 * 戊辰人博客header模板
 * style="filter:grayscale(1)"
 */
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">

    <!-- 奔跑吧，国产浏览器 -->
    <meta name="renderer" content="webkit">

    <!-- 百度工具 -->
    <meta name="baidu-site-verification" content="7j7FIKv351" />

    <!-- Bootstrap -->
    <link href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <?php wp_head(); ?>
</head>
<body>
    <nav id="header" class="navbar navbar-default navbar-fixed-top navbar-static-top">
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
            <div class="collapse navbar-collapse" id="wcr-nav-menu">
                <?php wpjam_nav_menu(); ?>
                <form class="navbar-form navbar-right" action="<?php echo home_url( "/" ); ?>" method="GET">
                    <div class="form-group">
                        <input name="s" type="text" class="form-control" placeholder="机智的人善用搜索">
                    </div>
                    <button type="submit" class="btn btn-default">搜索</button>
                </form>
            </div>
        </div><!-- /.container-fluid -->
    </nav>

    <div id="body-content">
    <div class="home-title">
        <p class="wp-slogan">青，取之于蓝而青于蓝；冰，水为之而寒于水。</p>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="content">
                <div class="nav-bread">
                    <?php if (function_exists('dimox_breadcrumbs')) {dimox_breadcrumbs();} ?>
                </div>
                <hr class="header-hr" />
