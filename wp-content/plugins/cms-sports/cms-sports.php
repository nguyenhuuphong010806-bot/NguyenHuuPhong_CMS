<?php
/**
 * Plugin Name: CMS Sports
 * Plugin URI:  https://example.com
 * Description: Plugin quan ly noi dung the thao: hien thi danh sach bai viet theo category Tennis, Pic, Football. Ho tro shortcode va widget.
 * Version:     1.0.0
 * Author:      CMS Buoi 1
 * License:     GPL2
 * Text Domain: cms-sports
 */

if (!defined('ABSPATH')) exit;

// ===========================================================
// 1. SHORTCODE: [cms_sports_list] — Hien thi bai viet the thao
// Su dung: [cms_sports_list category="tennis" count="5"]
// ===========================================================
function cms_sports_list_shortcode($atts) {
    $atts = shortcode_atts([
        'category' => 'the-thao',
        'count'    => 6,
        'columns'  => 3,
    ], $atts, 'cms_sports_list');

    $query = new WP_Query([
        'category_name'  => sanitize_text_field($atts['category']),
        'posts_per_page' => intval($atts['count']),
        'post_status'    => 'publish',
    ]);

    if (!$query->have_posts()) {
        return '<p style="color:#888;">Chua co bai viet nao trong danh muc nay.</p>';
    }

    $cols = max(1, min(4, intval($atts['columns'])));
    $col_width = floor(100 / $cols);

    ob_start(); ?>
    <div class="cms-sports-wrap" style="display:flex;flex-wrap:wrap;gap:20px;margin:20px 0;">
    <?php while ($query->have_posts()): $query->the_post(); ?>
        <div class="cms-sports-card" style="flex:0 0 calc(<?php echo $col_width; ?>% - 20px);background:#fff;border-radius:10px;overflow:hidden;box-shadow:0 2px 8px rgba(0,0,0,.08);border:1px solid #e2e8f0;">
            <?php if (has_post_thumbnail()): ?>
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('medium', ['style'=>'width:100%;height:180px;object-fit:cover;display:block;']); ?>
                </a>
            <?php endif; ?>
            <div style="padding:14px 16px;">
                <h3 style="font-size:15px;font-weight:700;margin:0 0 8px;line-height:1.4;">
                    <a href="<?php the_permalink(); ?>" style="color:#1e3a5f;text-decoration:none;"><?php the_title(); ?></a>
                </h3>
                <p style="font-size:13px;color:#64748b;margin:0 0 10px;"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                <a href="<?php the_permalink(); ?>" style="display:inline-block;font-size:12px;font-weight:600;color:#2563eb;text-decoration:none;">Doc them &rarr;</a>
            </div>
        </div>
    <?php endwhile; wp_reset_postdata(); ?>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('cms_sports_list', 'cms_sports_list_shortcode');

// ===========================================================
// 2. SHORTCODE: [cms_sports_youtube] — Nhung video YouTube
// Su dung: [cms_sports_youtube url="https://youtube.com/watch?v=XXX" width="800"]
// ===========================================================
function cms_sports_youtube_shortcode($atts) {
    $atts = shortcode_atts([
        'url'    => '',
        'width'  => 800,
        'height' => 450,
        'title'  => 'YouTube Video',
    ], $atts, 'cms_sports_youtube');

    if (empty($atts['url'])) {
        return '<p style="color:red;">Vui long cung cap URL YouTube.</p>';
    }

    // Chuyen URL YouTube sang dang embed
    $url = esc_url($atts['url']);
    preg_match('/(?:v=|youtu\.be\/)([a-zA-Z0-9_\-]{11})/', $url, $matches);
    if (empty($matches[1])) {
        return '<p style="color:red;">URL YouTube khong hop le.</p>';
    }
    $vid_id = $matches[1];
    $embed_url = "https://www.youtube.com/embed/{$vid_id}";
    $w = intval($atts['width']);
    $h = intval($atts['height']);
    $title = esc_attr($atts['title']);

    return "<div style='position:relative;padding-bottom:56.25%;height:0;overflow:hidden;max-width:100%;margin:16px 0;border-radius:10px;box-shadow:0 4px 16px rgba(0,0,0,.15);'>
        <iframe style='position:absolute;top:0;left:0;width:100%;height:100%;' src='{$embed_url}' title='{$title}' frameborder='0' allow='accelerometer;autoplay;clipboard-write;encrypted-media;gyroscope;picture-in-picture' allowfullscreen></iframe>
    </div>";
}
add_shortcode('cms_sports_youtube', 'cms_sports_youtube_shortcode');

// ===========================================================
// 3. WIDGET: Danh sach bai viet the thao noi bat
// ===========================================================
class CMS_Sports_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'cms_sports_widget',
            'CMS Sports - Bai Viet Noi Bat',
            ['description' => 'Hien thi danh sach bai viet the thao noi bat trong sidebar.']
        );
    }

    public function widget($args, $instance) {
        $title    = !empty($instance['title'])    ? esc_html($instance['title'])    : 'Bai Viet The Thao';
        $category = !empty($instance['category']) ? esc_attr($instance['category']) : 'the-thao';
        $count    = !empty($instance['count'])    ? intval($instance['count'])      : 5;

        echo $args['before_widget'];
        echo $args['before_title'] . $title . $args['after_title'];

        $q = new WP_Query(['category_name'=>$category,'posts_per_page'=>$count,'post_status'=>'publish']);
        if ($q->have_posts()): ?>
        <ul style="list-style:none;padding:0;margin:0;">
            <?php while ($q->have_posts()): $q->the_post(); ?>
            <li style="padding:8px 0;border-bottom:1px solid #f1f5f9;display:flex;gap:10px;align-items:center;">
                <?php if (has_post_thumbnail()): ?>
                    <a href="<?php the_permalink(); ?>" style="flex-shrink:0;">
                        <?php the_post_thumbnail('thumbnail', ['style'=>'width:56px;height:56px;object-fit:cover;border-radius:6px;']); ?>
                    </a>
                <?php endif; ?>
                <a href="<?php the_permalink(); ?>" style="font-size:13px;font-weight:600;color:#1e3a5f;text-decoration:none;line-height:1.4;"><?php the_title(); ?></a>
            </li>
            <?php endwhile; wp_reset_postdata(); ?>
        </ul>
        <?php endif;

        echo $args['after_widget'];
    }

    public function form($instance) {
        $title    = $instance['title']    ?? 'Bai Viet The Thao';
        $category = $instance['category'] ?? 'the-thao';
        $count    = $instance['count']    ?? 5;
        ?>
        <p><label>Tieu de: <input class="widefat" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title); ?>"></label></p>
        <p><label>Category slug: <input class="widefat" name="<?php echo $this->get_field_name('category'); ?>" value="<?php echo esc_attr($category); ?>"></label></p>
        <p><label>So bai: <input class="widefat" type="number" name="<?php echo $this->get_field_name('count'); ?>" value="<?php echo esc_attr($count); ?>"></label></p>
        <?php
    }

    public function update($new, $old) {
        return [
            'title'    => sanitize_text_field($new['title']),
            'category' => sanitize_text_field($new['category']),
            'count'    => intval($new['count']),
        ];
    }
}
add_action('widgets_init', function(){ register_widget('CMS_Sports_Widget'); });

