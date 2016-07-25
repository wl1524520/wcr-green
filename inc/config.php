<?php

/*
 * 联系信息
 */
$wcr_config = array(
    "wcr_qq"            =>  '630260637',

    "wcr_weibo_url"     =>  'http://weibo.com/archer1988',
    "wcr_weibo_title"   =>  '戊辰人的微博',

    "wcr_facebook_url"  =>  'https://www.facebook.com/wanglu.china',
    "wcr_facebook_title"=>  '王路的Facebook',

    "wcr_weixin_img"    =>  'images/weixin.png',
    "wcr_weixin_title"  =>  '扫描关注戊辰人的微信',

    "wcr_404_img"       =>  'images/404.png',
);

function wcr_pub_notice() {
    $notice = "<b>欢迎来到戊辰人博客</b><br>";
    $notice .= "戊辰人博客是一个关注互联网动态和分享IT技术知识的个人网站，作者王路，网名戊辰人，";
    $notice .= "如发现有侵犯您版权的内容，请通过网站下方联系方式与我联系。";
    return $notice;
}
