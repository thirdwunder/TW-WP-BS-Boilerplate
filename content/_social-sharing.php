<?php if ( is_single() ) :
  $social_counts = tw_get_sharedcount_json(get_the_permalink());
  $twitter   = intval($counts["Twitter"]);
  $facebook  = intval($counts["Facebook"]["like_count"]) + intval($counts["Facebook"]["share_count"]);
  $gplus     = intval($counts["GooglePlusOne"]);
  $linkedin  = intval($counts["LinkedIn"]);
  $pinterest = intval($counts["Pinterest"]);

  $total = $twitter+$facebook+$gplus+$pinterest;

  $tweet = get_the_title().' '.get_permalink();
  $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
?>
<h3 class="hidden-print"><?php echo __('Share with your friends','tw'); ?></h3>
<div class="hidden-print social-sharing">

  <ul>
    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>" title="Share on Facebook" target="_blank" class="social-facebook">
        <li class="facebook">
              <i class="fa fa-facebook"></i>
              <?php if(!is_null($social_counts) && is_int($facebook)):?>
              <div class="overlay">
                <div class="shared-count"><?php echo $facebook; ?></div>
                <div class="share-title "><?php echo __('shares','lr'); ?></div>
              </div>
              <?php endif; ?>
        </li>
      </a>

      <a href="https://twitter.com/home?status=<?php echo $tweet; ?>" title="Share on Twitter" target="_blank" class="social-twitter">
        <li class="twitter">

              <i class="fa fa-twitter"></i>
              <?php if(!is_null($social_counts) && is_int($twitter)):?>
              <div class="overlay">
                <div class="shared-count"><?php echo $twitter;?></div>
                <div class="share-title "><?php echo __('shares','lr'); ?></div>
              </div>
              <?php endif; ?>
        </li>
      </a>

      <a href="https://plus.google.com/share?url=<?php the_permalink();?>" title="Share on Google+" target="_blank" class="social-googleplus">
        <li class="googleplus">
            <i class="fa fa-google-plus"></i>
            <?php if(!is_null($social_counts) && is_int($gplus)):?>
            <div class="overlay">
              <div class="shared-count"><?php echo $gplus; ?></div>
              <div class="share-title "><?php echo __('shares','lr'); ?></div>
            </div>
            <?php endif;?>
        </li>
      </a>

      <a href="https://pinterest.com/pin/create/button/?url=Image-<?php the_permalink();?>&media=<?php echo $feat_image;?>&description=<?php the_title();?>" title="Pin it on Pinterest" target="_blank" class="social-pinterest">
        <li class="pinterest">

          <i class="fa fa-pinterest"></i>
          <?php if(!is_null($social_counts) && is_int($pinterest)):?>
          <div class="overlay">
            <div class="shared-count"><?php echo $pinterest; ?></div>
            <div class="share-title "><?php echo __('shares','lr'); ?></div>
          </div>
          <?php endif;?>
        </li>
      </a>
      <a href="mailto:?subject=Great read on <?php echo bloginfo('name');?>: <?php the_title();?>&amp;body=I thought you would like this article.%0A%0A<?php the_permalink();?>" title="Share by Email" class="social-email">
        <li class="email">
          <i class="fa fa-envelope"></i>
        </li>
      </a>
  </ul>
  <div class="clearfix"></div>
</div>
<?php endif; ?>