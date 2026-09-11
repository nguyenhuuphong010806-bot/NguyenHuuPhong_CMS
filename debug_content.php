<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('wordpress/wp-load.php');

query_posts('p=91&post_type=post');

echo "have_posts: " . (have_posts() ? 'YES' : 'NO') . "\n";

if (have_posts()) {
    while (have_posts()): the_post();
        echo "Post ID: " . get_the_ID() . "\n";
        echo "Title: " . get_the_title() . "\n";
        
        ob_start();
        the_content();
        $out = ob_get_clean();
        
        echo "the_content() length: " . strlen($out) . "\n";
        if (strlen($out) > 0) {
            echo "First 500 chars:\n" . substr($out, 0, 500) . "\n";
        } else {
            echo "CONTENT IS EMPTY!\n";
            // Check raw content
            $raw = get_the_content();
            echo "Raw content length: " . strlen($raw) . "\n";
            echo "Raw first 200: " . substr($raw, 0, 200) . "\n";
        }
    endwhile;
}
wp_reset_query();
