<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage TW Theme
 * @since TW Theme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?= html_tag_schema(); ?>>

	<header class="entry-header">
		<h1 itemprop="name" class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content" itemprop="text">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

  <footer class="entry-footer">
	<?php edit_post_link( __( 'Edit', 'tw' ), '<span class="edit-link">', '</span>' ); ?>
  </footer><!-- .entry-footer -->

</article><!-- #post-## -->
