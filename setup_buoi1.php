<?php
require_once('wordpress/wp-load.php');
require_once('wordpress/wp-admin/includes/file.php');
require_once('wordpress/wp-admin/includes/media.php');
require_once('wordpress/wp-admin/includes/image.php');

echo "========================================================\n";
echo "=== BƯỚC 1: PHÂN QUYỀN VAI TRÒ (ROLES) & TÀI KHOẢN (USERS) ===\n";
echo "========================================================\n";

// 1. Vai trò cms_read: chỉ có quyền đọc (read)
add_role('cms_read', 'CMS Read', [
    'read' => true
]);

// 2. Vai trò cms_write: có quyền đọc và viết bài (read, edit_posts, publish_posts, delete_posts, upload_files)
add_role('cms_write', 'CMS Write', [
    'read'          => true,
    'edit_posts'    => true,
    'publish_posts' => true,
    'delete_posts'  => true,
    'upload_files'  => true
]);

// 3. Vai trò cms_admin: quản trị viên có quyền cài plugin, cài theme, v.v.
add_role('cms_admin', 'CMS Admin', [
    'read'               => true,
    'edit_posts'         => true,
    'publish_posts'      => true,
    'delete_posts'       => true,
    'upload_files'       => true,
    'install_plugins'    => true,
    'activate_plugins'   => true,
    'update_plugins'     => true,
    'delete_plugins'     => true,
    'install_themes'     => true,
    'switch_themes'      => true,
    'edit_theme_options' => true,
    'update_themes'      => true,
    'delete_themes'      => true,
    'manage_options'     => true,
    'create_users'       => true,
    'edit_users'         => true,
    'delete_users'       => true
]);

// Tạo các User tương ứng với các Role
$users = [
    [
        'user_login'   => 'cms_read',
        'user_pass'    => '123456',
        'user_email'   => 'cms_read@example.com',
        'role'         => 'cms_read',
        'display_name' => 'CMS Read User'
    ],
    [
        'user_login'   => 'cms_write',
        'user_pass'    => '123456',
        'user_email'   => 'cms_write@example.com',
        'role'         => 'cms_write',
        'display_name' => 'CMS Write User'
    ],
    [
        'user_login'   => 'cms_admin',
        'user_pass'    => '123456',
        'user_email'   => 'cms_admin@example.com',
        'role'         => 'cms_admin',
        'display_name' => 'CMS Admin User'
    ]
];

foreach ($users as $u) {
    if (!username_exists($u['user_login'])) {
        $user_id = wp_insert_user($u);
        if (!is_wp_error($user_id)) {
            echo " - Đã tạo tài khoản: {$u['user_login']} | Vai trò: {$u['role']}\n";
        } else {
            echo " - Lỗi tạo {$u['user_login']}: " . $user_id->get_error_message() . "\n";
        }
    } else {
        $user_obj = get_user_by('login', $u['user_login']);
        $user_obj->set_role($u['role']);
        echo " - Tài khoản {$u['user_login']} đã tồn tại -> Đã cập nhật vai trò: {$u['role']}\n";
    }
}

echo "\n========================================================\n";
echo "=== BƯỚC 2: QUẢN LÝ DANH MỤC (CATEGORIES) ===============\n";
echo "========================================================\n";

$categories = [
    [
        'name' => 'Thể thao',
        'slug' => 'the-thao',
        'description' => 'Danh mục chính tin tức thể thao trong và ngoài nước.'
    ],
    [
        'name' => 'Tennis',
        'slug' => 'tennis',
        'description' => 'Tin tức, giải đấu và video Tennis đỉnh cao.'
    ],
    [
        'name' => 'Pic',
        'slug' => 'pic',
        'description' => 'Hình ảnh thể thao sắc nét và ấn tượng.'
    ],
    [
        'name' => 'Football',
        'slug' => 'football',
        'description' => 'Bóng đá thế giới, Champions League, V-League.'
    ]
];

$cat_ids = [];
$the_thao_id = 0;

foreach ($categories as $cat) {
    $existing_cat = get_term_by('slug', $cat['slug'], 'category');
    if (!$existing_cat) {
        $parent_id = 0;
        if ($cat['slug'] !== 'the-thao' && $the_thao_id > 0) {
            $parent_id = $the_thao_id;
        }
        $res = wp_insert_term($cat['name'], 'category', [
            'slug'        => $cat['slug'],
            'description' => $cat['description'],
            'parent'      => $parent_id
        ]);
        if (!is_wp_error($res)) {
            $cat_ids[$cat['slug']] = $res['term_id'];
            if ($cat['slug'] === 'the-thao') {
                $the_thao_id = $res['term_id'];
            }
            echo " - Tạo thành công danh mục: {$cat['name']} (ID: {$res['term_id']})\n";
        } else {
            echo " - Lỗi tạo danh mục {$cat['name']}: " . $res->get_error_message() . "\n";
        }
    } else {
        $cat_ids[$cat['slug']] = $existing_cat->term_id;
        if ($cat['slug'] === 'the-thao') {
            $the_thao_id = $existing_cat->term_id;
        }
        echo " - Danh mục {$cat['name']} đã tồn tại (ID: {$existing_cat->term_id})\n";
    }
}

