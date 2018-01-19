<?php
/*
Template Name: 豆瓣书单
*/
 get_header(); ?>

<?php
// 获取豆瓣数据
$userID = "163565975";   //这里修改为你的豆瓣ID (ps:并非昵称)
$url = "https://api.douban.com/v2/book/user/$userID/collections?count=100"; //最多取100条数据
$res = json_decode(file_get_contents($url), True); //读取api得到json
$res = $res['collections'];
foreach ($res as $v) {

    $book_name  = $v['book']['title'];
    $book_sub   = $v['book']['subtitle'];
    $book_img   = $v['book']['images']['medium'];
    $book_url   = $v['book']['alt'];
    $publisher  = $v['book']['publisher'];
    $pubdate    = $v['book']['pubdate'];
    $price      = $v['book']['price'];
    $raters     = $v['book']['rating']['numRaters'];
    $rating     = $v['book']['rating']['average'];

    $translator_arr = $v['book']['translator'];
    $translator = '';
    foreach ($translator_arr as $value) {
       $translator .= $value . ' '; 
    }

    $author_arr = $v['book']['author'];
    $authors = '';
    foreach ($author_arr as $value) {
       $authors .= $value . ' '; 
    }

    $book = array(
        "name"      => $book_name,
        "subtitle"  => $book_sub,
        "publisher" => $publisher,
        "pubdate"   => $pubdate,
        "authors"   => $authors,
        "translator" => $translator,
        "price"     => $price,
        "raters"    => $raters,
        "rating"    => $rating,
        "img"       => $book_img,
        "url"       => $book_url
    );

    if ($v['status'] == "read") {
        //已经读过的书
        $readlist[] = $book;
    } elseif ($v['status'] == "reading") {
        //正在读的书
        $readinglist[] = $book;
    } elseif ($v['status'] == "wish") {
        //想读的书
        $wishlist[] = $book;
    }
}

?>

<div class="container">
    <div class="row">
        <div id="primary" class="col-xs-12 col-md-12">

            <article class="singlepost">
                <div class="single-content">

                    <?php while ( have_posts() ) : the_post(); ?>
                    <h1 class="text-center"><?php the_title(); ?></h1>
                    <hr>

                    <div class="row">
                    <h3>正在读的书</h3>
                    <?php foreach($readinglist as $v):?>
                    <div class="col-xs-4">
                        <div class="media">
                          <div class="media-left">
                            <a target="_blank" href="<?php echo $v['url'];?>">
                              <img class="media-object" src="<?php echo $v['img'];?>" width="98" height="151" alt="...">
                            </a>
                          </div>
                          <div class="media-body">
                            <h4 class="media-heading"><?php echo $v['name'].'：'.$v['subtitle'];?></h4>
                            <p><?php 
                                echo '作者：'.$v['authors'].'</br>';
                                if ($v['translator'] != '') {
                                    echo '翻译：'.$v['translator'].'</br>';
                                }
                                echo '出版：'.$v['publisher'].'</br>';
                                echo '时间：'.$v['pubdate'].'</br>';
                                echo '评分：'.$v['rating'].'分 / '.$v['raters'].'人</br>';
                                echo '价格：'.$v['price'];
                            ?>
                            </p>
                          </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    </div>

                    <div class="row">
                    <h3>想读的书</h3>
                    <?php foreach($wishlist as $v):?>
                    <div class="col-xs-4">
                        <div class="media">
                          <div class="media-left">
                            <a target="_blank" href="<?php echo $v['url'];?>">
                              <img class="media-object" src="<?php echo $v['img'];?>" width="98" height="151" alt="...">
                            </a>
                          </div>
                          <div class="media-body">
                            <h4 class="media-heading"><?php echo $v['name'].'：'.$v['subtitle'];?></h4>
                            <p><?php 
                                echo '作者：'.$v['authors'].'</br>';
                                if ($v['translator'] != '') {
                                    echo '翻译：'.$v['translator'].'</br>';
                                }
                                echo '出版：'.$v['publisher'].'</br>';
                                echo '时间：'.$v['pubdate'].'</br>';
                                echo '评分：'.$v['rating'].'分 / '.$v['raters'].'人</br>';
                                echo '价格：'.$v['price'];
                            ?>
                            </p>
                          </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    </div>

                    <div class="row">
                    <h3>已经读的书</h3>
                    <?php foreach($readlist as $v):?>
                    <div class="col-xs-4">
                        <div class="media">
                          <div class="media-left">
                            <a target="_blank" href="<?php echo $v['url'];?>">
                              <img class="media-object" src="<?php echo $v['img'];?>" width="98" height="151" alt="...">
                            </a>
                          </div>
                          <div class="media-body">
                            <h4 class="media-heading"><?php echo $v['name'].'：'.$v['subtitle'];?></h4>
                            <p><?php 
                                echo '作者：'.$v['authors'].'</br>';
                                if ($v['translator'] != '') {
                                    echo '翻译：'.$v['translator'].'</br>';
                                }
                                echo '出版：'.$v['publisher'].'</br>';
                                echo '时间：'.$v['pubdate'].'</br>';
                                echo '评分：'.$v['rating'].'分 / '.$v['raters'].'人</br>';
                                echo '价格：'.$v['price'];
                            ?>
                            </p>
                          </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    </div>

                    <?php endwhile; ?>
                </div>
            </article>
            <?php comments_template(); ?>

        </div>
    </div>
</div>

<?php get_footer(); ?>
