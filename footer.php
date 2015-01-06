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
</body>
</html>