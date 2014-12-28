<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage TW Theme
 * @since TW Theme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php echo html_tag_schema(); ?>>

	<header class="entry-header">
		<h1 itemprop="name" class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content" itemprop="text">
		<?php
  		the_content();
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
	</div><!-- .entry-content -->

  <footer class="entry-footer">
	<?php edit_post_link( __( 'Edit', 'tw' ), '<span class="edit-link">', '</span>' ); ?>
  </footer><!-- .entry-footer -->

</article><!-- #post-## -->
