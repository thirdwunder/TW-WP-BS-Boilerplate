<?php
/****************************************
TW Glossary Plugin Actions and Filters

tw_glossary_plugin_before_glossary_single
tw_glossary_plugin_after_glossary_single
tw_glossary_plugin_before_glossary_single_title

tw_glossary_plugin_before_glossary_template
tw_glossary_plugin_after_glossary_template
tw_glossary_plugin_before_glossary_template_title

tw_glossary_plugin_before_glossary_archive
tw_glossary_plugin_after_glossary_archive
tw_glossary_plugin_before_glossary_archive_title

*****************************************/

function tw_glossary_plugin_before_glossary_action(){
  get_template_part( 'content/_breadcrumbs' );
}
add_action('tw_glossary_plugin_before_glossary_single', 'tw_glossary_plugin_before_glossary_action', 10);

function tw_glossary_plugin_before_glossary_title_action(){
  //get_template_part( 'content/_breadcrumbs' );
}
add_action('tw_glossary_plugin_before_glossary_single_title', 'tw_glossary_plugin_before_glossary_title_action', 10);