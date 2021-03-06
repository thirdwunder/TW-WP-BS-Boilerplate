<?php
/**
 * Template Name: Homepage
 *
 * The full width page template.
 *
 * @package WordPress
 * @subpackage Third Wunder
 * @since Third Wunder 1.0
 */
$show_content = get_post_meta(get_the_id(), 'tw_homepage_show_content', true);
$show_content = ($show_content=='on') ? true : false;

$j_options = get_post_meta(get_the_id(), 'tw_homepage_jumbotron', true);
$j_enabled= false;
$j_bg_style = '';
$j_color = 'dark';
$image_sizes = array('4x3-small','16x6-medium','16x6-large');

$j_video_url = '';
$j_video_poster_id = '';
$j_video_poster_img= '';
$j_video_poster_style = '';
$j_video_autoplay = false;


if(is_array($j_options)){
  $j_enabled = (isset($j_options['enabled']) && $j_options['enabled']=='on' ) ? true : false;
  $j_color = isset($j_options['tw_jumbotron_color']) ? $j_options['tw_jumbotron_color'] : 'dark';

  //$image_id = get_post_thumbnail_id(get_the_id());
  if(isset($j_options['tw_jumbotron_bg_image'])  && is_array($j_options['tw_jumbotron_bg_image']) ){
    $image_id = $j_options['tw_jumbotron_bg_image']['id'] ? $j_options['tw_jumbotron_bg_image']['id'] : null;
    if($image_id){
      $image_src = tw_get_image_src($image_id, $image_sizes);
      $j_bg_style = "background: url('$image_src');";
    }
  }



  $j_video_url = (isset($j_options['tw_jumbotron_video_url']) && trim($j_options['tw_jumbotron_video_url'])!=='' ) ? $j_options['tw_jumbotron_video_url'] : '';

  $j_video_poster_id =(isset($j_options['tw_jumbotron_video_poster']) && trim($j_options['tw_jumbotron_video_poster']['id'])!=='' ) ? $j_options['tw_jumbotron_video_poster']['id'] : null;
  if(!is_null($j_video_poster_id)){
    $j_video_poster_img = tw_get_image_src($j_video_poster_id, array('4x3-small','3x3-medium','4x3-medium'));
    $j_video_poster_style = "background: url('$j_video_poster_img');";
    $j_video_autoplay = true;
  }
  $j_video_embed = tw_videoURL_to_embedCode($j_video_url, $j_video_autoplay);

  $j_button = (isset($j_options['tw_jumbotron_button_title']) && trim($j_options['tw_jumbotron_button_title'])!=='') ? trim($j_options['tw_jumbotron_button_title']) : false;
  $j_url     = (isset($j_options['tw_jumbotron_button_url']) && trim($j_options['tw_jumbotron_button_url'])!=='') ? trim($j_options['tw_jumbotron_button_url']) : false;
}
get_header(); ?>
<!-- Site Container -->
<div id="site-content" <?php post_class('container-fluid');?> role="main" itemprop="mainContentOfPage">
  <?php if($j_enabled): ?>
  <div class="jumbotron-wrapper  row">
  <div class="jumbotron <?php if($j_video_url!==''){ echo 'has-video';}else{ echo 'no-video';} ?> <?php echo $j_color; ?>" style="<?php echo $j_bg_style; ?>">
    <div class="jumbotron-container">
        <?php if($j_video_url==''): ?>
          <div class="jumbotron-content col-xs-12 col-sm-12 col-md-12">
            <?php if(isset($j_options['tw_jumbotron_title'])):?><h1><?php echo $j_options['tw_jumbotron_title'];?></h1><?php endif; ?>
            <?php if(isset($j_options['tw_jumbotron_text'])):?><p><?php echo $j_options['tw_jumbotron_text'];?></p><?php endif; ?>
            <?php if($j_button  && $j_url): ?>
            <p><a class="btn btn-primary btn-lg" href="<?php echo $j_url;?>" role="button"><?php echo $j_button;?></a></p>
            <?php endif; ?>
          </div>
        <?php else: ?>
          <div class="jumbotron-content col-xs-12 col-sm-12 col-md-6">

            <?php if(isset($j_options['tw_jumbotron_title'])):?><h1><?php echo $j_options['tw_jumbotron_title'];?></h1><?php endif; ?>
            <?php if(isset($j_options['tw_jumbotron_text'])):?><p><?php echo $j_options['tw_jumbotron_text'];?></p><?php endif; ?>
            <?php if(isset($j_options['tw_jumbotron_button_title'])  && isset($j_options['tw_jumbotron_button_url'])): ?>
            <p><a class="btn btn-primary btn-lg" href="<?php echo $j_options['tw_jumbotron_button_url'];?>" role="button"><?php echo $j_options['tw_jumbotron_button_title'];?></a></p>
            <?php endif; ?>

          </div>
          <div class="jumbotron-video col-xs-12 col-sm-12 col-md-6">
            <?php if($j_video_poster_img!==''): ?>
              <div id="section-video-<?php echo get_the_id();?>" class="section-video" style="<?php echo $j_video_poster_style; ?>">
                <div id="video-<?php echo get_the_id();?>" class="video embed-responsive embed-responsive-16by9" >
                  <!-- <?php echo html_entity_decode($j_video_embed); ?> -->
                </div>
              </div>
            <?php else: ?>
              <div class="video embed-responsive embed-responsive-16by9" >
                <?php echo html_entity_decode($j_video_embed); ?>
              </div>
            <?php endif; ?>
          </div>
        <?php endif; ?>
    </div><!-- jumbotron-container -->
  </div><!-- jumbotron -->
  </div>
  <?php endif; ?>

  <?php if($show_content):?>
  <div id="primary" class="container content-area">
    <div class="row page-content" itemprop="text">
      <div class="col-sm-12 col-md-12">
        <?php while ( have_posts() ) : the_post(); the_content(); endwhile; ?>
      </div>
    </div>
  </div>
  <?php endif; ?>

  <?php if ( is_active_sidebar( 'homepage' ) ) : ?>
  <div id="homepage-widgets" class="row">
    <?php dynamic_sidebar( 'homepage' ); ?>
  </div>
  <?php endif; ?>

</div><!-- #site-content -->
<?php get_footer(); ?>