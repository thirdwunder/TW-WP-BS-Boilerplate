<?php $fb_comments = tw_is_fb_coments_enabled(); ?>
<ul class="hidden-print entry-meta post-meta">
  <li class="entry-date">
    <time class="updated" itemprop="datePublished" datetime="<?php echo get_the_time('Y-m-j'); ?>T<?php echo get_the_time('H:i:s'); ?>" pubdate><?php echo get_the_time('F j, Y'); ?></time>
  </li>

  <li class="entry-author vcard" itemscope="itemscope" itemtype="http://schema.org/Person" itemprop="author">
      <?php echo __('by','mh'); ?> <span class="fn" itemprop="name"><?php the_author_posts_link();?></span>
  </li>

  <li class="entry-categories">
    <?php the_category( ','); ?>
  </li>

  <?php if(!$fb_comments): ?>
  <li class="entry-comments">
    <a href="#comments" title="<?php echo __('Read Comments','tw'); ?>"><?php comments_number( '<span itemprop="commentCount">0</span> Comments', '<span itemprop="commentCount">1</span> Comment', '<span itemprop="commentCount">%</span> Comments' ); ?></a>
  </li>
  <?php endif; ?>
</ul><!-- .entry-meta -->