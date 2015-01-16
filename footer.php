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
          <div id="footer-widget-<?php echo $i; ?>" class="<?= $cols; ?>" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
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
        if($footer_menu || $footer_social):
          if($footer_menu && $footer_social){
            $footer_menu_class = 'col-xs-12 col-sm-8 col-md-8';
            $footer_social_class = 'col-xs-12 col-sm-4 col-md-4';
          }elseif(!$footer_menu && $footer_social){
            $footer_menu_class = '';
            $footer_social_class = 'col-xs-12 col-sm-6 col-sm-push-6 col-md-6 col-sm-push-6';
          }elseif($footer_menu && !$footer_social){
            $footer_menu_class = 'col-xs-12 col-sm-12 col-md-12';
            $footer_social_class = '';
          }
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
        <?php if($footer_social): ?>
          <?php
            $social_info   = tw_get_theme_social_options();
            if($social_info):
              $count = count($social_info);
            ?>
            <div id="footer-social" class="footer-social <?php echo $footer_social_class;?>">
              <ul>
                <?php foreach($social_info as $network=>$details): ?>
                  <li class="width-<?php echo $count; ?>">
                    <a class="contact-<?php echo $network; ?>" href="<?php echo $details['url']; ?>" target="_blank" title="<?php echo ucfirst($network); ?>"><i class="fa <?php echo $details['icon']; ?>"></i></a>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endif; ?>


        <?php endif; ?>
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
  $social_options = tw_get_social_options();
  if(is_array($social_options) && isset($social_options['enable_fb_comments'])){
    $fb_comments = !!$social_options['enable_fb_comments'];
  }
  if(is_array($social_options) && isset($social_options['fb_app_id']) ){
    $fb_app_id = trim($social_options['fb_app_id']);
  }
  if(!is_null($fb_app_id)):
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