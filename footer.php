  <div id="scroll-to-top-wrapper" class="hidden-print scroll-top-wrapper" data-spy="affix" data-offset-bottom="100">
  	<div class="btn btn-default scroll-top-inner">
  		<i class="fa fa-fw fa-chevron-up"></i> <span class="title"><?php _e('Back to Top','tw'); ?></span>
  	</div>
  </div>

  <footer id="site-footer" class="hidden-print site-footer" role="contentinfo" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
    <div class="footer-container container">
      <?php
        $post_type = get_post_type();
        $tgo = tw_get_general_options();
        $footer_wigets = isset($tgo['enable_footer_widgets']) ? $tgo['enable_footer_widgets'] : 0;
        if($footer_wigets>0 && $post_type!=='landing-page' && !is_front_page()):
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
          <div id="footer-widget-<?php echo $i; ?>" class="footer-widget-<?php echo $footer_wigets;?> <?= $cols; ?>" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
            <div id="widget-area" class="widget-area" role="complementary">
          		<?php dynamic_sidebar( 'footer-'.$i ); ?>
          	</div><!-- .widget-area -->
          </div>
        <?php endfor; ?>
      </div>
      <?php endif; ?>

      <?php
        $footer_menu    = isset($tgo['enable_footer_menu']) ?   !!$tgo['enable_footer_menu']   : false;
        $footer_social  = isset($tgo['enable_footer_social']) ? !!$tgo['enable_footer_social'] : false;
        if($footer_menu ):
        ?>
      <div id="footer-menu" role="navigation" class="row" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
        <?php
           if ( has_nav_menu( 'footer' ) && $footer_menu ){
             wp_nav_menu( array(
            		'menu'       => 'footer',
            		'theme_location' => 'footer',
            		'depth'      => 2,
            		'container'  => false,
            		'menu_class' => $footer_menu_class, //
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
          <?php
            $footer_social  = isset($tgo['enable_footer_social']) ? !!$tgo['enable_footer_social'] : false;
            if($footer_social):
              $square_social_icons = false;
              $social_info   = tw_get_theme_social_options($square_social_icons);
              if($social_info):
                $count = count($social_info);
              ?>
            <div id="footer-social" class="footer-social <?php //echo $footer_social_class;?>">
              <ul>
                <?php foreach($social_info as $network=>$details): ?>
                  <li class="width-<?php echo $count; ?>">
                    <a class="contact-<?php echo $network; ?>" href="<?php echo $details['url']; ?>" target="_blank" title="<?php echo ucfirst($network); ?>">
                      <?php if($square_social_icons):?>
                        <i class="fa <?php echo $details['icon']; ?>"></i>
                      <?php else: ?>
                        <span class="fa-stack fa-lg">
                          <i class="fa fa-circle fa-stack-2x"></i>
                          <i class="fa <?php echo $details['icon']; ?> fa-stack-1x fa-inverse"></i>
                        </span>
                      <?php endif; ?>
                    </a>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endif; ?>

        <?php else: ?>
          <?php tw_credit(); ?>
        <?php endif; ?>

        </div><!-- #credit -->
      </div>
    </div>
  </footer>
<?php wp_footer(); ?>
</body>
</html>