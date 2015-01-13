<?php
  $fb_comments = tw_is_fb_coments_enabled();
  $cols = $fb_comments ? 'col-xs-4 col-sm-4 col-md-12' : 'col-xs-6 col-sm-3 col-md-12';
?>
<aside id="post-meta-panel" class="hidden-print entry-meta-panel col-xs-12 col-sm-12 col-md-3 ">


    <div class="profile-image hidden-xs hidden-sm"><?php echo get_avatar( get_the_author_meta( 'user_email' ), '100' ); ?></div>


    <ul class="row">
        <li class="<?php echo $cols; ?> entry-author vcard" itemprop="author" itemscope itemtype="http://schema.org/Person">
            <i class="fa fa-user"></i> <span class="fn" itemprop="name"><?php the_author_posts_link();?></span>
        </li>

        <li class="<?php echo $cols; ?> entry-date"><i class="fa fa-clock-o"></i> <time class="updated" itemprop="datePublished" datetime="<?php echo get_the_time('Y-m-j'); ?>" pubdate><?php echo get_the_time('F j, Y'); ?></time></li>

        <?php if(!$fb_comments): ?>
            <li class="<?php echo $cols; ?> entry-comments-count">
                <i class="fa fa-comments"></i>
                <?php _e('Comments','tw') ?> <span class="badge"><?php echo get_comments_number() ;?></span>
            </li>
        <?php endif; ?>

        <li class="<?php echo $cols; ?> entry-categories">
          <i class="fa fa-bookmark"></i> <?php the_category( ','); ?>
        </li>
    </ul>


    <?php if(is_singular()){ get_template_part( 'content/_social-panel');   }  ?>
</aside> <!-- #post-meta -->
