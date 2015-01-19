<?php
/**
 * A base landing page theme template
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since TW 1.0
 */

$sidebar      = lp_get_value($post, 'default', 'conversion-area-placement');
$video_url    = lp_get_value($post, 'default', 'video_url') ? trim(lp_get_value($post, 'default', 'video_url')) : null;

$video_poster = null;
$video_bg  = null;
$image_sizes = array('4x3-small','16x6-medium','16x6-large');
$image_id = get_post_thumbnail_id(get_the_id());
if(has_post_thumbnail()){
  $video_poster = tw_get_image_src($image_id, $image_sizes);
  //$video_poster = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id()), $img_size);
  $video_bg = "background: url('$video_poster');";
}

get_header(); ?>
<!-- Site Container -->
<div id="site-content" class="container">
  <div id="site-container" class="row">


    <div id="primary" class="content-area col-xs-12 col-sm-12 col-md-12">
    	<main id="main" class="site-main" role="main" itemprop="mainContentOfPage">

      <?php while ( have_posts() ) : the_post();  ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php echo tw_html_tag_schema('Article'); ?>>
          <header class="entry-header">
             <?php if(!is_null($video_url) && $video_url!=='' ): ?>
             <div id="section-video-<?php the_ID(); ?>" class="section-video" style="<?php echo $video_bg; ?>">
               <div id="video-<?php the_ID(); ?>" class="video embed-responsive embed-responsive-16by9" itemprop="video" itemscope itemtype="http://schema.org/VideoObject">
                 <!-- <?php echo html_entity_decode(tw_videoURL_to_embedCode($video_url, true)); ?> -->
               </div>
             </div>

             <?php elseif( has_post_thumbnail()): ?>
              <figure class="entry-image">
                <?php //the_post_thumbnail('16x6-large', array('itemprop'=>'image')); ?>
                <?php echo tw_the_post_thumbnail($image_sizes, array('itemprop'=>'image')); ?>
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


  </div><!-- #site-container -->
</div><!-- #site-content -->
<?php get_footer(); ?>