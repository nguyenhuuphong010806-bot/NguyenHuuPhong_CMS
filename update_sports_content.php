<?php
require_once('wordpress/wp-load.php');
require_once('wordpress/wp-admin/includes/file.php');
require_once('wordpress/wp-admin/includes/media.php');
require_once('wordpress/wp-admin/includes/image.php');

// Cho phep luu iframe/embed
remove_filter('content_save_pre', 'wp_filter_post_kses');
remove_filter('content_filtered_save_pre', 'wp_filter_post_kses');

echo "=== CAP NHAT ANH & VIDEO THE THAO ===\n\n";

// ==============================================================
// Du lieu bai viet moi voi anh the thao + YouTube that
// ==============================================================
$sports_posts = [
    [
        'title'   => 'Wimbledon 2025: Djokovic vs Alcaraz - Chung Ket Lich Su',
        'content' => '
<p>Tran chung ket Wimbledon 2025 giua Novak Djokovic va Carlos Alcaraz la mot trong nhung tran tennis dinh cao nhat lich su. Hai tay vot da mang den nhung pha bong hoa le, kinh di va day cam xuc cho hang trieu khan gia tren toan the gioi.</p>

<figure style="margin:24px 0;">
    <img src="https://images.unsplash.com/photo-1554068865-24cecd4e34b8?w=900&q=80" alt="Tennis Court Wimbledon" style="width:100%;border-radius:12px;box-shadow:0 4px 20px rgba(0,0,0,.15);" />
    <figcaption style="text-align:center;color:#64748b;font-size:13px;margin-top:8px;">San dau Wimbledon huyen thoai</figcaption>
</figure>

<h2 style="font-size:20px;font-weight:700;margin:24px 0 12px;color:#1e3a5f;">Dien bien tran dau</h2>
<p>Set 1 dien ra rat can bang voi nhung pha giao bong huy diet cua Djokovic. Alcaraz tra loi bang nhung cu danh sieu toc tu canh. Ti so set 1: 7-6 nghieng ve phia Djokovic.</p>

<figure style="margin:24px 0;">
    <img src="https://images.unsplash.com/photo-1622279457486-62dcc4a431d6?w=900&q=80" alt="Tennis Player Serving" style="width:100%;border-radius:12px;box-shadow:0 4px 20px rgba(0,0,0,.15);" />
    <figcaption style="text-align:center;color:#64748b;font-size:13px;margin-top:8px;">Man giao bong manh me cua Alcaraz</figcaption>
</figure>

<h2 style="font-size:20px;font-weight:700;margin:24px 0 12px;color:#1e3a5f;">Highlights tran dau tren YouTube</h2>
<p>Xem lai nhung khoang khac dinh cao nhat cua tran chung ket:</p>

https://www.youtube.com/watch?v=9lP9KBBIBvI

<h2 style="font-size:20px;font-weight:700;margin:24px 0 12px;color:#1e3a5f;">Ket qua va cam xuc</h2>
<p>Cuoi cung Alcaraz gianh chien thang sau 5 set kich tinh: 4-6, 6-3, 6-4, 6-6, 7-5. Tran dau dinh cao cua the gioi tennis hien dai.</p>

<figure style="margin:24px 0;">
    <img src="https://images.unsplash.com/photo-1531315396756-905d68d21b56?w=900&q=80" alt="Tennis Trophy" style="width:100%;border-radius:12px;box-shadow:0 4px 20px rgba(0,0,0,.15);" />
    <figcaption style="text-align:center;color:#64748b;font-size:13px;margin-top:8px;">Chiec cup Wimbledon danh giac</figcaption>
</figure>',
        'excerpt' => 'Tran chung ket Wimbledon 2025 giua Djokovic va Alcaraz dem lai nhung khoang khac lich su, highlights tren YouTube.',
        'cats'    => ['the-thao', 'tennis'],
        'img_url' => 'https://images.unsplash.com/photo-1554068865-24cecd4e34b8?w=800&q=80',
        'img_name'=> 'tennis-wimbledon.jpg',
    ],
    [
        'title'   => 'Roland Garros 2025: Nhung Man Phat Bong Thien Tai Tren San Dat Set',
        'content' => '
<p>Roland Garros - giai quoc thi Phap mo rong - la noi chung kien nhung man the hien dinh cao tren mat san dat set do. Nam 2025, giai dau chung kien nhieu bat ngo lon voi cac ten tuoi moi noi len thu thach gioi tennis truyen thong.</p>

<figure style="margin:24px 0;">
    <img src="https://images.unsplash.com/photo-1595435742656-5272d0b3fa82?w=900&q=80" alt="Roland Garros Clay Court" style="width:100%;border-radius:12px;box-shadow:0 4px 20px rgba(0,0,0,.15);" />
    <figcaption style="text-align:center;color:#64748b;font-size:13px;margin-top:8px;">Mat san dat set do ac biet cua Roland Garros</figcaption>
</figure>

<h2 style="font-size:20px;font-weight:700;margin:24px 0 12px;color:#1e3a5f;">Video highlights Roland Garros</h2>

https://www.youtube.com/watch?v=cN5GS8LPJDE

<figure style="margin:24px 0;">
    <img src="https://images.unsplash.com/photo-1599735655152-3e6ek1cce4a5?w=900&q=80" alt="Tennis Ball" style="width:100%;border-radius:12px;box-shadow:0 4px 20px rgba(0,0,0,.15);" />
    <figcaption style="text-align:center;color:#64748b;font-size:13px;margin-top:8px;">Qua bong tennis dac trung cua giai</figcaption>
</figure>

<p>Giai dau Roland Garros 2025 la mot buc tranh toan canh day mau sac cua the gioi tennis chuyen nghiep, noi cac tay vot the hien ban linh, ky nang va tam ly thep.</p>',
        'excerpt' => 'Roland Garros 2025 - nhung man the hien ky thuat dinh cao tren mat san dat set do huyen thoai, kem theo video YouTube.',
        'cats'    => ['the-thao', 'tennis', 'pic'],
        'img_url' => 'https://images.unsplash.com/photo-1595435742656-5272d0b3fa82?w=800&q=80',
        'img_name'=> 'roland-garros.jpg',
    ],
    [
        'title'   => 'Champions League 2025: Man City vs Real Madrid - Dem Bong Da Lich Su',
        'content' => '
<p>Tran ban ket Champions League 2025 giua Manchester City va Real Madrid la mot bua tiec bong da theo dung nghia den - full chuyen co, kich tinh, bat ngo va nhung ban thang dep mat lam say long nguoi ham mo.</p>

<figure style="margin:24px 0;">
    <img src="https://images.unsplash.com/photo-1508098682722-e99c43a406b2?w=900&q=80" alt="Football Stadium Night" style="width:100%;border-radius:12px;box-shadow:0 4px 20px rgba(0,0,0,.15);" />
    <figcaption style="text-align:center;color:#64748b;font-size:13px;margin-top:8px;">San van dong huyen ao duoi anh den dem</figcaption>
</figure>

<h2 style="font-size:20px;font-weight:700;margin:24px 0 12px;color:#1e3a5f;">Video highlights tran dau</h2>

https://www.youtube.com/watch?v=Klp7P7qzCLU

<h2 style="font-size:20px;font-weight:700;margin:24px 0 12px;color:#1e3a5f;">Nhung ban thang dang nho</h2>

<figure style="margin:24px 0;">
    <img src="https://images.unsplash.com/photo-1574629810360-7efbbe195018?w=900&q=80" alt="Football Goal Celebration" style="width:100%;border-radius:12px;box-shadow:0 4px 20px rgba(0,0,0,.15);" />
    <figcaption style="text-align:center;color:#64748b;font-size:13px;margin-top:8px;">An mung ban thang kich tinh cua Man City</figcaption>
</figure>

<p>Phut 87, Man City go ban thang lich su, dua tran dau vao hieu phu. Sau loat penalty can nao, Real Madrid vuot qua de vao chung ket mot lan nua. Su kich tinh cua Champions League khong bao gio that vong!</p>

<figure style="margin:24px 0;">
    <img src="https://images.unsplash.com/photo-1529900748604-07564a03e7a6?w=900&q=80" alt="Football Match Action" style="width:100%;border-radius:12px;box-shadow:0 4px 20px rgba(0,0,0,.15);" />
    <figcaption style="text-align:center;color:#64748b;font-size:13px;margin-top:8px;">Man doi khang to lon giua hai doi</figcaption>
</figure>',
        'excerpt' => 'Ban ket Champions League 2025: Man City vs Real Madrid - dem bong da lich su voi ban thang kich tinh phut 87.',
        'cats'    => ['the-thao', 'football'],
        'img_url' => 'https://images.unsplash.com/photo-1508098682722-e99c43a406b2?w=800&q=80',
        'img_name'=> 'champions-league.jpg',
    ],
    [
        'title'   => 'Premier League: Liverpool Quyet Tam Bao Ve Ngoi Vo Dich Mua Giai 2025',
        'content' => '
<p>Liverpool dang thi dau an tuong trong mua giai Premier League 2025, voi Salah, Diaz va Nunez tao thanh bo ba tan cong cuc ky nguy hiem. HLV Slot da tao ra mot loi choi tap the doan ket va hieu qua.</p>

<figure style="margin:24px 0;">
    <img src="https://images.unsplash.com/photo-1551958219-acbc608c6377?w=900&q=80" alt="Liverpool Anfield" style="width:100%;border-radius:12px;box-shadow:0 4px 20px rgba(0,0,0,.15);" />
    <figcaption style="text-align:center;color:#64748b;font-size:13px;margin-top:8px;">San Anfield - thanh dia cua doi bong nuoc Anh</figcaption>
</figure>

<h2 style="font-size:20px;font-weight:700;margin:24px 0 12px;color:#1e3a5f;">Tong hop ban thang dep nhat vong 30</h2>

https://www.youtube.com/watch?v=t9XrZw839-o

<figure style="margin:24px 0;">
    <img src="https://images.unsplash.com/photo-1543326727-cf6c39e8f84c?w=900&q=80" alt="Football Players" style="width:100%;border-radius:12px;box-shadow:0 4px 20px rgba(0,0,0,.15);" />
    <figcaption style="text-align:center;color:#64748b;font-size:13px;margin-top:8px;">Cac cau thu Liverpool thi dau quyet tam</figcaption>
</figure>

<p>Voi con so 8 tran con lai cua mua giai, Liverpool co 5 diem nhieu hon Arsenal. Cuoc dua tranh ngoi vuong Premier League se con tiep tuc nong bong den nhung phut cuoi cung!</p>',
        'excerpt' => 'Liverpool dang dan dau Premier League 2025 voi phong do choi an tuong cua bo ba Salah-Diaz-Nunez.',
        'cats'    => ['the-thao', 'football'],
        'img_url' => 'https://images.unsplash.com/photo-1551958219-acbc608c6377?w=800&q=80',
        'img_name'=> 'liverpool-premier.jpg',
    ],
    [
        'title'   => 'Anh The Thao Dinh Cao: Bo Suu Tap Hinh An Tuong Thang 9/2025',
        'content' => '
<p>Bo suu tap nhung hinh anh the thao dep nhat thang 9 nam 2025, thu tu cac giai dau lon tren the gioi: tennis, bong da, boi loi va nhieu mon the thao hap dan khac.</p>

<figure style="margin:24px 0;">
    <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=900&q=80" alt="Sports Action" style="width:100%;border-radius:12px;box-shadow:0 4px 20px rgba(0,0,0,.15);" />
    <figcaption style="text-align:center;color:#64748b;font-size:13px;margin-top:8px;">Khoang khac the thao hao hung</figcaption>
</figure>

<figure style="margin:24px 0;">
    <img src="https://images.unsplash.com/photo-1517649763962-0c623066013b?w=900&q=80" alt="Cycling Sport" style="width:100%;border-radius:12px;box-shadow:0 4px 20px rgba(0,0,0,.15);" />
    <figcaption style="text-align:center;color:#64748b;font-size:13px;margin-top:8px;">Cuoc dua xe dap chuyen nghiep</figcaption>
</figure>

<h2 style="font-size:20px;font-weight:700;margin:24px 0 12px;color:#1e3a5f;">Video tong hop anh the thao dep nhat</h2>

https://www.youtube.com/watch?v=3JQkveP0UL4

<figure style="margin:24px 0;">
    <img src="https://images.unsplash.com/photo-1461896836934-ffe607ba8211?w=900&q=80" alt="Running Sport" style="width:100%;border-radius:12px;box-shadow:0 4px 20px rgba(0,0,0,.15);" />
    <figcaption style="text-align:center;color:#64748b;font-size:13px;margin-top:8px;">Van dong vien chay bo chuyen nghiep</figcaption>
</figure>

<figure style="margin:24px 0;">
    <img src="https://images.unsplash.com/photo-1470468969717-61d5d54fd036?w=900&q=80" alt="Swimming Sport" style="width:100%;border-radius:12px;box-shadow:0 4px 20px rgba(0,0,0,.15);" />
    <figcaption style="text-align:center;color:#64748b;font-size:13px;margin-top:8px;">Noi dua boi dinh cao</figcaption>
</figure>',
        'excerpt' => 'Bo suu tap hinh anh (Pic) the thao dep nhat thang 9/2025 tu cac giai dau quoc te lon: tennis, football, cycling.',
        'cats'    => ['the-thao', 'pic'],
        'img_url' => 'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=800&q=80',
        'img_name'=> 'sports-pic-sep.jpg',
    ],
    [
        'title'   => 'US Open 2025: Ngay Hoi Tennis Lon Nhat Chau My',
        'content' => '
<p>US Open 2025 tai Flushing Meadows, New York la diem den cuoi cung cua Grand Slam trong nam. San hard court Flushing Meadows chung kien nhung tran dau cau bat nuot, toc do bong qua 200km/h va nhung pha pha bong lam khan gia ngat tho.</p>

<figure style="margin:24px 0;">
    <img src="https://images.unsplash.com/photo-1579952363873-27f3bade9f55?w=900&q=80" alt="US Open Tennis" style="width:100%;border-radius:12px;box-shadow:0 4px 20px rgba(0,0,0,.15);" />
    <figcaption style="text-align:center;color:#64748b;font-size:13px;margin-top:8px;">Arthur Ashe Stadium - chu san cua US Open</figcaption>
</figure>

<h2 style="font-size:20px;font-weight:700;margin:24px 0 12px;color:#1e3a5f;">Highlights US Open 2025</h2>

https://www.youtube.com/watch?v=mmeLCAP74KA&t=410s

<figure style="margin:24px 0;">
    <img src="https://images.unsplash.com/photo-1541252260730-0412e8e2108e?w=900&q=80" alt="Tennis Night Match" style="width:100%;border-radius:12px;box-shadow:0 4px 20px rgba(0,0,0,.15);" />
    <figcaption style="text-align:center;color:#64748b;font-size:13px;margin-top:8px;">Tran dau dem huyen ao duoi anh den san Arthur Ashe</figcaption>
</figure>

<p>Voi giai thuong len toi 75 trieu USD, US Open 2025 la giai Grand Slam co giai thuong cao nhat lich su, thu hut hon 700,000 khan gia den san trong 2 tuan giai dau.</p>',
        'excerpt' => 'US Open 2025 tai Flushing Meadows - ngay hoi tennis dinh cao chau My voi nhung tran dau lich su va video highlights YouTube.',
        'cats'    => ['the-thao', 'tennis', 'pic'],
        'img_url' => 'https://images.unsplash.com/photo-1579952363873-27f3bade9f55?w=800&q=80',
        'img_name'=> 'us-open-tennis.jpg',
    ],
];

