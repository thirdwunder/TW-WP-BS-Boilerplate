    </div><!-- #site-container -->
  </div><!-- #site-content -->




  <div class="scroll-top-wrapper ">
  	<div class="btn btn-default scroll-top-inner">
  		<i class="fa fa-fw fa-chevron-up"></i> <span class="title"><?php _e('Back to Top','tw'); ?></span>
  	</div>
  </div>

  <footer id="site-footer" class="site-footer" role="contentinfo" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
    <div class="footer-container container">
      <?php
        $post_type = get_post_type();
        $tgo = get_option('tw_theme_general_options') ? get_option('tw_theme_general_options') : null;
        $footer_wigets = isset($tgo['enable_footer_widgets']) ? $tgo['enable_footer_widgets'] : 0;
        if($footer_wigets>0 && $post_type!=='landing-page'):
          $cols = 'col-xs-12 col-sm-12 col-md-12';
          switch ($footer_wigets){
            case 2:
              $cols = 'col-xs-12 col-sm-6 col-md-6';
              break;
            case 3:
              $cols = 'col-xs-12 col-sm-4 col-md-4';
              break;
            case 4:
              $cols = 'col-xs-12 col-sm-6 col-md-3';
              break;
          }
      ?>
      <div id="footer-widget-area" class="footer-widgets row">
        <?php for($i=1;$i<=$footer_wigets; $i++): ?>
          <div id="footer-widget-<?php echo $i; ?>" class="<?= $cols; ?>" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
            <div id="widget-area" class="widget-area" role="complementary">
          		<?php dynamic_sidebar( 'footer-'.$i ); ?>
          	</div><!-- .widget-area -->
          </div>
        <?php endfor; ?>
      </div>
      <?php endif; ?>

      <?php
        $footer_menu = isset($tgo['enable_footer_menu']) ? $tgo['enable_footer_menu'] : false;
        if($footer_menu): ?>
      <div id="footer-menu" role="navigation" class="" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
        <?php
           if ( has_nav_menu( 'footer' ) ){

             wp_nav_menu( array(
            		'menu'       => 'footer',
            		'theme_location' => 'footer',
            		'depth'      => 2,
            		'container'  => false,
            		//'menu_class' => 'nav navbar-nav navbar-right', //
            		'fallback_cb' => 'wp_page_menu',
            		//'walker' => new tw_wp_bootstrap_navwalker()
            		)
            	);

           }
        ?>
      </div>
      <?php endif; ?>

      <div class="row">
        <div id="copyright" class="col-xs-12 col-sm-6 col-md-6">
          <?php tw_copyright(); ?>
        </div>
        <div id="credit" class="col-xs-12 col-sm-6 col-md-6">
          <?php tw_credit(); ?>
        </div>
      </div>
    </div>
  </footer>
<?php wp_footer(); ?>

<?php
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
  if($fb_comments && !is_null($fb_app_id)):
?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=<?php echo $fb_app_id; ?>&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php endif; ?>

</body>
</html>