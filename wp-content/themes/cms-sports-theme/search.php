<?php if (!defined("ABSPATH")) { header("Location: " . (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] === "on" ? "https" : "http") . "://" . $_SERVER["HTTP_HOST"] . preg_replace("#/wp-content/themes/.*#", "/", $_SERVER["REQUEST_URI"])); exit; } ?>
<?php get_header(); ?>

<!-- ==================== (4) MODULE SEARCH (Bootsnipp 35V6b) ==================== -->
<div class="site-container search-page-container">

  <!-- Search Header & Title -->
  <div class="search-header-block">
    <h1 class="search-hero-title">
      <span class="search-label-red">Search:</span> <span class="search-term-quotes">"<?php echo esc_html(get_search_query()); ?>"</span>
    </h1>

    <?php if (have_posts()): ?>
      <p class="search-lead-text">
        Found <?php echo (int)$wp_query->found_posts; ?> results for your search. You can search again through the search form below.
      </p>
    <?php else: ?>
      <p class="search-lead-text">
        We could not find any results for your search. You can give it another try through the search form below.
      </p>
    <?php endif; ?>
  </div>

  <!-- Bootsnipp 35V6b Search Form Card -->
  <div class="search-card-wrap">
    <form role="search" method="get" class="bootsnipp-search-form" action="<?php echo esc_url(home_url('/')); ?>">
      <div class="search-input-group">
        <span class="search-icon-inside"><i class="fa fa-search"></i></span>
        <input 
          type="search" 
          class="bootsnipp-search-field" 
          placeholder="Search topics or keywords" 
          value="<?php echo esc_attr(get_search_query()); ?>" 
          name="s" 
          required
        >
        <button type="submit" class="bootsnipp-search-btn">Search</button>
      </div>
    </form>
  </div>

  <!-- Search Results (FIT-TDC Style if posts exist) -->
  <?php if (have_posts()): ?>
    <div class="fit-posts-list search-results-list">
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
  <?php endif; ?>

</div>

<?php get_footer(); ?>
