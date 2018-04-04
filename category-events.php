<?php get_header(); ?>
<?php
// イベントが開催したかどうかを確認する
function isOpen($event)
{
    $today = new DateTime("now");
    
    // 開催したかを確認
    if ($today->format('c') < $event) {
        return '<span class="label label-primary margin-right-20">開催前</span>';
    } else if ($today->format('c') > $event) {
        return '<span class="label label-extra margin-right-20">開催終了</span>';
    }
}


// Connpass 検索用の関数定義
function searchConnpass($base_url)
{
    // UserAgent 情報をセットする
    $headers = array("User-Agent:Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36",);
    
    $curl = curl_init();
    
    curl_setopt($curl, CURLOPT_URL, $base_url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    
    $result = curl_exec($curl);
    curl_close($curl);
    
    return $result;
}
?>

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
				<?php echo $label[$i]; ?>
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