// ==============================================================
// Lay author
// ==============================================================
$author_user = get_user_by('login', 'cms_write');
$author_id = $author_user ? $author_user->ID : 1;

// ==============================================================
// Tao / cap nhat bai viet
// ==============================================================
foreach ($sports_posts as $idx => $pdata) {
    // Lay cat IDs
    $assigned_cats = [];
    foreach ($pdata['cats'] as $cslug) {
        $cat = get_term_by('slug', $cslug, 'category');
        if ($cat) $assigned_cats[] = $cat->term_id;
    }

    // Kiem tra da ton tai chua
    $existing = get_page_by_title($pdata['title'], OBJECT, 'post');

    $postarr = [
        'post_title'    => $pdata['title'],
        'post_content'  => $pdata['content'],
        'post_excerpt'  => $pdata['excerpt'],
        'post_status'   => 'publish',
        'post_author'   => $author_id,
        'post_category' => $assigned_cats,
    ];

    if ($existing) {
        $postarr['ID'] = $existing->ID;
        $post_id = wp_update_post($postarr);
        echo "Cap nhat bai: {$pdata['title']} (ID: {$post_id})\n";
    } else {
        $post_id = wp_insert_post($postarr);
        echo "Tao moi bai: {$pdata['title']} (ID: {$post_id})\n";
    }

    if (!$post_id || is_wp_error($post_id)) {
        echo "  -> LOI: " . (is_wp_error($post_id) ? $post_id->get_error_message() : 'Unknown') . "\n";
        continue;
    }

    // Set featured image neu chua co
    if (!has_post_thumbnail($post_id)) {
        echo "  -> Dang tai anh dai dien: {$pdata['img_url']} ...";
        $tmp = download_url($pdata['img_url']);
        if (!is_wp_error($tmp)) {
            $file_array = ['name' => $pdata['img_name'], 'tmp_name' => $tmp];
            $img_id = media_handle_sideload($file_array, $post_id, $pdata['title']);
            if (!is_wp_error($img_id)) {
                set_post_thumbnail($post_id, $img_id);
                echo " OK (Media ID: {$img_id})\n";
            } else {
                @unlink($tmp);
                echo " LOI: " . $img_id->get_error_message() . "\n";
            }
        } else {
            echo " LOI tai anh: " . $tmp->get_error_message() . "\n";
        }
    } else {
        echo "  -> Da co anh dai dien.\n";
    }
}

echo "\n=== XONG! Tong so bai viet the thao da cap nhat: " . count($sports_posts) . " ===\n";
