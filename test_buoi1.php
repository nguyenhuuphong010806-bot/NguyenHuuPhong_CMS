<?php
require_once('wordpress/wp-load.php');

$is_cli = (php_sapi_name() === 'cli');

if (!$is_cli) {
    header('Content-Type: text/html; charset=utf-8');
    echo '<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Test Buoi 1 - CMS WordPress</title>
<style>
@import url("https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap");
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
body{font-family:"Inter",sans-serif;background:#f0f2f5;color:#1e2a3a;padding:30px 20px}
.wrap{max-width:960px;margin:0 auto}
h1{font-size:22px;font-weight:700;margin-bottom:20px;color:#0f172a;display:flex;align-items:center;gap:10px}
h1 .branch-badge{background:#3b82f6;color:#fff;font-size:13px;font-weight:600;padding:3px 10px;border-radius:20px}
.summary-bar{display:flex;gap:12px;margin-bottom:24px;flex-wrap:wrap}
.sum-card{flex:1;min-width:130px;background:#fff;border-radius:10px;padding:16px 20px;box-shadow:0 1px 4px rgba(0,0,0,.08)}
.sum-card .num{font-size:28px;font-weight:700}
.sum-card .lbl{font-size:12px;color:#64748b;font-weight:500}
.sum-card.blue .num{color:#2563eb}
.sum-card.green .num{color:#16a34a}
.sum-card.orange .num{color:#d97706}
.sum-card.purple .num{color:#7c3aed}
.section{background:#fff;border-radius:12px;box-shadow:0 1px 4px rgba(0,0,0,.08);margin-bottom:24px;overflow:hidden}
.sec-head{background:linear-gradient(135deg,#1e3a5f,#2563eb);color:#fff;padding:14px 20px;font-size:15px;font-weight:600}
.sec-body{padding:20px}
.user-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:16px}
.user-card{border:1px solid #e2e8f0;border-radius:10px;overflow:hidden}
.uc-head{background:#f8fafc;padding:12px 16px;border-bottom:1px solid #e2e8f0}
.uc-head .login{font-weight:700;font-size:15px;color:#1e3a5f}
.uc-head .email{font-size:12px;color:#64748b;margin-top:2px}
.role-pill{display:inline-block;font-size:11px;font-weight:600;padding:2px 8px;border-radius:20px;margin-top:4px;background:#dbeafe;color:#1d4ed8}
.cap-list{list-style:none;padding:12px 16px;display:flex;flex-direction:column;gap:8px}
.cap-item{display:flex;align-items:center;justify-content:space-between;font-size:13px}
.cap-label{color:#475569}
.badge{font-size:11px;font-weight:600;padding:3px 10px;border-radius:20px}
.ok{background:#dcfce7;color:#15803d}
.no{background:#fee2e2;color:#b91c1c}
.info{background:#e0f2fe;color:#0369a1}
table{width:100%;border-collapse:collapse;font-size:13px}
th{background:#f1f5f9;color:#475569;font-weight:600;text-align:left;padding:10px 14px;border-bottom:2px solid #e2e8f0}
td{padding:10px 14px;border-bottom:1px solid #f1f5f9}
tr:last-child td{border-bottom:none}
tr:hover td{background:#f8fafc}
.post-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:16px}
.post-card{border:1px solid #e2e8f0;border-radius:10px;overflow:hidden}
.pc-head{background:#1e3a5f;color:#fff;padding:12px 16px;font-size:13px;font-weight:600;line-height:1.4}
.pc-body{padding:14px 16px;display:flex;flex-direction:column;gap:8px}
.meta{font-size:12px;color:#64748b}
.check-row{display:flex;align-items:center;justify-content:space-between;font-size:13px}
.git-box{display:flex;align-items:center;gap:14px;padding:18px;background:#f0fdf4;border-radius:8px;border:1px solid #bbf7d0}
.git-branch{font-size:22px;font-weight:700;color:#15803d}
hr.divider{border:none;border-top:1px solid #e2e8f0;margin:8px 0}
</style>
</head><body><div class="wrap">';
}

// Gather data
$users_to_check = ['cms_read', 'cms_write', 'cms_admin'];
$caps_to_test   = [
    'read'            => 'Quyen Doc',
    'edit_posts'      => 'Quyen Viet bai',
    'publish_posts'   => 'Quyen Dang bai',
    'install_plugins' => 'Cai Plugin',
    'install_themes'  => 'Cai Theme',
];
$target_cats = ['the-thao', 'tennis', 'pic', 'football'];
$posts = get_posts(['category_name'=>'the-thao','posts_per_page'=>20,'post_status'=>'publish']);
exec('git -C ' . __DIR__ . ' branch --show-current', $br);
$branch = implode('', $br);

// Summary bar (browser only)
if (!$is_cli) {
    echo '<h1>Ket Qua Test Buoi 1 - CMS WordPress <span class="branch-badge">'. htmlspecialchars($branch) .'</span></h1>';
    echo '<div class="summary-bar">';
    echo '<div class="sum-card blue"><div class="num">'.count($users_to_check).'</div><div class="lbl">Users</div></div>';
    echo '<div class="sum-card green"><div class="num">'.count($target_cats).'</div><div class="lbl">Danh muc</div></div>';
    echo '<div class="sum-card orange"><div class="num">'.count($posts).'</div><div class="lbl">Bai viet</div></div>';
    echo '<div class="sum-card purple"><div class="num">OK</div><div class="lbl">Git Branch</div></div>';
    echo '</div>';
}

// === 1. USERS & ROLES ===
if (!$is_cli) {
    echo '<div class="section"><div class="sec-head">1. Kiem Tra Tai Khoan &amp; Vai Tro (User &amp; Roles)</div><div class="sec-body"><div class="user-grid">';
} else {
    echo "\n============================\n=== 1. USER & ROLES ===\n============================\n";
}
foreach ($users_to_check as $uname) {
    $user = get_user_by('login', $uname);
    if (!$is_cli) {
        if ($user) {
            $roles_str = htmlspecialchars(implode(', ', $user->roles));
            echo "<div class='user-card'><div class='uc-head'><div class='login'>$uname</div><div class='email'>{$user->user_email}</div><span class='role-pill'>$roles_str</span></div><ul class='cap-list'>";
            foreach ($caps_to_test as $cap => $label) {
                $ok = user_can($user, $cap);
                echo "<li class='cap-item'><span class='cap-label'>$label</span><span class='badge ".($ok?'ok':'no')."'>".($ok?'CO':'KHONG')."</span></li>";
            }
            echo "</ul></div>";
        } else {
            echo "<div class='user-card'><div class='uc-head' style='background:#fee2e2'><div class='login' style='color:#b91c1c'>Khong tim thay: $uname</div></div></div>";
        }
    } else {
        if ($user) {
            echo "\nUser: [$uname] | Role: ".implode(', ',$user->roles)."\n";
            foreach ($caps_to_test as $cap => $label) {
                echo "  - $label: ".(user_can($user,$cap)?"OK":"KHONG")."\n";
            }
        } else { echo "\nKHONG TIM THAY: $uname\n"; }
    }
}
if (!$is_cli) echo '</div></div></div>';

// === 2. CATEGORIES ===
if (!$is_cli) {
    echo '<div class="section"><div class="sec-head">2. Kiem Tra Danh Muc (Categories)</div><div class="sec-body"><table><thead><tr><th>Ten</th><th>Slug</th><th>Danh muc cha</th><th>So bai</th><th>Trang thai</th></tr></thead><tbody>';
} else { echo "\n============================\n=== 2. CATEGORIES ===\n============================\n"; }
foreach ($target_cats as $slug) {
    $cat = get_term_by('slug', $slug, 'category');
    if (!$is_cli) {
        if ($cat) {
            $parent = $cat->parent ? get_cat_name($cat->parent) : '(Root)';
            echo "<tr><td><strong>{$cat->name}</strong></td><td><span class='badge info'>{$cat->slug}</span></td><td>$parent</td><td style='text-align:center'>{$cat->count}</td><td><span class='badge ok'>OK</span></td></tr>";
        } else { echo "<tr><td colspan='5' style='color:#b91c1c'>THIEU danh muc: $slug</td></tr>"; }
    } else {
        if ($cat) { echo "OK [{$cat->name}] | slug:{$cat->slug} | bai:{$cat->count}\n"; }
        else { echo "THIEU: $slug\n"; }
    }
}
if (!$is_cli) echo '</tbody></table></div></div>';

// === 3. POSTS ===
if (!$is_cli) {
    echo '<div class="section"><div class="sec-head">3. Kiem Tra Bai Viet The Thao (Posts &amp; Noi Dung)</div><div class="sec-body">';
    echo '<p class="meta" style="margin-bottom:14px">Tim thay <strong>'.count($posts).'</strong> bai viet.</p><div class="post-grid">';
} else { echo "\n============================\n=== 3. POSTS ===\n============================\nTim thay ".count($posts)." bai:\n\n"; }

foreach ($posts as $idx => $p) {
    $author   = get_userdata($p->post_author)->user_login;
    $cats_str = implode(', ', wp_get_post_categories($p->ID, ['fields'=>'names']));
    $has_img  = (bool)preg_match('/<img[^>]+>/i', $p->post_content);
    $has_feat = has_post_thumbnail($p->ID);
    $has_yt   = strpos($p->post_content,'youtube.com')!==false || strpos($p->post_content,'youtu.be')!==false;
    if (!$is_cli) {
        $title = htmlspecialchars($p->post_title);
        echo "<div class='post-card'><div class='pc-head'>$title</div><div class='pc-body'>";
        echo "<div class='meta'>ID: {$p->ID} | Tac gia: <strong>$author</strong></div>";
        echo "<div class='meta'>Danh muc: <em>$cats_str</em></div>";
        echo "<hr class='divider'>";
        echo "<div class='check-row'><span>Anh trong bai (&lt;img&gt;)</span><span class='badge ".($has_img?'ok':'no')."'>".($has_img?'CO':'KHONG')."</span></div>";
        echo "<div class='check-row'><span>Anh dai dien (Featured)</span><span class='badge ".($has_feat?'ok':'no')."'>".($has_feat?'CO':'KHONG')."</span></div>";
        echo "<div class='check-row'><span>Video YouTube</span><span class='badge ".($has_yt?'ok':'no')."'>".($has_yt?'CO':'KHONG')."</span></div>";
        echo "</div></div>";
    } else {
        echo ($idx+1).". {$p->post_title}\n   img:".($has_img?'OK':'NO')." | feat:".($has_feat?'OK':'NO')." | yt:".($has_yt?'OK':'NO')."\n";
    }
}
if (!$is_cli) echo '</div></div></div>';

// === 4. GIT BRANCH ===
if (!$is_cli) {
    echo '<div class="section"><div class="sec-head">4. Kiem Tra Git Branch</div><div class="sec-body">';
    echo '<div class="git-box"><div style="font-size:28px">&#127807;</div><div><div class="meta">Branch hien tai</div><div class="git-branch">'.htmlspecialchars($branch).'</div></div><span class="badge ok" style="margin-left:auto;font-size:13px">Dung yeu cau</span></div>';
    echo '</div></div></div></body></html>';
} else {
    echo "\n============================\n=== 4. GIT BRANCH ===\n============================\nBranch: $branch\n";
}
