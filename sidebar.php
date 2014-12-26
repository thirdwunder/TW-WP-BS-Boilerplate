<?php if ( is_active_sidebar( 'primary' ) ) : ?>
<div class="col-xs-12 hidden-xs col-sm-3 col-md-3">
	<div id="widget-area" class="widget-area" role="complementary">
		<?php dynamic_sidebar( 'primary' ); ?>
	</div><!-- .widget-area -->
</div>
<?php endif; ?>