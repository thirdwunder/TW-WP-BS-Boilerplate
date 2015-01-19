<?php
/**
 * The template for displaying Author bios.
 *
 * @package WordPress
 * @subpackage MH Twitter Bootstrap 3
 * @since MH Twitter Bootstrap 3
 */


	$author_id=$post->post_author;

	$social = array();
	$social['url']          = get_the_author_meta( 'url',       $author_id );
	$social['facebook']     = get_the_author_meta( 'facebook',  $author_id );
	$social['twitter']      = get_the_author_meta( 'twitter',   $author_id );
	$social['google-plus']  = get_the_author_meta( 'googleplus',$author_id );
	$social['linkedin']     = get_the_author_meta( 'linkedin',  $author_id );
	$social['flickr']       = get_the_author_meta( 'flickr',    $author_id );
	$social['pinterest']    = get_the_author_meta( 'pinterest', $author_id );
	$social['instagram']    = get_the_author_meta( 'instagram', $author_id );
	$social['youtube']      = get_the_author_meta( 'youtube',   $author_id );
?>
<aside id="entry-author" class="entry-author-bio" itemscope="itemscope" itemtype="http://schema.org/Person" itemprop="author">

    <div class="author-content">
        <?php if(is_author()): ?>
          <span class="sr-only" itemprop="name"><?php the_author_posts_link();?></span>
        <?php else: ?>
        <h4><?php _e('About','mh'); ?> <span itemprop="name"><?php the_author_posts_link();?></span></h4>
        <?php endif ;?>

        <div class="author-image pull-right"><?php echo get_avatar( get_the_author_meta( 'user_email' ), '100' ); ?></div>
        <p itemprop="description"><?php echo get_the_author_meta( 'description', $author_id ); ?></p>
    </div><!-- profile-content -->
    <div class="author-social">
				<?php foreach($social as $k => $v): ?>
  				  <?php if(!empty($v) && $v!==''): ?>
  				    <?php if($k=='url'): ?>
                  <a href="<?php echo $v; ?>" title="<?php printf( esc_attr__( 'Visit %s\'s Website ', 'mh' ), get_the_author_meta( 'display_name', $author_id ) ); ?>" target="_blank"><i class="fa fa-link"></i></a>
              <?php else: ?>
                  <a href="<?php echo $v; ?><?php if($k=='google-plus'){ echo '?rel=author';};?>" title="<?php printf( esc_attr__( '%s on ', 'mh' ), get_the_author_meta( 'display_name', $author_id ) ); ?><?php echo ucwords($k); ?>" class="social-<?php echo $k?>"  target="_blank">
                    <?php if($k == 'instagram' || $k == 'flickr'):?>
                      <i class="fa fa-<?php echo $k; ?>"></i>
                    <?php else: ?>
                      <i class="fa fa-<?php echo $k; ?>-square"></i>
                    <?php endif; ?>
                  </a>
              <?php endif; ?>
        		<?php endif; ?>
				<?php endforeach; ?>
		</div><!-- author-social -->
</aside>
