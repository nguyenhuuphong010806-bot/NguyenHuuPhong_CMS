<?php get_header(); ?>

<!-- ===================== HERO SECTION ===================== -->
<section class="cms-hero">
  <div class="hero-inner">
    <!-- Left: Text + CTA -->
    <div class="hero-text">
      <div class="hero-tag">&#127942; The Thao Viet Nam</div>
      <h1 class="hero-title">Tin Tuc <span>The Thao</span><br>Moi Nhat 2025</h1>
      <p class="hero-desc">Cap nhat nhanh nhat Tennis, Football, Champions League, Premier League va nhieu giai dau dinh cao khac.</p>
      <div class="hero-btns">
        <a href="<?php echo home_url('/category/the-thao/'); ?>" class="btn-primary">Xem Bai Viet</a>
        <a href="<?php echo home_url('/category/football/'); ?>" class="btn-outline">Football &rarr;</a>
      </div>
      <!-- Stats -->
      <div class="hero-stats">
        <?php
        $stat_cats = ['Tennis'=>'tennis','Football'=>'football','Pic'=>'pic'];
        foreach ($stat_cats as $label => $slug) {
            $cat = get_term_by('slug', $slug, 'category');
            $cnt = $cat ? $cat->count : 0;
            echo "<div class='stat'><span class='stat-num'>$cnt</span><span class='stat-lbl'>$label</span></div>";
        }
        ?>
      </div>
    </div>

    <!-- Right: YouTube Intro Video -->
    <div class="hero-video">
      <div class="video-frame">
        <div class="video-label">&#9654; Highlights The Thao 2025</div>
        <div class="video-embed">
          <iframe
            src="https://www.youtube.com/embed/9lP9KBBIBvI?autoplay=0&rel=0&modestbranding=1"
            title="Tennis Highlights 2025"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen>
          </iframe>
        </div>
        <!-- Second mini video -->
        <div class="video-thumb-row">
          <a href="https://www.youtube.com/watch?v=Klp7P7qzCLU" target="_blank" class="video-thumb">
            <img src="https://img.youtube.com/vi/Klp7P7qzCLU/mqdefault.jpg" alt="Football Highlights">
            <span class="vt-play">&#9654;</span>
            <span class="vt-label">Football UCL</span>
          </a>
          <a href="https://www.youtube.com/watch?v=h-nMFMbhfhU" target="_blank" class="video-thumb">
            <img src="https://img.youtube.com/vi/h-nMFMbhfhU/mqdefault.jpg" alt="Premier League">
            <span class="vt-play">&#9654;</span>
            <span class="vt-label">Premier League</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===================== SPORT CATEGORY TABS ===================== -->
<div class="section-tabs-wrap">
  <div class="section-tabs">
    <?php
    $tabs = [
        'Tat Ca'    => home_url('/'),
        'Tennis'    => home_url('/category/tennis/'),
        'Football'  => home_url('/category/football/'),
        'Hinh Anh'  => home_url('/category/pic/'),
    ];
    $cur = (is_category('tennis')) ? 'Tennis' : ((is_category('football')) ? 'Football' : ((is_category('pic')) ? 'Hinh Anh' : 'Tat Ca'));
    foreach ($tabs as $label => $url):
        $cls = ($cur === $label) ? 'active' : '';
    ?>
    <a href="<?php echo $url; ?>" class="stab <?php echo $cls; ?>"><?php echo $label; ?></a>
    <?php endforeach; ?>
  </div>
</div>

