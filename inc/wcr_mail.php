<?php
/*
 * 评论邮件通知
 */
function comment_mail_notify($comment_id) {
    $comment = get_comment($comment_id);
    $parent_id = $comment->comment_parent ? $comment->comment_parent : '';
    $spam_confirmed = $comment->comment_approved;
    if (($parent_id != '') && ($spam_confirmed != 'spam')) {
        $wp_email = 'no-reply@' . preg_replace('#^www.#', '', strtolower($_SERVER['SERVER_NAME'])); //e-mail 发出点, no-reply 可改为可用的 e-mail.
        //$wp_email = get_bloginfo('admin_email'); //e-mail 发出点, no-reply 可改为可用的 e-mail.

        $to = trim(get_comment($parent_id)->comment_author_email);
        $subject = '您在 [' . get_option("blogname") . '] 的留言有了回复';
        $message = '
            <div style="background-color:#fff; border:1px solid #d8e3e8; color:#111; padding:0 10px; -moz-border-radius:5px; -webkit-border-radius:5px; -khtml-border-radius:5px;">
                <h2>' . trim(get_comment($parent_id)->comment_author) . ', 您好!</h2>
                <p><strong>您曾在<a href="'.get_permalink( $comment->comment_post_ID ).'">《' . get_the_title($comment->comment_post_ID) . '》</a>的留言:</strong></p>' .
                '<div style="background-color:#eef2fa;border: 1px solid #ccc; padding: 10px; -moz-border-radius:4px; -webkit-border-radius:4px; -khtml-border-radius:4px;">'
                    . trim(get_comment($parent_id)->comment_content) . '</div>

                <p><strong>' . trim($comment->comment_author) . ' 给您的回复:</strong></p>' .
                '<div style="background-color:#eef2fa;border: 1px solid #ccc; padding: 10px; -moz-border-radius:4px; -webkit-border-radius:4px; -khtml-border-radius:4px;">'
                    . trim($comment->comment_content) . '</div>
                <p>您可以点击 查看回复完整內容</p>
                <p>欢迎再度光临 <a href="' . home_url() . '">' . get_option('blogname') . '</a></p>
                <p>(此邮件由系统自动发送，请勿回复.)</p>
            </div>';
        $from = "From: \"" . get_option('blogname') . "\" <$wp_email>";
        $headers = "$from\nContent-Type: text/html; charset=" . get_option('blog_charset') . "\n";
        wp_mail($to, $subject, $message, $headers);
    }
}
add_action('comment_post', 'comment_mail_notify');
