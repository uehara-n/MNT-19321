<?php
/**
* Template Name:フロントページ
*
* @package Wordpress
* @subpackage ing
* @since 1.0.0
*/
get_header(); ?>
<?php
$after_image = get_field('after-image');
if(!empty($after_image)){
    $after_image_size = 'medium'; //出力サイズを変数に格納
    $after_image_thumb = $after_image['sizes'][ $after_image_size ]; //サムネイル画像のURL
}
?>

  <div class="carousel-wrap">
  <!-- スライダー -->
  <div class="slider carousel">
    <div class="slide-item">
      <a href="<?php echo home_url(); ?>/raiten/"><img src="<?php echo get_template_directory_uri(); ?>/img/carousel/main1.png" class="fit" alt="リフォーム相談会開催"></a>
    </div>
    <div class="slide-item">
      <img src="<?php echo get_template_directory_uri(); ?>/img/carousel/main2.png" class="fit" alt="理想の住まい一緒に見つける">
    </div>
    <div class="slide-item">
      <img src="<?php echo get_template_directory_uri(); ?>/img/carousel/main3.png" class="fit" alt="リノベーションを通じてお客様の幸せを実現する">
    </div>
    <div class="slide-item">
      <img src="<?php echo get_template_directory_uri(); ?>/img/carousel/main4.png" class="fit" alt="石川の気候風土に合わせた住まいづくり">
    </div>
  </div>
  <div class="arrow">
    <div class="slick-next"></div>
    <div class="slick-prev"></div>
  </div>
</div>
<div class="ptb90">
	<div class="centering mb135">
    <p class="sp-none"><a href="<?php echo home_url(); ?>/contact/"><img src="<?php echo get_template_directory_uri(); ?>/img/top/top1.png" alt="お気軽でのご相談満足度100％を目指します！"></a></p>
    <p class="pc-none"><a href="tel:05075860452"><img src="<?php echo get_template_directory_uri(); ?>/img/top/top1-sp.png" class="fit" alt="タップでお電話がすぐにかけられます"></a></p>
    <p class="sp-none"><a href="<?php echo home_url(); ?>/raiten/"><img src="<?php echo get_template_directory_uri(); ?>/img/top/top2.png" class="mt20" alt="ネットでご来店予約"></a></p>
  </div>
  <!-- イベント情報・最新情報 -->
  <section class="section bg3">
    <div class="centering">
      <div class="info-row">
        <!-- イベント情報 -->
        <div class="info-col">
          <h2 class="heading-top"><img class="sp-fit" src="<?php echo get_template_directory_uri(); ?>/img/top/heading-event.png" alt="イベント情報"></h2>
          <div class="event">
          <?php
            $args = array(
            'post_type' => 'event',
            'posts_per_page' => 2,
            );
            $domestic_post = get_posts($args);
            if($domestic_post) : foreach($domestic_post as $post) : setup_postdata( $post ); ?>
                      <!--ループ-->
        <a href="<?php the_permalink() ?>">
          <div class="event-top">
              <div class="image">
                  <p>
                    <?php
            $image = get_field('main_pic');
            $size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)
            if( $image ) {
                echo wp_get_attachment_image( $image, $size );
            }
            ?></p>
              </div>
              <div class="date">
                <h3><?php echo mb_substr( $post->post_title, 0, 30) . '...'; ?></h3>
                <p><?php $text = mb_substr(get_field('main_pic_alt'),0,20,'utf-8'); echo $text.'...'; ?></p>
                <p class="event-date"><span>開催期間</span><?php the_field('advancedate'); ?></p>
              </div>
          </div>
        </a>
      <?php endforeach; ?>
    <?php endif;
    wp_reset_postdata(); ?>
        </div>
          <!-- 一覧を見る -->
          <p class="sp-none center">
            <a href="<?php echo home_url(); ?>/event/"><img src="<?php echo get_template_directory_uri(); ?>/img/top/btn-list.png" alt="一覧を見る"></a>
          </p>
          <p class="pc-none center">
            <a href="<?php echo home_url(); ?>/event/"><img src="<?php echo get_template_directory_uri(); ?>/img/top/btn-list-sp.png" class="fit" alt="一覧を見る"></a>
          </p>
        </div>
        <!-- 最新情報 -->
        <div class="info-col">
          <h2 class="heading-top"><img class="sp-fit" src="<?php echo get_template_directory_uri(); ?>/img/top/heading-news.png" alt="最新情報"></h2>
          <dl class="news">
            <?php $args = array(
              'post_type' => 'news',
              'posts_per_page' => 1,
            ); ?>
            <?php $my_query = new WP_Query( $args ); ?>
            <?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
            <!--ループ-->
            <dt><?php the_time('Y年m月d日'); ?></dt>
            <dd><?php the_title(); ?></dd>
            <a href="<?php the_field('url'); ?>"></a>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
          </dl>

            <?php $args = array(
              'post_type' => 'renovation',
              'posts_per_page' => 1,
            ); ?>
            <?php $my_query = new WP_Query( $args ); ?>
            <?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
          <dl class="news">
            <!--ループ-->
            <dt><?php the_time('Y年m月d日'); ?></dt>
            <dd><?php the_title(); ?></dd>
            <a href="<?php the_permalink() ?>"></a>
          </dl>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>

    <?php $args = array(
      'post_type' => 'seko',
      'posts_per_page' => 1,
    ); ?>
    <?php $my_query = new WP_Query( $args ); ?>
    <?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
          <dl class="news">
            <dt><?php the_time('Y年m月d日'); ?></dt>
            <dd><?php the_title(); ?></dd>
            <a href="<?php the_permalink() ?>"></a>
          </dl>
  <?php endwhile; ?>
  <?php wp_reset_postdata(); ?>

