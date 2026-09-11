<?php
require_once('wordpress/wp-load.php');

echo "=== KICH HOAT PLUGIN va THEME ===\n\n";

// Activate Plugin: cms-sports
$plugin_file = 'cms-sports/cms-sports.php';
$active_plugins = get_option('active_plugins', []);

if (!in_array($plugin_file, $active_plugins)) {
    $active_plugins[] = $plugin_file;
    update_option('active_plugins', $active_plugins);
    echo "Plugin 'CMS Sports' da duoc kich hoat!\n";
} else {
    echo "Plugin 'CMS Sports' da o trang thai active.\n";
}

// Switch Theme: cms-sports-theme
$current_theme = get_option('stylesheet');
if ($current_theme !== 'cms-sports-theme') {
    switch_theme('cms-sports-theme');
    echo "Theme 'CMS Sports Theme' da duoc bat.\n";
} else {
    echo "Theme 'CMS Sports Theme' dang duoc su dung.\n";
}

// Verify
echo "\n--- Xac nhan ---\n";
echo "Theme hien tai: " . get_option('stylesheet') . "\n";
$ap = get_option('active_plugins', []);
echo "Plugin active:\n";
foreach ($ap as $p) echo "  - $p\n";
