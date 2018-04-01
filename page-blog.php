<?php get_header(); ?>

<section id="top">
  <div class="mv-container"></div>
  <!-- ▼ event-container -->
  <div class="blog-container">
    <div class="container">
      <h2 class="text-black"><span class="text-xxlarge text-strong margin-right-20">Blog</span><span class="text-large">ブログ</span></h2>
      <ul class="blog-list">
        <?php query_posts('cat=1'); ?>
        <?php if ( have_posts() ) : ?>
        <?php while( have_posts() ) : the_post(); ?>
        <li class="card default">
          <div class="thumb blog margin-right-20">
            <?php the_post_thumbnail('thumbnail'); ?>
          </div>
          <div>
            <p class="margin-bottom-4"><?php the_date() ?></p>
            <p class="text-large margin-bottom-12 text-strong"><?php the_title(); ?></p>
            <p><?php the_excerpt(); ?></p>
          </div>
        </li>
        <?php endwhile;?>
        <?php else : ?>
          <p>記事がありません。</p>
        <?php endif; ?>
      </ul>
      <div class="btn default margin-0-auto">
        <a href="/blog">もっとみる</a>
      </div>
    </div>
  </div>
  <!-- ▲ event-container -->
</section>

<?php get_footer(); ?>
