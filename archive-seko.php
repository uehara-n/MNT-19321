<?php
/**
 * Template Name:施工事例一覧ページ
 *
 * @package Wordpress
 * @subpackage ing
 * @since 1.0.0
 */
get_header(); ?>


 <div id="top" class="container">
   <?php get_sidebar(); ?>
   <main class="main" role="main">
     <?php breadcrumb(); ?>
     <div class="page-title-area">
       <h2 class="page-title">施工事例</h2>
     </div>
         <?php
           //Pagenation
           if (function_exists("pagination")) {
           pagination($additional_loop->max_num_pages);
           }
         ?>
				<p>弊社のリフォームの施工事例をご紹介します。<br>
					施工事例を元に、「こんな風にリフォームしたい」という具体的なご要望を持つことが、リフォームを成功させる秘訣です。価格や工期、完成後の様子などを、参考としてご活用ください。</p>
<?php if (have_posts()) : ?>
    <ul class="seko-content">
<?php while (have_posts()) : the_post(); ?>
      <li class="seko-item">
                  <a href="<?php the_permalink() ?>">
                    <div class="image-scale">
                      <?php
                      $image = get_field('seko_after_image');
                      $size = 'large'; // (thumbnail, medium, large, full or custom size)
                      if( $image ) {
                        echo wp_get_attachment_image( $image, $size );
                      }
                      ?>
                  </div>
                </a>
                  <p class="seko-icon">
                    <?php if( get_field('seko_newicon')) {
                        echo '<span class="new-icon">NEW</span>';
                    }
                    ?>
                    <span class="seko-name"><?php the_field('seko_city'); ?> <?php the_field('seko_name'); ?></span>
                  </p>
                  <h3 class="seko-title">
                    <?php if(mb_strlen($post->post_title)>20) { $title= mb_substr($post->post_title,0,20) ; echo $title. '...' ;
  } else {echo $post->post_title;}?></h3>
                  <p class="seko-data">工期：<?php the_field('seko_duration'); ?>&nbsp;費用：<?php the_field('seko_price'); ?></p>
                  <p class="btn-detail mt10 mb10"><a href="<?php the_permalink() ?>">詳しくはこちら</a></p>
                </li>
<?php endwhile; ?>
</ul>
    <?php
      //Pagenation
      if (function_exists("pagination")) {
      pagination($additional_loop->max_num_pages);
      }
    ?>
<?php endif; ?>
 	</main>
 </div>
<?php get_footer(); ?>
