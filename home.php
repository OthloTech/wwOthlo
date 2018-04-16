<?php get_header(); ?>
<?php
// API 用のURL
$base_url = "https://connpass.com/api/v1/event/?series_id=2131&order=2";

// Connpass 検索用の関数「searchConnpass」にエンドポイントを引き渡し、返り値を取得
$response = searchConnpass($base_url);
$data = json_decode($response, true) ;

$week = array("(日)", "(月)", "(火)", "(水)", "(木)", "(金)", "(土)");

// イベントが開催したかどうかを確認する
function isOpen($event)
{
    $today = new DateTime("now");

    // 開催したかを確認
    if ($today->format('c') < $event) {
        return '<span class="label label-primary margin-right-20">開催前</span>';
    } else if ($today->format('c') > $event) {
        return '<span class="label label-extra margin-right-20">開催</br class="is-sp">終了</span>';
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
		  	// 月日
		  	$event_time = date('Y/m/d', $event_str);
		  	// 曜日
        $event_day = $week[date('w', $event_str)];
        date_default_timezone_set( 'Asia/Tokyo' );
        $time = date('H:i~', $event_str);

			  $label[$i] = isOpen($data["events"][$i]["started_at"]);
		  ?>
			<li>
				<?php echo $label[$i]; ?>
				<div class="display">
          <a href="<?php the_permalink() ?>" target="_blank">
  					<p><?php echo $event_time . $event_day . $time; ?></p>
  					<p class="text-large text-strong"><?php echo $data["events"][$i]["title"]; ?></p>
            <i class="fas fa-external-link-alt "></i>
          </a>
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
      <h2 class="text-black"><span class="text-xxlarge text-strong margin-right-20">Blog</span><span class="text-large">ブログ</span></h2>
      <ul class="blog-list">
        <?php query_posts('cat=0&posts_per_page=3'); ?>
        <?php if ( have_posts() ) : ?>
        <?php while( have_posts() ) : the_post(); ?>
        <li class="card default">
          <a href="<?php the_permalink() ?>">
            <div class="blog-box">
              <div class="thumb blog left">
                <?php the_post_thumbnail('thumbnail'); ?>
              </div>
              <div class="right">
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
