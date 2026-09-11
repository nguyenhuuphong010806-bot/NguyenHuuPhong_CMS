<?php
require_once('wordpress/wp-load.php');

$post = get_post(91); // Roland Garros post
if (!$post) { echo "KHONG TIM THAY POST\n"; exit; }

echo "=== THONG TIN POST ===\n";
echo "ID: " . $post->ID . "\n";
echo "Title: " . $post->post_title . "\n";
echo "Status: " . $post->post_status . "\n";
echo "Content length: " . strlen($post->post_content) . " chars\n";
echo "Content (100 chars): " . substr($post->post_content, 0, 100) . "\n\n";

// Kiem tra wp_config
echo "=== WP CONFIG ===\n";
$wpconfig = file_get_contents('wordpress/wp-config.php');
preg_match("/define\s*\(\s*'WP_DEBUG'\s*,\s*(.*?)\s*\)/", $wpconfig, $m);
echo "WP_DEBUG: " . ($m[1] ?? 'not set') . "\n\n";

// Kiem tra theme active
echo "=== THEME ===\n";
echo "Active theme: " . get_option('stylesheet') . "\n";
echo "Template: " . get_option('template') . "\n\n";

// Kiem tra ham ton tai khong
echo "=== FUNCTIONS CHECK ===\n";
echo "cms_sports_first_cat exists: " . (function_exists('cms_sports_first_cat') ? 'YES' : 'NO') . "\n";
echo "cms_sports_cat_color exists: " . (function_exists('cms_sports_cat_color') ? 'YES' : 'NO') . "\n";