<!-- ===================== POSTS GRID ===================== -->
<div class="site-container">
  <main class="content-area">
    <?php if (have_posts()): ?>
    <div class="posts-grid">
      <?php while (have_posts()): the_post();
        $first_cat = cms_sports_first_cat(get_the_ID());
        $cat_color = $first_cat ? cms_sports_cat_color($first_cat->slug) : '#2563eb';
      ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
        <div class="post-card-thumb">
          <a href="<?php the_permalink(); ?>">
            <?php if (has_post_thumbnail()):
              the_post_thumbnail('sports-card');
            else: ?>
              <div class="no-thumb-placeholder">
                <span>&#9917;</span>
              </div>
            <?php endif; ?>
          </a>
          <?php if ($first_cat): ?>
          <span class="floating-cat" style="background:<?php echo $cat_color; ?>">
            <?php echo strtoupper(esc_html($first_cat->name)); ?>
          </span>
          <?php endif; ?>
        </div>
        <div class="post-card-body">
          <div class="post-meta-bar">
            <span>&#128197; <?php the_date(); ?></span>
            <span>&#128100; <?php the_author(); ?></span>
          </div>
          <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <p class="post-excerpt"><?php the_excerpt(); ?></p>
          <a href="<?php the_permalink(); ?>" class="read-more">Doc tiep &rarr;</a>
        </div>
      </article>
      <?php endwhile; ?>
    </div>

    <div class="pagination">
      <?php echo paginate_links(['prev_text'=>'&laquo; Truoc','next_text'=>'Sau &raquo;']); ?>
    </div>

    <?php else: ?>
    <p style="text-align:center;color:#888;padding:60px;">Chua co bai viet nao.</p>
    <?php endif; ?>
  </main>

  <!-- ===================== SIDEBAR ===================== -->
  <aside class="sidebar-area">
    <!-- Hot Videos -->
    <div class="sidebar-widget">
      <h3>&#127909; Video Noi Bat</h3>
      <div class="sw-videos">
        <?php
        $yt_vids = [
            ['id'=>'9lP9KBBIBvI','title'=>'Wimbledon 2025 Highlights'],
            ['id'=>'Klp7P7qzCLU','title'=>'UCL Man City vs Real Madrid'],
            ['id'=>'h-nMFMbhfhU','title'=>'Premier League Goals'],
        ];
        foreach ($yt_vids as $v):
        ?>
        <a href="https://www.youtube.com/watch?v=<?php echo $v['id']; ?>" target="_blank" class="sw-video-item">
          <div class="sw-thumb">
            <img src="https://img.youtube.com/vi/<?php echo $v['id']; ?>/mqdefault.jpg" alt="<?php echo esc_attr($v['title']); ?>">
            <span class="sw-play">&#9654;</span>
          </div>
          <span class="sw-title"><?php echo esc_html($v['title']); ?></span>
        </a>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Categories -->
    <div class="sidebar-widget">
      <h3>&#128194; Danh Muc The Thao</h3>
      <ul>
        <?php
        $sport_slugs = ['the-thao','tennis','football','pic'];
        foreach ($sport_slugs as $slug) {
            $cat = get_term_by('slug', $slug, 'category');
            if (!$cat) continue;
            printf(
                '<li><a href="%s"><span>%s</span><span class="cat-count">%d</span></a></li>',
                get_category_link($cat->term_id),
                esc_html($cat->name),
                $cat->count
            );
        }
        ?>
      </ul>
    </div>

    <!-- Recent Posts -->
    <div class="sidebar-widget">
      <h3>&#128336; Bai Viet Moi Nhat</h3>
      <ul class="recent-posts">
        <?php
        $recent = get_posts(['category_name'=>'the-thao','posts_per_page'=>5]);
        foreach ($recent as $r):
        ?>
        <li>
          <?php if (has_post_thumbnail($r->ID)): ?>
          <a href="<?php echo get_permalink($r->ID); ?>" class="rp-thumb">
            <?php echo get_the_post_thumbnail($r->ID, [56,56]); ?>
          </a>
          <?php endif; ?>
          <a href="<?php echo get_permalink($r->ID); ?>" class="rp-title"><?php echo esc_html($r->post_title); ?></a>
        </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </aside>
</div>

<?php get_footer(); ?>
