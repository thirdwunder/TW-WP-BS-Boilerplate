<?php

function tw_faq_plugin_before_faq_action(){
  get_template_part( 'content/_breadcrumbs' );
}
add_action('tw_faq_plugin_before_faq', 'tw_faq_plugin_before_faq_action', 10);
add_action('tw_faq_plugin_before_faq_archive', 'tw_faq_plugin_before_faq_action', 10);
add_action('tw_faq_plugin_before_faq_template', 'tw_faq_plugin_before_faq_action', 10);

function tw_glossary_plugin_before_glossary_action(){
  get_template_part( 'content/_breadcrumbs' );
}
add_action('tw_glossary_plugin_before_glossary', 'tw_glossary_plugin_before_glossary_action', 10);

function tw_glossary_plugin_before_glossary_title_action(){
  //get_template_part( 'content/_breadcrumbs' );
}
add_action('tw_glossary_plugin_before_glossary_title', 'tw_glossary_plugin_before_glossary_title_action', 10);