<?php $args = array(
'post_type' => 'voice',
'posts_per_page' => 1,
); ?>
<?php $my_query = new WP_Query( $args ); ?>
<?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
          <dl class="news">
            <dt><?php the_time('Y年m月d日'); ?></dt>
            <dd><?php the_title(); ?></dd>
    <a href="<?php the_permalink() ?>"></a>
          </dl>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>

          <?php $args = array(
            'post_type' => 'staff-blog',
            'posts_per_page' => 1,
          ); ?>
          <?php $my_query = new WP_Query( $args ); ?>
          <?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
          <!--ループ-->
<dl class="news">
<dt><?php the_time('Y年m月d日'); ?></dt>
<dd><?php the_title(); ?></dd>
<a href="<?php the_permalink() ?>"></a>
</dl>
<?php endwhile; ?>
<?php wp_reset_postdata(); ?>

<?php $args = array(
  'post_type' => 'event',
  'posts_per_page' => 1,
); ?>
<?php $my_query = new WP_Query( $args ); ?>
<?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
<!--ループ-->
<dl class="news">
<dt><?php the_time('Y年m月d日'); ?></dt>
<dd><?php the_title(); ?></dd>
<a href="<?php the_permalink() ?>"></a>
          </dl>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        </div>
      </div>
    </div>
  </section>
  <!-- リノベーション事例 -->
  <section class="section bg1">
      <h2 class="heading sp-none">
        <img src="<?php echo get_template_directory_uri(); ?>/img/top/heading-renovation.png" class="fit" alt="リノベーション事例">
      </h2>
      <h2 class="heading pc-none">
        <img src="<?php echo get_template_directory_uri(); ?>/img/top/heading-renovation-sp.png" class="fit" alt="リノベーション事例">
      </h2>
      <div class="centering">
        <div class="grid-row mt20">
          <?php
          $args = array(
            'post_type' => 'renovation',
            'posts_per_page' => 3,
                  'order' => 'DESC',
          );
          $domestic_post = get_posts($args);
          if($domestic_post) : foreach($domestic_post as $post) : setup_postdata( $post ); ?>
          <div class="col span4  top-list-image">
            <a href="<?php the_permalink() ?>">
            <?php
    $image = get_field('main_pic');
    $size = 'large'; // (thumbnail, medium, large, full or custom size)
    if( $image ) {
        echo wp_get_attachment_image( $image, $size );
    }
    ?></a>
            <h3 class="renov-title">
              <?php if(mb_strlen($post->post_title)>20) { $title= mb_substr($post->post_title,0,20) ; echo $title. '...' ;
  } else {echo $post->post_title;}?></h3>
            <p class="mt5"><?php the_field('add'); ?> <?php the_field('customer_name'); ?></p>
          </div>
      <?php endforeach; ?>
    <?php endif;
    wp_reset_postdata(); ?>
        </div>
      <!-- リノベーション事例を見る -->
      <p class="sp-none center">
        <a href="<?php echo home_url(); ?>/renovation/"><img src="<?php echo get_template_directory_uri(); ?>/img/top/btn-renovation.png" alt="もっとリノベーション事例を見る"></a>
      </p>
      <p class="pc-none center">
        <a href="<?php echo home_url(); ?>/renovation/"><img src="<?php echo get_template_directory_uri(); ?>/img/top/btn-seko-sp.png" class="fit" alt="もっとリノベーション事例を見る"></a>
      </p>
    </div>
  </section>
  <!-- スタッフ -->
  <section class="sp-none section bg2">
    <div class="centering">
      <h2 class="heading-top"><img src="<?php echo get_template_directory_uri(); ?>/img/top/heading-staff.png" alt="スタッフ"></h2>
      <p class="center">
        <a href="<?php echo home_url(); ?>/staff/"><img class="fit" src="<?php echo get_template_directory_uri(); ?>/img/top/top_staff.png" alt="リフォーム大好き！イングスタッフにお任せください！"></a>
      </p>
    </div>
  </section>
  <!-- カテゴリー別施工事例 -->
  <section class="section">
    <div class="centering">
    <h2 class="heading-top sp-none">
      <img src="<?php echo get_template_directory_uri(); ?>/img/top/heading-seko.png" alt="カテゴリー別施工事例">
    </h2>
    <h2 class="heading-top pc-none">
      <img src="<?php echo get_template_directory_uri(); ?>/img/top/heading-seko-sp.png" class="fit" alt="カテゴリー別施工事例">
    </h2>
    <div class="seko-list-wrap">
      <div class="seko-list">
        <a href="<?php echo home_url(); ?>/renovation/"><img src="<?php echo get_template_directory_uri(); ?>/img/top/reform.png" class="sp-none" alt="増改築・デザインリフォーム"></a>
        <a href="<?php echo home_url(); ?>/renovation/"><img src="<?php echo get_template_directory_uri(); ?>/img/top/reform.png" class="pc-none fit" alt="増改築・デザインリフォーム"></a>
        <p class="cat kitchen"><a href="<?php echo home_url(); ?>/seko_cat/kitchen"></a></p>
        <p class="cat bath"><a href="<?php echo home_url(); ?>/seko_cat/bathroom/"></a></p>
        <p class="cat toilet"><a href="<?php echo home_url(); ?>/seko_cat/toilet/"></a></p>
        <p class="cat dressing"><a href="<?php echo home_url(); ?>/seko_cat/powderroom/"></a></p>
        <p class="cat ldk"><a href="<?php echo home_url(); ?>/seko_cat/naisou/"></a></p>
      </div>
    </div>
    <div class="grid-row mt20">

      <?php
      $args = array(
        'post_type' => 'seko',
        'posts_per_page' => 6,
              'order' => 'DESC',
      );
      $domestic_post = get_posts($args);
      if($domestic_post) : foreach($domestic_post as $post) : setup_postdata( $post ); ?>
      <div class="col span4 top-list-image">
          <a href="<?php the_permalink() ?>">
        <?php
