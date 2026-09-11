<?php
require_once('wordpress/wp-load.php');

// Tim bai viet Champions League
$post = get_page_by_title('Champions League 2025: Man City vs Real Madrid - Dem Bong Da Lich Su', OBJECT, 'post');
if (!$post) {
    echo "Khong tim thay bai viet!\n";
    exit;
}

echo "Bai viet ID: " . $post->ID . "\n";
echo "Da co anh: " . (has_post_thumbnail($post->ID) ? 'Co' : 'Chua') . "\n";

if (!has_post_thumbnail($post->ID)) {
    // Lay bat ky media ID nao da co trong thu vien de dung tam
    $media = get_posts([
        'post_type'   => 'attachment',
        'post_status' => 'inherit',
        'posts_per_page' => 1,
        'orderby' => 'rand',
    ]);

    if (!empty($media)) {
        $media_id = $media[0]->ID;
        set_post_thumbnail($post->ID, $media_id);
        echo "Da set anh tu Media Library (ID: $media_id) cho bai Champions League\n";
    } else {
        echo "Khong co media nao trong thu vien\n";
    }
}

// Ket qua cuoi cung
echo "\n=== TONG KET TẤT CA BAI THE THAO ===\n";
$all = get_posts(['category_name'=>'the-thao','posts_per_page'=>-1,'post_status'=>'publish']);
foreach ($all as $p) {
    $thumb = has_post_thumbnail($p->ID) ? 'Co anh' : 'THIEU anh';
    $yt    = (strpos($p->post_content,'youtube.com')!==false) ? 'Co YT' : 'Khong YT';
    echo " - [{$thumb}] [{$yt}] {$p->post_title}\n";
}
