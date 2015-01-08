<?php
/**
 * The template used for displaying post content
 *
 */

$image = null;
$image_src  = null;
$image_sizes = array('4x3-small','16x9-medium','16x9-large');
$video_autoplay = false;
if(has_post_thumbnail()){
  $image_id = get_post_thumbnail_id(get_the_id());
  $image = tw_get_image_src($image_id, $image_sizes);
  //$video_poster = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id()), $img_size);
  $bg_style = "background: url('$image');";
  $image_caption =  get_post( $image_id )->post_excerpt;
  $video_autoplay = true;
}

$video_url = get_post_meta(get_the_id(), 'tw_video_url', true) ? trim(get_post_meta(get_the_id(), 'tw_video_url', true)) : null;
$video_embed = tw_videoURL_to_embedCode($video_url, $video_autoplay);
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php echo tw_html_tag_schema('Article'); ?>>
  <header class="entry-header">
    <?php
      if(is_single()){
        if(has_post_thumbnail()):
          if(!is_null($video_url)):?>
            <div class="section-video" style="<?php echo $bg_style; ?>">
              <div class="video embed-responsive embed-responsive-16by9" >
                <!-- <?php echo html_entity_decode($video_embed); ?> -->
              </div>
            </div>

          <?php else: ?>

            <figure class="entry-image">
              <?php //the_post_thumbnail($img_size, array('itemprop'=>'image'));
                echo tw_the_post_thumbnail($image_sizes, array('itemprop'=>'image'));
                if($image_caption): ?>
                  <figcaption class="caption"><?php echo $image_caption;?></figcaption>
                <?php endif; ?>
            </figure>
      <?php
          endif;
        elseif(!is_null($video_url)): ?>
          <div class="video embed-responsive embed-responsive-16by9" >
          <?php echo html_entity_decode($video_embed); ?>
          </div>
        <?php endif;

          the_title('<h1 class="entry-title" itemprop="headline">','</h1>');
      }else{
      ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" itemprop="url">
          <div class="entry-image">
            <?php the_post_thumbnail($img_size, array('itemprop'=>'image')); ?>
          </div>
          <h2 class="entry-title" itemprop="headline"><?php the_title(); ?></h2>
        </a>
      <?php
      }
    ?>
    <?php get_template_part('content/_post-meta'); ?>

  </header>

  <?php if(is_single()): ?>
    <section class="entry-content" itemprop="articleBody">
      <?php the_content();
    		wp_link_pages( array(
  				'before'      => '<nav class="navigation post-navigation" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement"><span class="page-links-title">' . __( 'Pages:', 'tw' ) . '</span>',
  				'after'       => '</nav>',
  				'link_before' => '<span>',
  				'link_after'  => '</span>',
  				'pagelink'    => '<span class="sr-only">' . __( 'Page', 'tw' ) . ' </span>%',
  				'separator'   => '<span class="sr-only">, </span>',
  				'echo'             => 0
  			) );
      ?>
    </section>
  <?php else: ?>
    <section class="entry-content" itemprop="description">
      <?php the_excerpt(); ?>
    </section>
  <?php endif; ?>

  <?php if(is_single()): ?>
  <footer class="entry-footer">
    <div class="entry-tags"><?php the_tags( 'Tags: ', ', ', '' ); ?></div>
    <?php edit_post_link( __( 'Edit', 'tw' ), '<span class="edit-link">', '</span>' ); ?>
  </footer>
  <?php endif; ?>

  <?php
    if( is_single() && get_the_author_meta( 'description' ) ){
      get_template_part( 'author-bio' );
    }
  ?>
</article>