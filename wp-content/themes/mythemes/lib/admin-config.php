<?php 
/*****
Includes
*****/
include('includes/contact_list.php');
include('includes/theme_option.php');
include('includes/report_list.php');
include('includes/newsletter_subscription.php');

/********
Post Type
********/
include('posttypes/banner.php');
include('posttypes/blogs.php');
include('posttypes/testimonials.php');
include('posttypes/careers.php');
/******
Metaboxes
******/
//include('metabox/enroll_now.php');
include('metabox/related_link.php');
//include('metabox/shortcodes.php');
include('metabox/common_metabox.php');
?>