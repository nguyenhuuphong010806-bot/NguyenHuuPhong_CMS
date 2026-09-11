<?php get_header(); ?>
<div class="site-container">
    <main class="content-area">
        <h1 style="font-size:22px;font-weight:800;margin-bottom:20px;color:#1e3a5f;border-left:4px solid #2563eb;padding-left:14px;">
            <?php echo esc_html(single_cat_title('', false)); ?>
        </h1>
        <?php if (have_posts()): ?>
        <div class="posts-grid">
        <?php while (have_posts()): the_post();
            $first_cat = cms_sports_first_cat(get_the_ID());
            $cat_color = $first_cat ? cms_sports_cat_color($first_cat->slug) : '#2563eb';
        ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
                <?php if (has_post_thumbnail()): ?>
                <div class="post-card-thumb">
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('sports-card'); ?></a>
                </div>
                <?php endif; ?>
                <div class="post-card-body">
                    <?php if ($first_cat): ?>
                    <span class="post-cat-badge" style="background:<?php echo $cat_color; ?>22;color:<?php echo $cat_color; ?>;">
                        <?php echo esc_html($first_cat->name); ?>
                    </span>
                    <?php endif; ?>
                    <div class="post-meta-bar"><span><?php the_date(); ?></span></div>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <p class="post-excerpt"><?php the_excerpt(); ?></p>
                    <a href="<?php the_permalink(); ?>" class="read-more">Doc tiep &rarr;</a>
                </div>
            </article>
        <?php endwhile; ?>
        </div>
        <div class="pagination"><?php echo paginate_links(['prev_text'=>'&laquo;','next_text'=>'&raquo;']); ?></div>
        <?php else: ?>
        <p style="color:#888;">Chua co bai viet trong danh muc nay.</p>
        <?php endif; ?>
    </main>
    <aside class="sidebar-area">
        <div class="sidebar-widget">
            <h3>Danh Muc</h3>
            <ul>
            <?php $cats = get_categories(['hide_empty'=>false]);
            foreach ($cats as $c): ?>
            <li><a href="<?php echo get_category_link($c->term_id); ?>"><?php echo esc_html($c->name); ?> (<?php echo $c->count; ?>)</a></li>
            <?php endforeach; ?>
            </ul>
        </div>
    </aside>
</div>
<?php get_footer();
