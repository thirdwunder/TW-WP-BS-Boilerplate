<?php if ( is_active_sidebar( 'primary' ) ) : ?>
<div id="secondary" class="widget-area col-xs-12 hidden-xs col-sm-3 col-md-3" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
	<div id="widget-area" class="widget-area" role="complementary">
		<?php dynamic_sidebar( 'primary' ); ?>
	</div><!-- .widget-area -->
</div>
<?php endif; ?>