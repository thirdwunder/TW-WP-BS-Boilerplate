<?php
/**
 * Template Name: Contact Template
 *
 * The full width page template.
 *
 * @package WordPress
 * @subpackage Third Wunder
 * @since Third Wunder 1.0
 */
 $social_info   = tw_get_theme_social_options();
 $contact_info  = get_option('tw_theme_contact_options');
get_header(); ?>

<div id="primary" class="content-area col-xs-12 col-sm-12 col-md-12">
	<main id="main" class="site-main" role="main" itemprop="mainContentOfPage">

	<?php get_template_part( 'content/_breadcrumbs' ); ?>
	<?php while ( have_posts() ): the_post(); ?>
    <div id="page-contact" <?php post_class(); ?> <?php echo tw_html_tag_schema('ContactPage'); ?>>

      <header class="page-header">
    		<h1 itemprop="name" class="entry-title"><?php the_title(); ?></h1>
    	</header><!-- .entry-header -->

      <div class="page-content row" itemprop="text">
        <?php if($social_info || $contact_info ): ?>
        <div class="col-md-4 contact-details">
          <?php if($contact_info): ?>
            <div itemscope itemtype="http://schema.org/LocalBusiness">
                <h3><?php echo __('Address','tw') ;?></h3>
                <span class="sr-only" itemprop="name"><?php echo bloginfo('name');?></span>

                <div class="contact-address" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                  <?php if(isset($contact_info['address_1']) && $contact_info['address_1']!=='' ):?>
                    <span itemprop="streetAddress">
                      <?php echo $contact_info['address_1'];?>
                      <?php if(isset($contact_info['address_2']) && $contact_info['address_2']!=='' ):?>,<br/><?php echo $contact_info['address_2']; ?> <?php endif;?>
                    </span><br/>
                  <?php endif;?>
                  <?php if(isset($contact_info['city']) && $contact_info['city']!=='' ):?><span itemprop="addressLocality"><?php echo $contact_info['city'];?></span><?php endif;?>
                  <?php if(isset($contact_info['postcode'])  && $contact_info['postcode']!=='' ):?><span itemprop="postalCode"><?php echo $contact_info['postcode'];?></span><?php endif;?>
                  <?php if(isset($contact_info['state'])  && $contact_info['state']!=='' ):?><span itemprop="addressRegion"><?php echo $contact_info['state'];?></span><?php endif;?>
                  <?php if(isset($contact_info['country'])  && $contact_info['country']!=='' ):?><br/><span itemprop="addressCountry"><?php echo $contact_info['country'];?></span><?php endif;?>
                </div>

                <div class="contact-phone">
                  <ul class="fa fa-ul">
                    <?php if(isset($contact_info['phone']) && $contact_info['phone']!=='' ):?><li><i class="fa fa-fw fa-phone"></i> <span itemprop="telephone">
                      <a href="callto:<?php echo tw_clean_phone_number($contact_info['phone']);?>" title="<?php echo __('Call','tw'); ?> <?php echo bloginfo('name');?>"><?php echo $contact_info['phone']; ?></a>
                    </span></li><?php endif;?>

                    <?php if(isset($contact_info['toll_free']) && $contact_info['toll_free']!=='' ):?><li><i class="fa fa-fw fa-phone"></i> <span itemprop="telephone">
                      <a href="callto:<?php echo tw_clean_phone_number($contact_info['toll_free']);?>" title="<?php echo __('Call','tw'); ?> <?php echo bloginfo('toll_free');?>"><?php echo $contact_info['toll_free']; ?></a>
                    </span></li><?php endif;?>

                    <?php if(isset($contact_info['fax']) && $contact_info['fax']!=='' ):?><li><i class="fa fa-fw fa-fax"></i> <span itemprop="faxNumber"><?php echo $contact_info['fax']; ?></span></li><?php endif;?>

                    <?php if(isset($contact_info['Email']) && $contact_info['Email']!=='' ):?><li><i class="fa fa-fw fa-envelope"></i> <span itemprop="email">
                      <a href="mailto:<?php echo $contact_info['Email']; ?>" target="_blank" title="<?php echo __('Email','tw'); ?> <?php echo bloginfo('toll_free');?>"><?php echo $contact_info['Email']; ?></a>
                    </span></li><?php endif;?>
                  <ul>
                </div>
            </div>
          <?php endif; ?>

          <?php if($social_info): ?>
            <div class="contact-social">
             <h3><?php echo __('Social Networks','tw') ;?></h3>
              <ul>
                <?php foreach($social_info as $network=>$details): ?>
                  <li>
                    <a class="contact-<?php echo $network; ?>" href="<?php echo $details['url']; ?>" target="_blank" title="<?php echo ucfirst($network); ?>"><i class="fa <?php echo $details['icon']; ?>"></i></a>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endif; ?>

        </div><!-- .contact-details -->
        <div class="col-md-8 contact-form-area">
        <?php else: ?>
        <div class="col-md-12 contact-form-area">
        <?php endif; ?>
          <div class="contact-form-wrapper">
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
          </div>
        </div>
      </div>

      <footer class="page-footer">
    	<?php edit_post_link( __( 'Edit', 'tw' ), '<span class="edit-link">', '</span>' ); ?>
      </footer><!-- .entry-footer -->

    </div>
  <?php endwhile; 	?>
	</main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>