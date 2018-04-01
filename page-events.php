<?php get_header(); ?>

<section id="top">
  <div class="mv-container"></div>
  <!-- ▼ event-container -->
  <div class="event-container gradient01">
    <div class="container">
      <h2 class="text-white margin-bottom-12"><span class="text-xxlarge text-strong margin-right-20">Upcoming events</span><span class="text-large">今後のイベント</span></h2>
      <ul class="event-list overlay01">
        <li>
          <span class="label label-primary margin-right-20">開催前</span>
          <div class="display">
            <p>2018/03/11(日) 13:00〜</p>
            <p class="text-large text-strong">プロトタイピングワークショップ@エイチーム</p>
          </div>
        </li>
        <li>
          <span class="label label-primary margin-right-20">開催前</span>
          <div class="display">
            <p>2018/03/11(日) 13:00〜</p>
            <p class="text-large text-strong">プロトタイピングワークショップ@エイチーム</p>
          </div>
        </li>
        <li>
          <span class="label label-extra margin-right-20">開催終了</span>
          <div class="display">
            <p>2018/03/11(日) 13:00〜</p>
            <p class="text-large text-strong">プロトタイピングワークショップ@エイチーム</p>
          </div>
        </li>
      </ul>
    </div>
  </div>
  <!-- ▲ event-container -->
  <!-- ▼ event-container -->
  <div class="blog-container">
    <div class="container">
      <h2 class="text-black"><span class="text-xxlarge text-strong margin-right-20">Event reports</span><span class="text-large">イベントレポート</span></h2>
      <ul class="blog-list">
        <?php query_posts('cat=2'); ?>
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