// ===========================================================
// 4. Admin Menu — Thong ke Plugin
// ===========================================================
add_action('admin_menu', function() {
    add_menu_page(
        'CMS Sports',
        'CMS Sports',
        'manage_options',
        'cms-sports',
        'cms_sports_admin_page',
        'dashicons-awards',
        30
    );
});

function cms_sports_admin_page() {
    $cats = ['the-thao','tennis','pic','football'];
    $total_posts = 0;
    ?>
    <div class="wrap">
        <h1 style="display:flex;align-items:center;gap:10px;">
            <span class="dashicons dashicons-awards" style="font-size:28px;color:#2563eb;"></span>
            CMS Sports — Dashboard
        </h1>
        <div style="display:flex;gap:16px;flex-wrap:wrap;margin:20px 0;">
        <?php foreach ($cats as $slug):
            $cat = get_term_by('slug', $slug, 'category');
            if (!$cat) continue;
            $total_posts += $cat->count;
            $colors = ['the-thao'=>'#2563eb','tennis'=>'#16a34a','pic'=>'#d97706','football'=>'#dc2626'];
            $color  = $colors[$slug] ?? '#555';
        ?>
        <div style="background:#fff;border-radius:10px;padding:20px 24px;min-width:180px;box-shadow:0 1px 4px rgba(0,0,0,.08);border-top:4px solid <?php echo $color; ?>;">
            <div style="font-size:28px;font-weight:700;color:<?php echo $color; ?>"><?php echo $cat->count; ?></div>
            <div style="font-size:13px;color:#64748b;margin-top:4px;"><?php echo esc_html($cat->name); ?></div>
        </div>
        <?php endforeach; ?>
        <div style="background:#fff;border-radius:10px;padding:20px 24px;min-width:180px;box-shadow:0 1px 4px rgba(0,0,0,.08);border-top:4px solid #7c3aed;">
            <div style="font-size:28px;font-weight:700;color:#7c3aed;"><?php echo $total_posts; ?></div>
            <div style="font-size:13px;color:#64748b;margin-top:4px;">Tong so bai viet</div>
        </div>
        </div>
        <h2>Huong dan su dung Shortcode</h2>
        <table class="widefat" style="max-width:800px;">
            <thead><tr><th>Shortcode</th><th>Mo ta</th><th>Vi du</th></tr></thead>
            <tbody>
                <tr><td><code>[cms_sports_list]</code></td><td>Hien thi danh sach bai viet</td><td><code>[cms_sports_list category="tennis" count="4" columns="2"]</code></td></tr>
                <tr><td><code>[cms_sports_youtube]</code></td><td>Nhung video YouTube</td><td><code>[cms_sports_youtube url="https://youtube.com/watch?v=XXX"]</code></td></tr>
            </tbody>
        </table>
    </div>
    <?php
}

// ===========================================================
// 5. Activate/Deactivate hooks
// ===========================================================
register_activation_hook(__FILE__, function() {
    add_option('cms_sports_activated', '1');
});
register_deactivation_hook(__FILE__, function() {
    delete_option('cms_sports_activated');
});
