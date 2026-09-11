<?php
if (!defined('ABSPATH')) exit;

function cms_sports_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    add_theme_support('automatic-feed-links');
    add_theme_support('html5', ['search-form','comment-form','comment-list','gallery','caption']);
    add_theme_support('responsive-embeds');
    add_image_size('sports-card',  640, 400, true);
    add_image_size('sports-thumb', 200, 150, true);
    register_nav_menus(['primary' => 'Menu Chinh']);
}
add_action('after_setup_theme', 'cms_sports_setup');

function cms_sports_scripts() {
    wp_enqueue_style('google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap',
        [], null);
    wp_enqueue_style('cms-sports-style', get_stylesheet_uri(), ['google-fonts'], '2.0.2');
    wp_enqueue_script('cms-sports-js', get_template_directory_uri() . '/assets/js/main.js', [], '2.0.0', true);
}
add_action('wp_enqueue_scripts', 'cms_sports_scripts');

function cms_sports_sidebars() {
    register_sidebar([
        'name'          => 'Sidebar The Thao',
        'id'            => 'sidebar-sports',
        'before_widget' => '<div class="sidebar-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ]);
}
add_action('widgets_init', 'cms_sports_sidebars');

add_filter('excerpt_length', fn() => 18);
add_filter('excerpt_more',   fn() => '...');

function cms_sports_cat_color($slug) {
    $map = ['tennis'=>'#16a34a','football'=>'#dc2626','pic'=>'#d97706','the-thao'=>'#2563eb'];
    return $map[$slug] ?? '#2563eb';
}

function cms_sports_first_cat($post_id) {
    $cats = get_the_category($post_id);
    return !empty($cats) ? $cats[0] : null;
}

// Allow iframes in saved post content (display only, not save)
add_filter('wp_kses_allowed_html', function($allowed, $context) {
    if ($context === 'post') {
        $allowed['iframe'] = [
            'src' => true, 'width' => true, 'height' => true,
            'frameborder' => true, 'allowfullscreen' => true,
            'allow' => true, 'title' => true, 'style' => true,
        ];
        $allowed['figure']     = ['style'=>true,'class'=>true];
        $allowed['figcaption'] = ['style'=>true,'class'=>true];
    }
    return $allowed;
}, 10, 2);
