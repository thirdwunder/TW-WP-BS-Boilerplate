<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
$fb_comments = false;
$fb_app_id = null;
$blog_options = get_option('tw_theme_blog_options') ? get_option('tw_theme_blog_options') : null;
$social_options = get_option('tw_theme_social_options') ? get_option('tw_theme_social_options') : null;
if(is_array($blog_options) && isset($blog_options['enable_fb_comments'])){
  $fb_comments = !!$blog_options['enable_fb_comments'];
}
if(is_array($social_options) && isset($social_options['fb_app_id']) ){
  $fb_app_id = trim($social_options['fb_app_id']);
}

if ( post_password_required() )
	return;
?>
<?php if($fb_comments && !is_null($fb_app_id)): ?>
<div id="comments" class="comments-area">
  <h2 class="comments-title"><?php _e('Leave a comment','tw'); ?></h2>
  <div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="100%" data-numposts="10" data-colorscheme="light"></div>
</div><!-- #comments -->
<?php else: ?>
<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'mh' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>

		<ul class="comment-list media-list">
		  <?php //wp_list_comments('type=comment&callback=bones_comments'); ?>
			<?php
				wp_list_comments( array(
					'style'       => 'ul',
					'short_ping'  => true,
					'avatar_size' => 50,
          'type'        => 'all',
          'callback'    => 'tw_comments',
          'max_depth'   => 4,
				) );
			?>
		</ul><!-- .comment-list -->

		<?php
			// Are there comments to navigate through?
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
		?>
		<nav class="navigation comment-navigation" role="navigation">
			<h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'mh' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'mh' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'mh' ) ); ?></div>
		</nav><!-- .comment-navigation -->
		<?php endif; // Check for comment navigation ?>

		<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="no-comments"><?php _e( 'Comments are closed.' , 'mh' ); ?></p>
		<?php endif; ?>

	<?php endif; // have_comments() ?>

	<?php comment_form(); ?>

</div><!-- #comments -->
<?php endif; ?>

