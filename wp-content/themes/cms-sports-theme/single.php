<?php if (!defined("ABSPATH")) { header("Location: " . (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] === "on" ? "https" : "http") . "://" . $_SERVER["HTTP_HOST"] . preg_replace("#/wp-content/themes/.*#", "/", $_SERVER["REQUEST_URI"])); exit; } ?>
<?php get_header(); ?>

<div class="site-container">

  <!-- MAIN POST CONTENT -->
  <main class="content-area">
  <?php while (have_posts()): the_post();
    $cats = get_the_category();
    $cat  = !empty($cats) ? $cats[0] : null;
    $cmap = ['tennis'=>'#16a34a','football'=>'#dc2626','pic'=>'#d97706','the-thao'=>'#2563eb'];
    $cc   = ($cat && isset($cmap[$cat->slug])) ? $cmap[$cat->slug] : '#2563eb';
  ?>

    <article <?php post_class('single-post-wrap'); ?>>

      <!-- Breadcrumb -->
      <nav style="font-size:13px;color:#94a3b8;margin-bottom:18px;display:flex;gap:6px;flex-wrap:wrap;">
        <a href="<?php echo home_url('/'); ?>" style="color:#2563eb;">Trang Chu</a>
        <span>&rsaquo;</span>
        <?php if ($cat): ?>
        <a href="<?php echo get_category_link($cat->term_id); ?>" style="color:#2563eb;"><?php echo esc_html($cat->name); ?></a>
        <span>&rsaquo;</span>
        <?php endif; ?>
        <span><?php echo wp_trim_words(get_the_title(), 6); ?></span>
      </nav>

      <!-- Cat badge + Title -->
      <?php if ($cat): ?>
      <a href="<?php echo get_category_link($cat->term_id); ?>"
         style="display:inline-block;background:<?php echo $cc; ?>;color:#fff;font-size:11px;font-weight:800;letter-spacing:.8px;padding:4px 12px;border-radius:20px;margin-bottom:14px;text-transform:uppercase;text-decoration:none;">
        <?php echo esc_html($cat->name); ?>
      </a>
      <?php endif; ?>

      <h1 style="font-size:28px;font-weight:900;line-height:1.25;color:#0f172a;margin-bottom:14px;"><?php the_title(); ?></h1>

      <!-- Meta -->
      <div style="display:flex;flex-wrap:wrap;gap:16px;font-size:13px;color:#64748b;margin-bottom:22px;padding-bottom:16px;border-bottom:1px solid #f1f5f9;">
        <span>&#128197; <?php the_date('d/m/Y'); ?></span>
        <span>&#128100; <?php the_author(); ?></span>
      </div>

      <!-- Featured image -->
      <?php if (has_post_thumbnail()): ?>
      <div style="margin-bottom:28px;">
        <?php the_post_thumbnail('large', ['style'=>'width:100%;border-radius:12px;max-height:460px;object-fit:cover;box-shadow:0 4px 20px rgba(0,0,0,.1);']); ?>
      </div>
      <?php endif; ?>

      <!-- Content -->
      <div class="post-content">
        <?php the_content(); ?>
      </div>

      <!-- Tags -->
      <?php $tags = get_the_tags(); if ($tags): ?>
      <div style="margin-top:24px;padding-top:20px;border-top:1px solid #f1f5f9;display:flex;flex-wrap:wrap;gap:8px;align-items:center;">
        <strong style="font-size:13px;color:#475569;">Tags:</strong>
        <?php foreach ($tags as $tag): ?>
        <a href="<?php echo get_tag_link($tag->term_id); ?>"
           style="background:#f1f5f9;color:#475569;font-size:12px;font-weight:600;padding:5px 12px;border-radius:20px;text-decoration:none;">
          #<?php echo esc_html($tag->name); ?>
        </a>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>

      <!-- Prev/Next nav -->
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-top:32px;">
        <?php
        $prev = get_previous_post();
        $next = get_next_post();
        ?>
        <?php if ($prev): ?>
        <a href="<?php echo get_permalink($prev->ID); ?>"
           style="display:flex;flex-direction:column;gap:4px;background:#fff;border:1px solid #e2e8f0;border-radius:10px;padding:14px 16px;text-decoration:none;transition:border-color .2s;">
          <span style="font-size:12px;color:#94a3b8;font-weight:600;">&larr; Bai Truoc</span>
          <span style="font-size:13px;color:#1e2a3a;font-weight:700;line-height:1.4;"><?php echo esc_html(wp_trim_words($prev->post_title, 7)); ?></span>
        </a>
        <?php else: ?><span></span><?php endif; ?>

        <?php if ($next): ?>
        <a href="<?php echo get_permalink($next->ID); ?>"
           style="display:flex;flex-direction:column;gap:4px;background:#fff;border:1px solid #e2e8f0;border-radius:10px;padding:14px 16px;text-decoration:none;text-align:right;">
          <span style="font-size:12px;color:#94a3b8;font-weight:600;">Bai Sau &rarr;</span>
          <span style="font-size:13px;color:#1e2a3a;font-weight:700;line-height:1.4;"><?php echo esc_html(wp_trim_words($next->post_title, 7)); ?></span>
        </a>
        <?php endif; ?>
      </div>

    </article>

  <?php endwhile; ?>
  </main>

  <!-- SIDEBAR -->
  <aside class="sidebar-area">

    <div class="sidebar-widget">
      <h3>&#128214; Bai Lien Quan</h3>
      <ul class="recent-posts">
      <?php
      $cur_cats = wp_get_post_categories(get_the_ID());
      $related = get_posts([
          'category__in'   => $cur_cats ?: [34],
          'exclude'        => [get_the_ID()],
          'posts_per_page' => 5,
          'post_status'    => 'publish',
      ]);
      foreach ($related as $r):
      ?>
      <li style="display:flex;gap:10px;align-items:flex-start;padding:8px 0;border-bottom:1px solid #f1f5f9;">
        <?php if (has_post_thumbnail($r->ID)): ?>
        <a href="<?php echo get_permalink($r->ID); ?>" style="flex-shrink:0;">
          <?php echo get_the_post_thumbnail($r->ID, [60,60],
            ['style'=>'width:60px;height:60px;object-fit:cover;border-radius:6px;display:block;']); ?>
        </a>
        <?php endif; ?>
        <a href="<?php echo get_permalink($r->ID); ?>"
           style="font-size:12px;font-weight:600;color:#334155;line-height:1.45;text-decoration:none;">
          <?php echo esc_html(wp_trim_words($r->post_title, 8)); ?>
        </a>
      </li>
      <?php endforeach; ?>
      </ul>
    </div>

    <div class="sidebar-widget">
      <h3>&#128194; Danh Muc</h3>
      <ul>
      <?php foreach (['the-thao','tennis','football','pic'] as $sl):
        $c = get_term_by('slug', $sl, 'category');
        if (!$c) continue; ?>
      <li>
        <a href="<?php echo get_category_link($c->term_id); ?>">
          <span><?php echo esc_html($c->name); ?></span>
          <span class="cat-count"><?php echo $c->count; ?></span>
        </a>
      </li>
      <?php endforeach; ?>
      </ul>
    </div>

    <div class="sidebar-widget">
      <h3>&#127909; Video The Thao</h3>
      <?php
      $vids = [
          ['id'=>'9lP9KBBIBvI', 'title'=>'Wimbledon 2025 Highlights'],
          ['id'=>'Klp7P7qzCLU', 'title'=>'UCL Man City vs Real Madrid'],
          ['id'=>'h-nMFMbhfhU', 'title'=>'Premier League Goals'],
      ];
      foreach ($vids as $v): ?>
      <a href="https://www.youtube.com/watch?v=<?php echo $v['id']; ?>"
         target="_blank"
         style="display:flex;gap:10px;align-items:center;text-decoration:none;margin-bottom:12px;">
        <div style="flex-shrink:0;width:88px;height:54px;border-radius:6px;overflow:hidden;background:#1e3a5f;position:relative;">
          <img src="https://img.youtube.com/vi/<?php echo $v['id']; ?>/mqdefault.jpg"
               alt="<?php echo esc_attr($v['title']); ?>"
               width="88" height="54"
               style="width:88px;height:54px;object-fit:cover;display:block;"
               onerror="this.parentNode.style.background='#1e3a5f'">
          <span style="position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);color:#fff;font-size:16px;pointer-events:none;">&#9654;</span>
        </div>
        <span style="font-size:12px;font-weight:600;color:#334155;line-height:1.45;"><?php echo esc_html($v['title']); ?></span>
      </a>
      <?php endforeach; ?>
    </div>

  </aside>
</div>

<style>
/* Responsive YouTube embeds inside post content */
.post-content .wp-has-aspect-ratio { max-width:100%; }
.post-content iframe {
    width: 100% !important;
    max-width: 100%;
    border-radius: 10px;
    margin: 20px 0;
    display: block;
    aspect-ratio: 16/9;
    height: auto !important;
}
.post-content figure { margin: 22px 0; }
.post-content figcaption { text-align:center;color:#94a3b8;font-size:13px;margin-top:6px;font-style:italic; }
.post-content p { margin-bottom: 18px; }
.post-content h2 { font-size:20px;font-weight:700;color:#1e3a5f;margin:28px 0 12px;padding-left:12px;border-left:4px solid #2563eb; }
.post-content img { border-radius:10px;margin:16px 0;width:100%;display:block; }
</style>

<?php get_footer(); ?>