echo "\n========================================================\n";
echo "=== BƯỚC 3: TẠO BÀI VIẾT (CÓ HÌNH ÁNH & VIDEO YOUTUBE) ==\n";
echo "========================================================\n";

$posts_sports = [
    [
        'title'    => 'Trực tiếp Wimbledon: Trận chung kết Tennis kịch tính',
        'content'  => '
<p>Giải quần vợt Wimbledon mang đến những pha bóng cực kỳ hấp dẫn và kịch tính giữa các tay vợt hàng đầu thế giới.</p>
<p><img src="https://picsum.photos/id/1067/800/500" alt="Tennis Match" style="max-width:100%; height:auto;" /></p>
<p>Xem lại video highlights trận đấu kịch tính trên YouTube dưới đây:</p>
https://www.youtube.com/watch?v=dQw4w9WgXcQ
<p>Hình ảnh ấn tượng về khoảnh khắc thi đấu đỉnh cao:</p>
<p><img src="https://picsum.photos/id/1074/800/500" alt="Tennis Player" style="max-width:100%; height:auto;" /></p>',
        'excerpt'  => 'Điểm lại những diễn biến chính của trận chung kết Tennis Wimbledon với video highlights YouTube và hình ảnh sắc nét.',
        'cats'     => ['the-thao', 'tennis', 'pic']
    ],
    [
        'title'    => 'Tổng hợp bàn thắng đẹp mắt giải bóng đá Football',
        'content'  => '
<p>Bóng đá (Football) luôn mang đến cho người hâm mộ những cảm xúc vỡ òa với các siêu phẩm sút xa đẳng cấp.</p>
<p><img src="https://picsum.photos/id/1058/800/500" alt="Football Match" style="max-width:100%; height:auto;" /></p>
<p>Cùng thưởng thức video tổng hợp các bàn thắng đỉnh cao trên YouTube:</p>
https://www.youtube.com/watch?v=L_LUpnjgPso
<p>Bức ảnh không khí sôi động bùng nổ trên khán đài sân vận động:</p>
<p><img src="https://picsum.photos/id/1059/800/500" alt="Football Stadium" style="max-width:100%; height:auto;" /></p>',
        'excerpt'  => 'Tuyển tập những khoảnh khắc bàn thắng bóng đá (Football) đẹp nhất kết hợp video clip YouTube.',
        'cats'     => ['the-thao', 'football', 'pic']
    ],
    [
        'title'    => 'Khoảnh khắc thể thao ấn tượng: Kết hợp Tennis & Football',
        'content'  => '
<p>Bộ sưu tập hình ảnh và video thể thao tổng hợp cho cả môn Quần vợt (Tennis) và Bóng đá (Football).</p>
<p><img src="https://picsum.photos/id/1084/800/500" alt="Sports Pic" style="max-width:100%; height:auto;" /></p>
<p>Xem clip YouTube hướng dẫn kỹ thuật thể thao chuyên nghiệp:</p>
https://www.youtube.com/watch?v=3JZ_D3ELwOQ',
        'excerpt'  => 'Khoảnh khắc hình ảnh (Pic) và video clip YouTube của môn Tennis và Football.',
        'cats'     => ['the-thao', 'tennis', 'football', 'pic']
    ]
];

$author_user = get_user_by('login', 'cms_write');
$author_id = $author_user ? $author_user->ID : 1;

// Cho phép unfiltered_html khi insert bằng script
remove_filter('content_save_pre', 'wp_filter_post_kses');
remove_filter('content_filtered_save_pre', 'wp_filter_post_kses');

foreach ($posts_sports as $pdata) {
    $existing = get_page_by_title($pdata['title'], OBJECT, 'post');
    
    $assigned_cats = [];
    foreach ($pdata['cats'] as $cslug) {
        if (isset($cat_ids[$cslug])) {
            $assigned_cats[] = $cat_ids[$cslug];
        }
    }
    
    $postarr = [
        'post_title'    => $pdata['title'],
        'post_content'  => $pdata['content'],
        'post_excerpt'  => $pdata['excerpt'],
        'post_status'   => 'publish',
        'post_author'   => $author_id,
        'post_category' => $assigned_cats
    ];

    if ($existing) {
        $postarr['ID'] = $existing->ID;
        $post_id = wp_update_post($postarr);
        echo " - Đã cập nhật bài viết: {$pdata['title']} (ID: {$post_id})\n";
    } else {
        $post_id = wp_insert_post($postarr);
        echo " - Đã đăng bài viết mới: {$pdata['title']} (ID: {$post_id})\n";
    }
}

echo "\n========================================================\n";
echo "=== HOÀN THÀNH TOÀN BỘ YÊU CẦU BUỔI 1 CMS WORDPRESS ===\n";
echo "========================================================\n";
