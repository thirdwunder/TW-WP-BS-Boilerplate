<?php
/*****************************************
* TW FAQ Plugin Actions and Filters

tw_faq_plugin_before_faq_single
tw_faq_plugin_after_faq_single
tw_faq_plugin_before_faq_single_title

tw_faq_plugin_before_faq_template
tw_faq_plugin_after_faq_template
tw_faq_plugin_before_faq_template_title

tw_faq_plugin_before_faq_archive
tw_faq_plugin_after_faq_archive
tw_faq_plugin_before_faq_archive_title

*****************************************/

function tw_faq_plugin_before_faq_action(){
  get_template_part( 'content/_breadcrumbs' );
}
add_action('tw_faq_plugin_before_faq_single', 'tw_faq_plugin_before_faq_action', 10);
add_action('tw_faq_plugin_before_faq_archive', 'tw_faq_plugin_before_faq_action', 10);
add_action('tw_faq_plugin_before_faq_template', 'tw_faq_plugin_before_faq_action', 10);


