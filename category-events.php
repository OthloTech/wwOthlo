<?php get_header(); ?>

<section id="top">
  <div class="mv-container"></div>
  <!-- ▼ event-container -->
  <div class="event-container gradient01">
    <div class="container">
      <h2 class="text-white margin-bottom-12"><span class="text-xxlarge text-strong margin-right-20">Event</span><span class="text-large">イベント</span></h2>
      <ul class="event-list overlay01">
	  	<?php $i = 0; ?>
		  <?php while ($i < 3) : ?>
		  <?php
		  	$event_str = strtotime($data["events"][$i]["started_at"]);
		  	// 日時
		  	$event_time = date('Y/m/d', $event_str);
		  	// 曜日
		  	$event_day = $week[date('w', $event_str)];

			  $label[$i] = isOpen($data["events"][$i]["started_at"]);
		  ?>
			<li>
				<span class="label label-primary margin-right-20"><?php echo $label[$i]; ?></span>
				<div class="display">
					<p><?php echo $event_time . $event_day; ?></p>
					<p class="text-large text-strong"><?php echo $data["events"][$i]["title"]; ?></p>
				</div>
			</li>
		<?php $i++; ?>
		<?php endwhile; ?>
      </ul>
    </div>
  </div>
  <!-- ▲ event-container -->
  <!-- ▼ event-container -->
  <div class="blog-container">
    <div class="container">
      <h2 class="text-black"><span class="text-xxlarge text-strong margin-right-20">Event reports</span><span class="text-large">イベントレポート</span></h2>
      <ul class="blog-list">
        <?php query_posts('category_name=events'); ?>
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