$image = get_field('seko_after_image');
$size = 'large'; // (thumbnail, medium, large, full or custom size)
if( $image ) {
    echo wp_get_attachment_image( $image, $size );
}
?>
</a>
        <h3 class="renov-title">
          <?php if(mb_strlen($post->post_title)>20) { $title= mb_substr($post->post_title,0,20) ; echo $title. '...' ;
} else {echo $post->post_title;}?></h3>
        <p class="mt5"><?php the_field('seko_city'); ?> <?php the_field('seko_name'); ?></p>
      </div>
  <?php endforeach; ?>
<?php endif;
wp_reset_postdata(); ?>
    </div>
    <!-- 部分施工事例を見る -->
    <p class="sp-none center">
      <a href="<?php echo home_url(); ?>/seko/"><img src="<?php echo get_template_directory_uri(); ?>/img/top/btn-seko.png" alt="もっと部分施工事例を見る"></a>
    </p>
    <p class="pc-none center">
      <a href="<?php echo home_url(); ?>/seko/"><img src="<?php echo get_template_directory_uri(); ?>/img/top/btn-seko-sp.png" class="fit" alt="もっと部分施工事例を見る"></a>
    </p>
  </div>
</section>
<!-- お客様の声 -->
<section class="section bg2">
  <div class="centering">
    <h2 class="heading-top sp-none">
      <img src="<?php echo get_template_directory_uri(); ?>/img/top/heading-voice.png" alt="お客様の声">
    </h2>
    <h2 class="heading-top pc-none">
        <img src="<?php echo get_template_directory_uri(); ?>/img/top/heading-voice-sp.png" class="fit" alt="お客様の声">
      </h2>
			<div class="grid-row mt30">
			<?php
			$args = array(
				'post_type' => 'voice',
				'posts_per_page' => 3,
			);
			$domestic_post = get_posts($args);
			if($domestic_post) : foreach($domestic_post as $post) : setup_postdata( $post ); ?>
			<div class="col span4 post top-list-image">
          <a href="<?php the_permalink() ?>">
        <?php
