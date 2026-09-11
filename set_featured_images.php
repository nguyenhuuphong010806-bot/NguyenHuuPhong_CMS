<?php
require_once('wordpress/wp-load.php');
require_once('wordpress/wp-admin/includes/file.php');
require_once('wordpress/wp-admin/includes/media.php');
require_once('wordpress/wp-admin/includes/image.php');

// Lấy 10 bài viết mới nhất
$args = array(
    'numberposts' => 10,
    'post_type'   => 'post',
    'post_status' => 'publish'
);
$recent_posts = wp_get_recent_posts($args, ARRAY_A);

// Sử dụng URL có đuôi mở rộng .jpg trực tiếp để WordPress chấp nhận
$image_urls = [
    "https://picsum.photos/id/10/800/600.jpg",
    "https://picsum.photos/id/11/800/600.jpg",
    "https://picsum.photos/id/12/800/600.jpg",
    "https://picsum.photos/id/13/800/600.jpg",
    "https://picsum.photos/id/14/800/600.jpg",
    "https://picsum.photos/id/15/800/600.jpg",
    "https://picsum.photos/id/16/800/600.jpg",
    "https://picsum.photos/id/17/800/600.jpg",
    "https://picsum.photos/id/18/800/600.jpg",
    "https://picsum.photos/id/19/800/600.jpg"
];

$i = 0;
foreach ($recent_posts as $post) {
    $post_id = $post['ID'];
    
    // Kiểm tra nếu bài viết chưa có ảnh đại diện
    if (!has_post_thumbnail($post_id)) {
        $url = $image_urls[$i % count($image_urls)];
        echo "Đang tải ảnh đại diện cho bài: <b>" . $post['post_title'] . "</b>... ";
        
        // Tải ảnh về thư mục tạm
        $tmp = download_url($url);
        
        if (is_wp_error($tmp)) {
            echo "<span style='color:red;'>Lỗi tải ảnh: " . $tmp->get_error_message() . "</span><br>";
        } else {
            $file_array = array(
                'name'     => 'featured_' . $post_id . '.jpg',
                'tmp_name' => $tmp
            );
            
            // Xử lý đưa vào Media Library
            $img_id = media_handle_sideload($file_array, $post_id, $post['post_title']);
            
            if (!is_wp_error($img_id)) {
                // Đặt làm Featured Image
                set_post_thumbnail($post_id, $img_id);
                echo "<span style='color:green;'>Thành công!</span><br>";
            } else {
                @unlink($file_array['tmp_name']);
                echo "<span style='color:red;'>Lỗi xử lý ảnh: " . $img_id->get_error_message() . "</span><br>";
            }
        }
    } else {
        echo "Bài viết <b>" . $post['post_title'] . "</b> đã có ảnh đại diện.<br>";
    }
    $i++;
}

?>
