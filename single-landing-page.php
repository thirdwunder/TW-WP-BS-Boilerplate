<?php
/**
 * A base landing page theme template
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since TW 1.0
 */

$img_size = '16x9-large';
if(class_exists('Mobile_Detect')){
  $detect = new Mobile_Detect;
  $deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
  switch($deviceType){
    case 'phone':
      $img_size = '4x3-small';
      break;
    case 'tablet':
      $img_size = '16x9-medium';
      break;
    case 'computer':
      $img_size = '16x9-large';
      break;
  }
}


$sidebar      = lp_get_value($post, 'default', 'conversion-area-placement');
$video_url    = lp_get_value($post, 'default', 'video_url') ? trim(lp_get_value($post, 'default', 'video_url')) : null;

$video_poster = null;
$video_bg  = null;
if(has_post_thumbnail()){
  $video_poster = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id()), $img_size);
  $video_bg = "background: url('$video_poster[0]');";
}

get_header(); ?>
<div id="primary" class="content-area col-xs-12 col-sm-12 col-md-12">
	<main id="main" class="site-main" role="main" itemprop="mainContentOfPage">

  <?php while ( have_posts() ) : the_post();  ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php echo tw_html_tag_schema('Article'); ?>>
      <header class="entry-header">
         <?php if(!is_null($video_url) && $video_url!=='' ): ?>
         <div class="section-video" style="<?php echo $video_bg; ?>">
           <div class="video embed-responsive embed-responsive-16by9" >
             <!-- <?php echo html_entity_decode(tw_videoURL_to_embedCode($video_url, true)); ?> -->
           </div>
         </div>

         <?php elseif( has_post_thumbnail()): ?>
          <figure class="entry-image">
            <?php the_post_thumbnail('16x6-large', array('itemprop'=>'image')); ?>
          </figure>
          <?php endif; ?>

        <?php the_title('<h1 class="entry-title" itemprop="headline">','</h1>'); ?>
      </header>

      <?php if($sidebar == 'widget'): ?>
      <section class="entry-content row" itemprop="articleBody">
         <div class="col-xs-12 col-sm-7 col-md-8 content"><?php the_content(); ?></div>

         <div id="lp-form" class="col-xs-12 col-sm-5 col-md-4 form">
          <div id="lp_container" class="form-container">
            <?php lp_conversion_area(); /* Print out form content */  ?>
          </div>
        </div>

      </section>
      <?php else: ?>

        <section class="entry-content" itemprop="articleBody">
         <div class="content-with-form"><?php the_content(); ?></div>
      </section>

      <?php endif; ?>

    </article>
  <?php endwhile; ?>

  </main><!-- .site-main -->

</div><!-- .content-area -->


<?php get_footer(); ?>