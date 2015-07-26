<?php if ( function_exists('yoast_breadcrumb') && !is_front_page()  ) {
  $breadcrumbs = yoast_breadcrumb( '<ul class="breadcrumb row" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope
      itemtype="http://schema.org/ListItem">', '</li></ul>', false );
  $breadcrumbs = str_replace('Home', '<i class="fa fa-home"></i>', $breadcrumbs);
  $breadcrumbs = str_replace( '&raquo;', '</li><li>', $breadcrumbs );
  $breadcrumbs = str_replace( '<a', '<a itemprop="item"', $breadcrumbs );
  echo $breadcrumbs;
} ?>