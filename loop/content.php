<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?> <?php echo tw_html_tag_schema('Article'); ?>>
  <div class="entry-image col-sm-3 col-md-3">
    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" itemprop="url">
      <?php the_post_thumbnail('medium', array('itemprop'=>'image')); ?>
    </a>
  </div>
  <div class="col-sm-9 col-md-9">
    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" itemprop="url">
      <h2 class="entry-title" itemprop="headline"><?php the_title(); ?></h2>
    </a>
    <div class="entry-meta post-meta">
      <span class="entry-author vcard" itemscope="itemscope" itemtype="http://schema.org/Person" itemprop="author">
          <?php echo __('by','mh'); ?> <span class="fn" itemprop="name"><?php the_author_posts_link();?></span>
      </span>
      <span class="entry-date">
        <?php _e('on','tw');?> <time class="updated" itemprop="datePublished" datetime="<?php echo get_the_time('Y-m-j'); ?>T<?php echo get_the_time('H:i:s'); ?>" pubdate><?php echo get_the_time('M j, Y'); ?></time>
      </span>
      <span class="entry-categories">
        <?php _e('in','tw');?> <?php the_category( ','); ?>
      </span>
    </div><!-- .entry-meta -->

    <section class="entry-content" itemprop="description">
      <?php the_excerpt(); ?>
    </section>
    <div class="entry-meta post-meta">
      <span class="entry-comments">
        <a href="<?php the_permalink(); ?>#comments" title="<?php the_title(); ?>"><i class="fa fa-comments"></i> &nbsp;<?php comments_number( '<span itemprop="commentCount">0</span> Comments', '<span itemprop="commentCount">1</span> Comment', '<span itemprop="commentCount">%</span> Comments' ); ?>
      </span></
    </div>
  </div>
</article>