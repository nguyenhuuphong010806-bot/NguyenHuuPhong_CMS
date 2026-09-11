<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header id="site-header">
  <div class="header-inner">

    <!-- LOGO / BRAND -->
    <div class="site-branding">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="brand-link">
        <span class="brand-icon">&#9917;</span>
        <span class="brand-text">CMS <span class="brand-accent">Sports</span></span>
      </a>
    </div>

    <!-- PRIMARY NAV — chi hien thi cac danh muc the thao -->
    <nav id="primary-nav" aria-label="Menu chinh">
      <ul>
        <li <?php if(is_front_page()&&!is_category()) echo 'class="active"'; ?>>
          <a href="<?php echo esc_url(home_url('/')); ?>">Trang Chu</a>
        </li>
        <?php
        $sport_slugs = ['the-thao','tennis','football','pic'];
        foreach ($sport_slugs as $slug) {
            $cat = get_term_by('slug', $slug, 'category');
            if (!$cat) continue;
            $is_active = is_category($cat->term_id) ? 'class="active"' : '';
            printf(
                '<li %s><a href="%s">%s</a></li>',
                $is_active,
                esc_url(get_category_link($cat->term_id)),
                esc_html($cat->name)
            );
        }
        ?>
      </ul>
    </nav>

    <!-- HAMBURGER (mobile) -->
    <button class="nav-toggle" aria-label="Mo menu" onclick="document.getElementById('primary-nav').classList.toggle('open')">
      <span></span><span></span><span></span>
    </button>

  </div>
</header>
