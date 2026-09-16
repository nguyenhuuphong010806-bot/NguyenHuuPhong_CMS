<?php if (!defined("ABSPATH")) { header("Location: " . (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] === "on" ? "https" : "http") . "://" . $_SERVER["HTTP_HOST"] . preg_replace("#/wp-content/themes/.*#", "/", $_SERVER["REQUEST_URI"])); exit; } ?>
<?php get_header(); ?>

<div class="site-container fit-content-wrapper">
  <main class="content-area fit-main-content">
    <h1 class="fit-archive-title">
      <?php echo esc_html(single_cat_title('', false)); ?>
    </h1>

    <?php if (have_posts()): ?>
      <div class="fit-posts-list">
        <?php while (have_posts()): the_post(); ?>
          <article id="post-<?php the_ID(); ?>" <?php post_class('fit-post-item'); ?>>
            
            <div class="fit-date-box">
              <span class="fit-day"><?php echo get_the_date('d'); ?></span>
              <span class="fit-month"><?php echo 'THÁNG ' . get_the_date('m'); ?></span>
            </div>

            <div class="fit-content">
              <h2 class="fit-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h2>
              <div class="fit-excerpt">
                <?php echo esc_html(wp_strip_all_tags(get_the_excerpt())); ?>
              </div>
            </div>

          </article>
        <?php endwhile; ?>
      </div>

      <div class="fit-pagination">
        <?php echo paginate_links([
            'prev_text' => '&laquo; Trước',
            'next_text' => 'Sau &raquo;',
        ]); ?>
      </div>

    <?php else: ?>
      <p class="no-posts-text">Chưa có bài viết trong danh mục này.</p>
    <?php endif; ?>
  </main>
</div>

<?php get_footer(); ?>
