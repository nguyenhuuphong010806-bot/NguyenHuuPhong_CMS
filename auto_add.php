<?php
require_once('wordpress/wp-load.php');

$posts_data = [
    [
        'title' => 'Top 5 loại trà thanh nhiệt tốt cho sức khỏe',
        'content' => 'Trà xanh, trà hoa cúc giúp giải nhiệt cơ thể hiệu quả trong những ngày nắng nóng.<br><br><img src="https://picsum.photos/600/400?random=1" alt="Anh 1" /><br><br>Sử dụng trà thường xuyên giúp tăng cường hệ miễn dịch và cải thiện làn da.<br><br><img src="https://picsum.photos/600/400?random=2" alt="Anh 2" />',
        'excerpt' => 'Tổng hợp các loại trà thiên nhiên giúp giải nhiệt cơ thể hiệu quả trong những ngày nắng nóng.',
        'category' => 'Đồ uống',
        'tags' => ['tra', 'do uong', 'suc khoe']
    ],
    [
        'title' => 'Cách pha cà phê phin đậm đà chuẩn vị truyền thống',
        'content' => 'Pha cà phê phin đòi hỏi sự tỉ mỉ từ khâu chọn hạt đến nhiệt độ nước.<br><br><img src="https://picsum.photos/600/400?random=3" alt="Anh 1" /><br><br>Thưởng thức ly cà phê sáng giúp bạn tỉnh táo cho cả ngày làm việc.<br><br><img src="https://picsum.photos/600/400?random=4" alt="Anh 2" />',
        'excerpt' => 'Hướng dẫn chi tiết các bước pha cà phê phin thơm ngon, chuẩn vị đậm đà ngay tại nhà.',
        'category' => 'Đồ uống',
        'tags' => ['ca phe', 'do uong', 'pha che']
    ],
    [
        'title' => 'Tổng hợp các loại hạt dinh dưỡng tốt cho tim mạch',
        'content' => 'Các loại hạt chứa nhiều Omega-3 và vitamin tốt cho cơ thể.<br><br><img src="https://picsum.photos/600/400?random=5" alt="Anh 1" /><br><br>Hạt hạnh nhân và óc chó là lựa chọn tuyệt vời cho món ăn vặt hằng ngày.<br><br><img src="https://picsum.photos/600/400?random=6" alt="Anh 2" />',
        'excerpt' => 'Tìm hiểu công dụng của hạt hạnh nhân, óc chó và hạt điều thích hợp làm món ăn vặt hằng ngày.',
        'category' => 'Bánh kẹo & Ăn vặt',
        'tags' => ['hat dinh duong', 'an vat', 'suc khoe']
    ],
    [
        'title' => 'Công thức làm bánh quy bơ giòn rụm cực đơn giản',
        'content' => 'Bánh quy bơ là món ăn vặt yêu thích của cả người lớn và trẻ em.<br><br><img src="https://picsum.photos/600/400?random=7" alt="Anh 1" /><br><br>Chuẩn bị nguyên liệu đơn giản bao gồm bơ, đường, bột mì và trứng gà.<br><br><img src="https://picsum.photos/600/400?random=8" alt="Anh 2" />',
        'excerpt' => 'Bí quyết làm món bánh quy bơ thơm ngon giòn rụm tại nhà cho người mới bắt đầu học làm bánh.',
        'category' => 'Bánh kẹo & Ăn vặt',
        'tags' => ['banh quy', 'an vat', 'lam banh']
    ],
    [
        'title' => 'Mẹo chọn hải sản tươi ngon không lo hóa chất',
        'content' => 'Bí quyết chọn tôm, cá tươi dựa vào mắt và độ đàn hồi của thịt.<br><br><img src="https://picsum.photos/600/400?random=9" alt="Anh 1" /><br><br>Nên mua hải sản ở các cửa hàng uy tín để đảm bảo an toàn vệ sinh thực phẩm.<br><br><img src="https://picsum.photos/600/400?random=10" alt="Anh 2" />',
        'excerpt' => 'Hướng dẫn nhận biết cá, tôm, mực tươi sống chất lượng giúp bữa ăn gia đình luôn an toàn.',
        'category' => 'Thực phẩm tươi sống',
        'tags' => ['hai san', 'tuoi song', 'meo hay']
    ],
    [
        'title' => 'Phương pháp bảo quản rau củ tươi lâu trong tủ lạnh',
        'content' => 'Rau củ cần được làm khô trước khi cho vào túi khóa kéo bảo quản.<br><br><img src="https://picsum.photos/600/400?random=11" alt="Anh 1" /><br><br>Phân loại rau củ và trái cây riêng biệt để tránh rau bị hư hỏng nhanh.<br><br><img src="https://picsum.photos/600/400?random=12" alt="Anh 2" />',
        'excerpt' => 'Các cách sơ chế và bảo quản rau củ quả giữ nguyên chất dinh dưỡng và độ tươi suốt tuần.',
        'category' => 'Thực phẩm tươi sống',
        'tags' => ['rau cu', 'bao quan', 'thuc pham']
    ],
    [
        'title' => 'Bí quyết ướp đồ nướng ngon chuẩn vị nhà hàng',
        'content' => 'Ướp gia vị đúng thời gian giúp thịt ngấm đều và giữ được độ ngọt tự nhiên.<br><br><img src="https://picsum.photos/600/400?random=13" alt="Anh 1" /><br><br>Kết hợp sốt BBQ cùng các loại thảo mộc tạo nên hương vị đặc trưng hấp dẫn.<br><br><img src="https://picsum.photos/600/400?random=14" alt="Anh 2" />',
        'excerpt' => 'Tổng hợp các loại gia vị nêm nếm giúp món nướng thơm lừng đậm đà cho tiệc cuối tuần.',
        'category' => 'Gia vị & Đồ khô',
        'tags' => ['gia vi', 'do nuong', 'cooking']
    ],
    [
        'title' => 'Cách ngâm và sơ chế nấm đông cô khô đúng cách',
        'content' => 'Nấm đông cô khô cần ngâm nước ấm trong 30 phút để nở mềm.<br><br><img src="https://picsum.photos/600/400?random=15" alt="Anh 1" /><br><br>Rửa sạch nấm để loại bỏ bụi bẩn trước khi chế biến các món hầm.<br><br><img src="https://picsum.photos/600/400?random=16" alt="Anh 2" />',
        'excerpt' => 'Hướng dẫn sơ chế nấm đông cô khô để giữ trọn hương vị và dinh dưỡng cho món ăn.',
        'category' => 'Gia vị & Đồ khô',
        'tags' => ['do kho', 'nam dong co', 'gia vi']
    ],
    [
        'title' => 'Gói combo thực phẩm tiết kiệm cho gia đình nhỏ',
        'content' => 'Mua theo gói combo giúp tiết kiệm đến 20% chi phí đi chợ hằng tuần.<br><br><img src="https://picsum.photos/600/400?random=17" alt="Anh 1" /><br><br>Gói combo bao gồm đầy đủ rau củ, thịt và gia vị thiết yếu.<br><br><img src="https://picsum.photos/600/400?random=18" alt="Anh 2" />',
        'excerpt' => 'Gợi ý các gói sản phẩm kết hợp giúp gia đình tiết kiệm tối đa chi phí mua sắm hằng tuần.',
        'category' => 'Khuyến mãi & Combo',
        'tags' => ['combo', 'tiet kiem', 'khuyen mai']
    ],
    [
        'title' => 'Chương trình ưu đãi giảm giá thực phẩm cuối tuần',
        'content' => 'Săn voucher giảm giá hấp dẫn vào mỗi thứ 7 và chủ nhật.<br><br><img src="https://picsum.photos/600/400?random=19" alt="Anh 1" /><br><br>Áp dụng mức giảm giá lên đến 50% cho các mặt hàng tươi sống.<br><br><img src="https://picsum.photos/600/400?random=20" alt="Anh 2" />',
        'excerpt' => 'Chi tiết các mặt hàng thực phẩm tươi sống được giảm giá sâu vào thứ 7 và chủ nhật này.',
        'category' => 'Khuyến mãi & Combo',
        'tags' => ['giam gia', 'khuyen mai', 'uu dai']
    ]
];

foreach ($posts_data as $data) {
    $cat_obj = get_term_by('name', $data['category'], 'category');
    $cat_id = $cat_obj ? $cat_obj->term_id : 1;

    $post_id = wp_insert_post([
        'post_title'    => $data['title'],
        'post_content'  => $data['content'],
        'post_excerpt'  => $data['excerpt'],
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_category' => [$cat_id]
    ]);

    if ($post_id && !is_wp_error($post_id)) {
        wp_set_post_terms($post_id, $data['tags'], 'post_tag');
        echo "Thêm thành công bài: <b>" . $data['title'] . "</b><br>";
    }
}


?>
