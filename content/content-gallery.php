<?php
/**
 * The template used for displaying post content
 *
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php echo tw_html_tag_schema('Article'); ?>>
  <header class="entry-header">
    <?php
      if(is_single()){
        get_template_part( 'content/_slider-gallery');
        //locate_template('content/_slider-gallery.php', true,true);
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
    <?php //get_template_part('content/_post-meta'); ?>

  </header>

  <?php if(is_single()): ?>
    <section class="entry-content row">
      <?php get_template_part('content/_post-meta-panel'); ?>

      <div class="col-xs-12 col-sm-12 col-md-9" itemprop="articleBody">
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
        <?php get_template_part( 'content/_post-footer' ); ?>
      </div>
    </section>
  <?php else: ?>
    <section class="entry-content" itemprop="description">
      <?php the_excerpt(); ?>
    </section>
  <?php endif; ?>

  <?php
    if( is_single()){
      if(get_the_author_meta( 'description' ) ){
        get_template_part( 'author-bio' );
      }

      get_template_part('content/_social-sharing');
    }
  ?>
</article>