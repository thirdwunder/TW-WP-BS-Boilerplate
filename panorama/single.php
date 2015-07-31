<?php
/* Custom Single.php for project only view */
$primary_sidebar = tw_is_sidebar_enabled();

global $post, $doctype;
get_header();
$panorama_access = panorama_check_access($post->ID);
?>
<!-- Site Container -->
<div id="site-content" class="container-fluid">
  <div id="site-container" class="row">

<div id="psp-project">
    <?php while(have_posts()): the_post(); ?>

		<input type="hidden" id="psp-task-style" value="<?php the_field('expand_tasks_by_default',$post->ID); ?>">

        <?php do_action('psp_the_header'); ?>

        <?php if ($panorama_access == 1) : ?>

            <?php do_action('psp_before_overview'); ?>

            <section id="overview" class="wrapper psp-section">

                <?php do_action('psp_before_essentials'); ?>
                <?php do_action('psp_the_essentials'); ?>
                <?php do_action('psp_after_essentials'); ?>

            </section> <!--/#overview-->

            <?php do_action('psp_between_overview_progress'); ?>

            <section id="psp-progress" class="cf psp-section">

                <?php do_action('psp_before_progress'); ?>
                <?php do_action('psp_the_progress'); ?>
                <?php do_action('psp_after_progress'); ?>

            </section> <!--/#progress-->

            <?php do_action('psp_between_progress_phases'); ?>

            <section id="psp-phases" class="wrapper psp-section">

                <?php do_action('psp_before_phases'); ?>
                <?php do_action('psp_the_phases'); ?>
                <?php do_action('psp_after_phases'); ?>

            </section>

            <?php do_action('psp_between_phases_discussion'); ?>

            <!-- Discussion -->
            <section id="psp-discussion" class="psp-section cf">
                <div class="wrapper">
                    <div class="discussion-content">

                        <?php $commentPath = getcwd().'/psp-comment-part.php'; ?>
                        <?php comments_template($commentPath,true); ?>

                    </div>
                </div>
            </section>

        <?php endif; ?>

        <?php if($panorama_access == 0): ?>
            <div id="overview" class="psp-comments-wrapper">
                <div id="psp-login">
                    <?php if(($panorama_access == 0) && (get_field('restrict_access_to_specific_users'))): ?>
                        <h2><?php _e('This Project Requires a Login','psp_projects'); ?></h2>
                        <?php if(!is_user_logged_in()) {
                            echo panorama_login_form();
                        } else {
                            echo "<p>".__('You don\'t have permission to access this project','psp_projects')."</p>";
                        }
                        ?>
                    <?php endif; ?>
                    <?php if((post_password_required()) && (!current_user_can('manage_options'))): ?>
                        <h2><?php _e('This Project is Password Protected','psp_projects'); ?></h2>
                        <?php echo get_the_password_form(); ?>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>


    <?php endwhile; // ends the loop ?>

</div> <!--/#psp-project-->

  </div><!-- #site-container -->
</div><!-- #site-content -->
<?php get_footer(); ?>