<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?> <?= html_tag_schema('Article'); ?>>
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
        on <time class="updated" itemprop="datePublished" datetime="<?= get_the_time('Y-m-j'); ?>T<?= get_the_time('H:i:s'); ?>" pubdate><?php echo get_the_time('F j, Y'); ?></time>
      </span>
      <span class="entry-categories">
        in <?php the_category( ','); ?>
      </span>
    </div><!-- .entry-meta -->

    <section class="entry-content" itemprop="description">
      <?php the_excerpt(); ?>
    </section>
    <div class="entry-meta post-meta">
      <span class="entry-comments">
        <?php comments_number( '<i class="fa fa-comments"></i> <span itemprop="commentCount">0</span> Comments', '<span itemprop="commentCount">1</span> Comment', '<span itemprop="commentCount">%</span> Comments' ); ?>
      </span>
    </div>
  </div>
</article>