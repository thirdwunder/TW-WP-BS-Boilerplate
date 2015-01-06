<?php
/*
MH Related Posts
Description: Requires a theme which supports post thumbnails
Author: Mohamed Hamad
*/
$orig_post = $post;
global $post;
$tags = wp_get_post_tags($post->ID);
if ($tags){

  $tag_ids = array();
  foreach($tags as $individual_tag){
    $tag_ids[] = $individual_tag->term_id;
  }

  $args=array(
    'tag__in' => $tag_ids,
    'post__not_in' => array($post->ID),
    'posts_per_page'=>3, // Number of related posts to display.
    'caller_get_posts'=>1
  );

  $my_query = new wp_query( $args );
  if($my_query->have_posts()): ?>
    <section id="related-posts">
      <header><h3><?php _e('More to read','mh'); ?></h3></header>
      <div class="related-post-inner row">
      <?php
        while( $my_query->have_posts() ){
          $my_query->the_post();
        ?>
          <article class="related-post-container col-xs-12 col-sm-4 col-md-4" <?php echo tw_html_tag_schema(); ?>>
            <div class="related-post thumbnail">
              <a href="<?php the_permalink(); ?>"  itemprop="url"><?php the_post_thumbnail('4x3-small', array('class'=>'','itemprop'=>'image')) ;?></a>
              <div class="caption">
                <h3 itemprop="headline"><a href="<?php the_permalink(); ?>"  itemprop="url"><?php the_title(); ?></a></h3>
                <span class="sr-only " itemprop="description"><?php the_excerpt(); ?></span>
                <time class="updated" itemprop="datePublished" datetime="<?php echo get_the_time('Y-m-j'); ?>T<?php echo get_the_time('H:i:s'); ?>" pubdate><?php echo get_the_time('F j, Y'); ?></time>

              </div>
            </div>
          </article>
          <?php
        }
      ?>
      </div>
    </section><!-- #related-posts -->
  <?php endif; ?>

<?php } ?>

<?php $post = $orig_post;  wp_reset_query(); ?>