$image = get_field('after_pic');
$size = 'large'; // (thumbnail, medium, large, full or custom size)
if( $image ) {
    echo wp_get_attachment_image( $image, $size );
}
?>
</a>
        <h3 class="renov-title">
          <?php if(mb_strlen($post->post_title)>20) { $title= mb_substr($post->post_title,0,20) ; echo $title. '...' ;
} else {echo $post->post_title;}?></h3>
        <p class="mt5"><?php
    $text = mb_substr(get_field('staff_comment'),0,30,'utf-8');
    echo $text.'...';
?></p>
      </div>
			<?php endforeach; ?>
		<?php endif;
		wp_reset_postdata(); ?>
		</div>
    <!-- お客様の声を見る -->
    <p class="sp-none center">
      <a href="<?php echo home_url(); ?>/voice/"><img src="<?php echo get_template_directory_uri(); ?>/img/top/btn-voice.png" alt="もっとたくさんのお客様の声を見る"></a>
    </p>
    <p class="pc-none center">
      <a href="<?php echo home_url(); ?>/voice/"><img src="<?php echo get_template_directory_uri(); ?>/img/top/btn-voice-sp.png" class="fit" alt="もっとたくさんのお客様の声を見る"></a>
    </p>
    </div>
		</section>

    <div class="centering mb135">
      <p class="sp-none"><a href="<?php echo home_url(); ?>/contact/"><img src="<?php echo get_template_directory_uri(); ?>/img/top/top1.png" alt="お気軽でのご相談満足度100％を目指します！"></a></p>
      <p class="pc-none"><a href="tel:05075860452"><img src="<?php echo get_template_directory_uri(); ?>/img/top/top1-sp.png" class="fit" alt="タップでお電話がすぐにかけられます"></a></p>
    </div>
    <!-- 代表挨拶-->
    <section class="section">
      <div class="centering">
        <h2 class="heading-top"><img src="<?php echo get_template_directory_uri(); ?>/img/top/heading-greeting.png" alt="代表挨拶"></h2>
      </div>
      <div class="greeting-wrap">
      <div class="greeting-text centering">
      <h3>イングは地域に根ざしたリフォーム店を目指し、日々努めて参ります。</h3>
      <p>私たちは、小松市、能美市、加賀市の住宅リフォーム･増改築の専門店として、平成19年12月から株式会社イングとしてスタートしました。<br>
        お客様の「想い」を「カタチ」にかえられるよう、地域に根ざしたリフォーム店を目指し、誠心誠意、日々取り組んで参ります。<br>
        弊社の近くへおでかけの際には、是非ショールームにもお立ち寄り下さい。</p>
      <p class="sp-none"><img src="<?php echo get_template_directory_uri(); ?>/img/top/daihyo.png" alt="代表取締役"></p>
    </div>
    <div class="greeting-bg sp-none">
      <p class="right"><img src="<?php echo get_template_directory_uri(); ?>/img/top/bg-greeting.png" alt="代表挨拶"></p>
    </div>
    <div class="greeting-bg-sp centering pc-none">
      <p><img src="<?php echo get_template_directory_uri(); ?>/img/top/bg-greeting-sp.png" class="fit" alt="代表挨拶"></p>
    </div>
    </div>
    </section>

    <!-- ブログ -->
    <section id="top-blog" class="section bg3 clearfix">
      <div class="centering">
			<h2 class="heading-top"><img class="sp-fit" src="<?php echo get_template_directory_uri(); ?>/img/top/heading-blog.png" alt="ブログ"></h2>

      <div class="wrap_top-colum">
        <div class="topTtl clearfix">
					<p class="ttl"><span>column</span>コラム</p>
					<div class="link"><a href="https://www.ing-reform.jp/colum">バックナンバー</a></div>
				</div>
        <ul class="list clearfix">
        <?php
          $args = array(
          'post_type' => 'colum',
          'posts_per_page' => 2,
          );
          $my_query = new WP_Query( $args );
          while ( $my_query->have_posts() ) : $my_query->the_post(); ?>

            <!--ループ-->
            <li class="span4">
            <a href="<?php the_permalink() ?>">
              <div class="colum-top">
                  <div class="photo">
                      <img src="<?php echo catch_that_image(); ?>" alt="<?php the_title(); ?>" />
                  </div>
                  <span class="ttl"><?php echo the_title(); ?></span>
                  <span class="date"><?php echo get_post_time("Y.m.d"); ?></span>
              </div>
            </a>
          </li>
          <?php endwhile; wp_reset_postdata(); ?>
        </ul>
      </div>


      <div class="wrap_top-staffblog">
        <div class="topTtl clearfix">
					<p class="ttl"><span>staff-blog</span>スタッフ</p>
					<div class="link"><a href="https://www.ing-reform.jp/staff-blog">バックナンバー</a></div>
				</div>
        <ul class="list clearfix">
        <?php
          $args = array(
          'post_type' => 'staff-blog',
          'posts_per_page' => 2,
          );
          $my_query = new WP_Query( $args );
          while ( $my_query->have_posts() ) : $my_query->the_post(); ?>

            <!--ループ-->
            <li class="span4">
            <a href="<?php the_permalink() ?>">
              <div class="colum-top">
                  <div class="photo">
                      <img src="<?php echo catch_that_image(); ?>" alt="<?php the_title(); ?>" />
                  </div>
                  <span class="ttl"><?php echo the_title(); ?></span>
                  <span class="date"><?php echo get_post_time("Y.m.d"); ?></span>
              </div>
            </a>
          </li>
          <?php endwhile; wp_reset_postdata(); ?>
        </ul>
      </div>

    </div>
		</section>

    <div class="center sp-none mb80">
			<div class="top5">
        <img src="<?php echo get_template_directory_uri(); ?>/img/top/top5.png" alt="お気軽でのご相談満足度100％を目指します！">
        <p class="top5-contact"><a href="<?php echo home_url(); ?>/contact/"><img src="<?php echo get_template_directory_uri(); ?>/img/top/top5-contact.png" alt="お問い合わせ"></a>
        </p>
        <p class="top5-raiten"><a href="<?php echo home_url(); ?>/raiten/"><img src="<?php echo get_template_directory_uri(); ?>/img/top/top5-raiten.png" alt="来店予約"></a>
        </p>
      </div>
    </div>
	</main>
</div>

<?php get_footer(); ?>
