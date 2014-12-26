<?php
/**
 * The template used for displaying post content
 *
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/BlogPosting">
  <header class="entry-header">
    <h1 class="entry-title"><?php the_title();?></h1>
    <ul class="entry-meta post-meta">
      <li class="entry-date">
        <time class="updated" itemprop="datePublished" datetime="<?php echo get_the_time('Y-m-j'); ?>" pubdate><?php echo get_the_time('F j, Y'); ?></time>
      </li>

      <li class="entry-author vcard" itemprop="author" itemscope itemtype="http://schema.org/Person">
          <?php echo __('by','mh'); ?> <span class="fn" itemprop="name"><?php the_author_posts_link();?></span>
      </li>

      <li class="entry-categories">
        <?php the_category( ','); ?>
      </li>
    </ul><!-- .entry-meta -->
  </header>

  <section class="entry-content" itemprop="articleBody">
    <?php the_content(); ?>
  </section>

  <footer class="entry-footer">
		<?php get_template_part( 'author-bio' );?>
  </footer>
</article>