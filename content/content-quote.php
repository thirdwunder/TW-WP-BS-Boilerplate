<?php
/**
 * The template used for displaying post content
 *
 */
  $quote_author       = get_post_meta(get_the_id(), 'tw_quote_author', true) ? trim(get_post_meta(get_the_id(), 'tw_quote_author', true)) : '';
  $quote_source       = get_post_meta(get_the_id(), 'tw_quote_source', true) ?  trim(get_post_meta(get_the_id(), 'tw_quote_source', true)) : '';
  $quote_source_url   = get_post_meta(get_the_id(), 'tw_quote_source_url', true) ? trim(get_post_meta(get_the_id(), 'tw_quote_source_url', true)): '';
  $quote              = get_post_meta(get_the_id(), 'tw_quote', true) ? trim(get_post_meta(get_the_id(), 'tw_quote', true)) : '';

  $attribution = '';
  if($quote_author!==''){
    $attribution .= $quote_author;
  }
  if($quote_source!==''){
    $attribution .= ' - '.$quote_source;
  }
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php echo tw_html_tag_schema('Article'); ?>>
  <header class="entry-header">
    <?php
      if(is_single()){
        if(has_post_thumbnail()):
          $image_caption =  get_post( get_post_thumbnail_id($post->ID) )->post_excerpt;
      ?>
          <figure class="entry-image">
            <?php echo tw_the_post_thumbnail(array('4x3-small','16x9-medium','16x9-large'), array('itemprop'=>'image'));

              if($image_caption): ?>
                <figcaption class="caption"><?php echo $image_caption;?></figcaption>
              <?php endif; ?>
          </figure>
        <?php
          endif;
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

        <?php if($quote!==''): ?>
        <div id="article-quote" class="article-quote">
          <blockquote <?php if($quote_source_url!==''){ echo 'cite="'.$quote_source_url.'"';} ;?>>
            <p><?php echo $quote; ?></p>

            <?php if($quote_source_url!==''):?>
              <footer><a href="<?php echo $quote_source_url;?>" target="_blank">
                <?php echo $attribution; ?>
              </a></footer>
            <?php else: ?>
              <footer><?php echo $attribution; ?></footer>
            <?php endif; ?>

          </blockquote>
        </div>
        <?php endif; ?>


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

  <?php get_template_part( 'content/_post-footer' ); ?>


  <?php
    if( is_single()){
      if(get_the_author_meta( 'description' ) ){
        get_template_part( 'author-bio' );
      }

      get_template_part('content/_social-sharing');
    }
  ?>
</article>