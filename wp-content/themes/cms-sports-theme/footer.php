<?php wp_footer(); ?>

<!-- ==================== (3) MODULE FOOTER (Bootsnipp r1XdE) ==================== -->
<footer id="site-footer" class="bootsnipp-footer">
  <div class="footer-container">
    <div class="footer-row">

      <!-- Column 1: Last posts (Bai viet moi nhat tu DB) -->
      <div class="footer-col">
        <h5 class="footer-heading"><span class="heading-bar">|</span> Last posts</h5>
        <ul class="footer-link-list">
          <?php
          $recent_posts = wp_get_recent_posts(['numberposts' => 5, 'post_status' => 'publish']);
          if (!empty($recent_posts)) {
              foreach ($recent_posts as $post_item) {
                  echo '<li><a href="' . esc_url(get_permalink($post_item['ID'])) . '"><i class="fa fa-angle-double-right"></i> ' . esc_html(wp_trim_words($post_item['post_title'], 6, '...')) . '</a></li>';
              }
          } else {
              echo '<li><a href="' . esc_url(home_url('/')) . '"><i class="fa fa-angle-double-right"></i> Home</a></li>';
              echo '<li><a href="#"><i class="fa fa-angle-double-right"></i> About</a></li>';
              echo '<li><a href="#"><i class="fa fa-angle-double-right"></i> FAQ</a></li>';
              echo '<li><a href="#"><i class="fa fa-angle-double-right"></i> Get Started</a></li>';
              echo '<li><a href="#"><i class="fa fa-angle-double-right"></i> Videos</a></li>';
          }
          ?>
        </ul>
      </div>

      <!-- Column 2: Categories (Chuyen muc tu DB) -->
      <div class="footer-col">
        <h5 class="footer-heading"><span class="heading-bar">|</span> Categories</h5>
        <ul class="footer-link-list">
          <?php
          $categories = get_categories(['number' => 5, 'hide_empty' => 0]);
          if (!empty($categories)) {
              foreach ($categories as $cat) {
                  echo '<li><a href="' . esc_url(get_category_link($cat->term_id)) . '"><i class="fa fa-angle-double-right"></i> ' . esc_html($cat->name) . '</a></li>';
              }
          } else {
              echo '<li><a href="#"><i class="fa fa-angle-double-right"></i> Home</a></li>';
              echo '<li><a href="#"><i class="fa fa-angle-double-right"></i> About</a></li>';
              echo '<li><a href="#"><i class="fa fa-angle-double-right"></i> FAQ</a></li>';
              echo '<li><a href="#"><i class="fa fa-angle-double-right"></i> Get Started</a></li>';
              echo '<li><a href="#"><i class="fa fa-angle-double-right"></i> Videos</a></li>';
          }
          ?>
        </ul>
      </div>

      <!-- Column 3: Comments (Binh luan moi tu DB) -->
      <div class="footer-col">
        <h5 class="footer-heading"><span class="heading-bar">|</span> Comments</h5>
        <ul class="footer-link-list">
          <?php
          $comments = get_comments(['number' => 5, 'status' => 'approve']);
          if (!empty($comments)) {
              foreach ($comments as $comment) {
                  $comment_author = !empty($comment->comment_author) ? $comment->comment_author : 'Thành viên';
                  $comment_snippet = wp_trim_words($comment->comment_content, 5, '...');
                  echo '<li><a href="' . esc_url(get_comment_link($comment)) . '"><i class="fa fa-angle-double-right"></i> ' . esc_html($comment_author . ': ' . $comment_snippet) . '</a></li>';
              }
          } else {
              // Fallback links if comments empty
              echo '<li><a href="' . esc_url(home_url('/')) . '"><i class="fa fa-angle-double-right"></i> Home</a></li>';
              echo '<li><a href="#"><i class="fa fa-angle-double-right"></i> About</a></li>';
              echo '<li><a href="#"><i class="fa fa-angle-double-right"></i> FAQ</a></li>';
              echo '<li><a href="#"><i class="fa fa-angle-double-right"></i> Get Started</a></li>';
              echo '<li><a href="#"><i class="fa fa-angle-double-right"></i> Imprint</a></li>';
          }
          ?>
        </ul>
      </div>

    </div>

    <!-- Social Icons -->
    <div class="footer-social-row">
      <ul class="footer-social-icons">
        <li><a href="https://facebook.com" target="_blank" rel="noopener" aria-label="Facebook"><i class="fa fa-facebook"></i></a></li>
        <li><a href="https://twitter.com" target="_blank" rel="noopener" aria-label="Twitter"><i class="fa fa-twitter"></i></a></li>
        <li><a href="https://instagram.com" target="_blank" rel="noopener" aria-label="Instagram"><i class="fa fa-instagram"></i></a></li>
        <li><a href="https://plus.google.com" target="_blank" rel="noopener" aria-label="Google Plus"><i class="fa fa-google-plus"></i></a></li>
        <li><a href="mailto:contact@example.com" aria-label="Email"><i class="fa fa-envelope"></i></a></li>
      </ul>
    </div>

    <!-- Legal & Copyright -->
    <div class="footer-bottom">
      <p class="footer-legal">
        <u><a href="#">National Transaction Corporation</a></u> is a Registered MSP/ISO of Elavon, Inc. Georgia [a wholly owned subsidiary of U.S. Bancorp, Minneapolis, MN]
      </p>
      <p class="footer-copyright">
        &copy; All right Reversed. <a href="https://sunlimetech.com" target="_blank" rel="noopener">Sunlimetech</a>
      </p>
    </div>

  </div>
</footer>

</body>
</html>
