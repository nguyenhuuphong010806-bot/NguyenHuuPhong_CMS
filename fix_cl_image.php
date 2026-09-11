<?php
require_once('wordpress/wp-load.php');
require_once('wordpress/wp-admin/includes/file.php');
require_once('wordpress/wp-admin/includes/media.php');
require_once('wordpress/wp-admin/includes/image.php');

$post = get_page_by_title('Champions League 2025: Man City vs Real Madrid - Dem Bong Da Lich Su', OBJECT, 'post');
if ($post && !has_post_thumbnail($post->ID)) {
    // Dung picsum thay the Unsplash de tranh loi 404
    $url = 'https://picsum.photos/id/1040/800/600.jpg';
    $tmp = download_url($url);
    if (!is_wp_error($tmp)) {
        $fa  = ['name' => 'cl-football.jpg', 'tmp_name' => $tmp];
        $iid = media_handle_sideload($fa, $post->ID, $post->post_title);
        if (!is_wp_error($iid)) {
            set_post_thumbnail($post->ID, $iid);
            echo "OK: Da set anh dai dien cho bai Champions League (Media ID: $iid)\n";
        } else {
            echo "LOI xu ly anh: " . $iid->get_error_message() . "\n";
        }
    } else {
        echo "LOI tai anh: " . $tmp->get_error_message() . "\n";
    }
} elseif ($post && has_post_thumbnail($post->ID)) {
    echo "Bai viet da co anh dai dien roi.\n";
} else {
    echo "Khong tim thay bai viet.\n";
}
