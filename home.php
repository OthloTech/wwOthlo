<?php get_header(); ?>

<section id="top">
  <div class="mv-container"></div>
  <!-- ▼ event-container -->
  <div class="event-container gradient01">
    <div class="container">
      <h2 class="text-white margin-bottom-12"><span class="text-xxlarge text-strong margin-right-20">Event</span><span class="text-large">イベント</span></h2>
      <ul class="event-list overlay01">
        <li>
          <span class="label label-primary margin-right-20">開催前</span>
          <div class="display">
            <p><i class="far fa-calendar-alt margin-right-4"></i>2018/03/11(日) 13:00〜</p>
            <p class="text-large text-strong"><a href="#" target="_blank">プロトタイピングワークショップ@エイチーム<i class="fas fa-external-link-alt "></i></a></p>
          </div>
        </li>
        <li>
          <span class="label label-primary margin-right-20">開催前</span>
          <div class="display">
            <p><i class="far fa-calendar-alt margin-right-4"></i>2018/03/11(日) 13:00〜</p>
            <p class="text-large text-strong"><a href="#" target="_blank">プロトタイピングワークショップ@エイチーム<i class="fas fa-external-link-alt "></i></a></p>
          </div>
        </li>
        <li>
          <span class="label label-extra margin-right-20">開催終了</span>
          <div class="display">
            <p><i class="far fa-calendar-alt margin-right-4"></i>2018/03/11(日) 13:00〜</p>
            <p class="text-large text-strong"><a href="#" target="_blank">プロトタイピングワークショップ@エイチーム<i class="fas fa-external-link-alt "></i></a></p>
          </div>
        </li>
      </ul>
    </div>
  </div>
  <!-- ▲ event-container -->
  <!-- ▼ event-container -->
  <div class="blog-container">
    <div class="container">
      <h2 class="text-black"><span class="text-xxlarge text-strong margin-right-20">Blog</span><span class="text-large">ブログ</span></h2>
      <ul class="blog-list">
        <?php query_posts('cat=0&posts_per_page=3'); ?>
        <?php if ( have_posts() ) : ?>
        <?php while( have_posts() ) : the_post(); ?>
        <li class="card default">
          <a href="#">
            <div class="blog-box">
              <div class="thumb blog margin-right-20">
                <?php the_post_thumbnail('thumbnail'); ?>
              </div>
              <div>
                <p class="margin-bottom-4"><i class="far fa-calendar-alt margin-right-4"></i><?php the_date() ?></p>
                <p class="text-large margin-bottom-12 text-strong"><?php the_title(); ?></p>
                <p><?php the_excerpt(); ?></p>
              </div>
            </div>
          </a>
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
  <!-- ▼ about-container -->
  <div class="about-container">
    <div class="container">
      <h3 class="othlo-logo white-logo text-center"><span class="text-xxxlarge margin-right-20 text-center"><span class="before">Othlo</span><span class="after">Tech</span></span>とは</h3>
      <p class="about-lead text-white margin-bottom-40">OthloTech(オスロテック)は「名古屋にクリエイティブな学生のコミュニティを作ろう」という思いから、2016年5月に立ち上がりました。<br />
      <br />
      OthloTechでは、IT系とデザイン系の学生向けの勉強会を月に1〜2回開いています。<br />
      </p>

      <div class="about-btn btn-container twin">
        <div class="btn white margin-0-auto">
          <a>もっとみる</a>
        </div>
        <div class="btn white margin-0-auto">
          <a>もっとみる</a>
        </div>
      </div>
    </div>
  </div>
  <!-- ▲ about-container -->
</section>

<?php get_footer(); ?>
