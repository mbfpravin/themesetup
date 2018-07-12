<?php
	@ini_set( 'upload_max_size' , '64M' );
	@ini_set( 'post_max_size', '64M');
	@ini_set( 'max_execution_time', '300' );    
	add_action('init', 'init_custom_load');
	if (!defined('TMPL_URL')) {
	    define('TMPL_URL', get_template_directory_uri());
	}
	function init_custom_load(){
	    
	if(is_admin()) {
	    wp_enqueue_style('admin_css', TMPL_URL.'/lib/css/admin_css.css', false, '1.0', 'all');
	    wp_enqueue_style('font-awesome.min', '//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css');
	    wp_enqueue_style('jquery-ui-css', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');
	    wp_enqueue_script('admin_js', TMPL_URL.'/js/lib/admin.js', false, '1.0', 'all');
	}
	}
	remove_action('wp_head', 'wp_generator');
	show_admin_bar(false);
	require_once(ABSPATH . 'wp-admin/includes/user.php');
	
	/* For post types and metabox */
	require_once(TEMPLATEPATH . "/lib/admin-config.php");

	/* Featured Image */
	add_theme_support('post-thumbnails');
	
	/*	Menu Backend */
	add_theme_support( 'menus' );
	
	/*	Multipost Thumbnail Image */
   if (class_exists('MultiPostThumbnails')) { 
    	$types = array('post_type_name'); 
    	foreach($types as $type) {
    		new MultiPostThumbnails(array('label' => 'custom_label_name', 'id' => 'custom_image_id', 'post_type' => $type)); 
    	}

    };
	/*	For Excerpt */
	add_post_type_support('page', 'excerpt');

	/* Format the content */
	function content_formatter($content) {
	    $bad_content = array('<p></div></p>', '<p><div class="full', '_width"></p>', '</div></p>', '<p><ul', '</ul></p>', '<p><div', '<p><block', 'quote></p>', '<p><hr /></p>', '<p><table>', '<td></p>', '<p></td>', '</table></p>', '<p></div>', 'nosidebar"></p>', '<p><p>', '<p><a', '</a></p>', '_half"></p>', '_third"></p>', '_fourth"></p>', '<p><p', '</p></p>', 'child"></p>', '<p></p>');
	    $good_content = array('</div>', '<div class="full', '_width">', '</div>', '<ul', '</ul>', '<div', '<block', 'quote>', '<hr />', '<table>', '<td>', '</td>', '</table>', '</div>', 'nosidebar">', '<p>', '<a', '</a>', '_half">', '_third">', '_fourth">', '<p', '</p>', 'child">', '');
	    $new_content = str_replace($bad_content, $good_content, $content);
	    return $new_content;
	}
	remove_filter('the_content', 'wpautop');
	add_filter('the_content', 'wpautop', 10);
	add_filter('the_content', 'content_formatter', 11);

	/* For empty paragraph */
	function shortcode_empty_paragraph_fix_tag($content) {
	   $array = array(
	      '<p>[' => '[',
	      ']</p>' => ']',
	      '<p></p>' => '',
	      ']<br />' => ']'
	   );
	   $content = strtr($content, $array);
	   return $content;
	}

	/*********
    Remove Image Height and Width
    **********/
	
	function remove_width_attribute( $html ) {
	 $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
	 return $html;
	}
	add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10,3 );
	add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

	add_filter( 'the_content', 'remove_thumbnail_dimensions', 10 );
	function remove_thumbnail_dimensions( $html ) {
	  $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
	  return $html;
	}
	/*********
    Remove P tag from images
    **********/
	function filter_ptags_on_images($content) {
    $content = preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
    return preg_replace('/<p>\s*(<iframe .*>*.<\/iframe>)\s*<\/p>/iU', '\1', $content);
	}
	add_filter('acf_the_content', 'filter_ptags_on_images');
	add_filter('the_content', 'filter_ptags_on_images');

	/********To support svg *************/
   	function cc_mime_types($mimes) {
 		$mimes['svg'] = 'image/svg+xml';
 		return $mimes;
	}
	add_filter('upload_mimes', 'cc_mime_types');


 	/*********Post-Tags*********/
	add_action( 'init', 'gp_register_taxonomy_for_object_type' );

	function gp_register_taxonomy_for_object_type() {
	 	$types = array( 'post_types' );
	 	foreach ($types as $type) {
		 	register_taxonomy_for_object_type( 'post_tag', $type );
	 	}
	};
	
	/********
	Shortcodes
	*********/

	function span( $atts, $content = null ) {
	   $content = preg_replace('#^<\/p>|<p>$#', '', $content);
	   $content=shortcode_empty_paragraph_fix_tag($content);
	   return '<span>'.do_shortcode($content).'</span>';
	}
	add_shortcode('span', 'span');

	function break_tag( $atts, $content = null ) {
	   $content = preg_replace('#^<\/p>|<p>$#', '', $content);
	   $content=shortcode_empty_paragraph_fix_tag($content);
	   return '</br>';
	}
	add_shortcode('break_tag', 'break_tag');

	function div_tag( $atts, $content = null ) {
	   $content = preg_replace('#^<\/p>|<p>$#', '', $content);
	   $content=shortcode_empty_paragraph_fix_tag($content);
	   return '<div>'.do_shortcode($content).'</div>';
	}
	add_shortcode('div_tag', 'div_tag');

	function col_8_center($atts, $content = null) {
    	$content = preg_replace('#^<\/p>|<p>$#', '', $content);
	    $content=shortcode_empty_paragraph_fix_tag($content);
	    return ' <div class="col-8 center-block">' .do_shortcode($content).'
		            </div>';

	}
	add_shortcode('col_8_center', 'col_8_center');

	function accordion_container($atts, $content = null) {
    	$content = preg_replace('#^<\/p>|<p>$#', '', $content);
	    $content=shortcode_empty_paragraph_fix_tag($content);
	    return ' <div class="component-accordion">' .do_shortcode($content).'</div>';

	}
	add_shortcode('accordion_container', 'accordion_container');

	function accordion_row($atts, $content = null) {
    	$content = preg_replace('#^<\/p>|<p>$#', '', $content);
	    $content=shortcode_empty_paragraph_fix_tag($content);
	    return '<div class="accordion-blk">' .do_shortcode($content).'</div>';

	}
	add_shortcode('accordion_row', 'accordion_row');

	function accordion_content($atts, $content = null) {
    	$content = preg_replace('#^<\/p>|<p>$#', '', $content);
	    $content=shortcode_empty_paragraph_fix_tag($content);
	    return '<div class="accordion-content">' .do_shortcode($content).'</div>';

	}
	add_shortcode('accordion_content', 'accordion_content');

	function row($atts, $content = null) {
    	$content = preg_replace('#^<\/p>|<p>$#', '', $content);
	    $content=shortcode_empty_paragraph_fix_tag($content);
	    return '<div class="row">' .do_shortcode($content).'</div>';

	}
	add_shortcode('row', 'row');

	function six_column($atts, $content = null) {
    	$content = preg_replace('#^<\/p>|<p>$#', '', $content);
	    $content=shortcode_empty_paragraph_fix_tag($content);
	    return '<div class="col-6">' .do_shortcode($content).'</div>';

	}
	add_shortcode('six_column', 'six_column');

	function eight_column($atts, $content = null) {
    	$content = preg_replace('#^<\/p>|<p>$#', '', $content);
	    $content=shortcode_empty_paragraph_fix_tag($content);
	    return '<div class="col-8">' .do_shortcode($content).'</div>';

	}
	add_shortcode('eight_column', 'eight_column');
    
	function four_column($atts, $content = null) {
    	$content = preg_replace('#^<\/p>|<p>$#', '', $content);
	    $content=shortcode_empty_paragraph_fix_tag($content);
	    return '<div class="col-4"><div class= "subsection">' .do_shortcode($content).'</div></div>';

	}
	add_shortcode('four_column', 'four_column');


	function video_content( $atts, $content = null ) {
		$content = preg_replace('#^<\/p>|<p>$#', '', $content);
		$content=shortcode_empty_paragraph_fix_tag($content);
		return '<div class= "video-section"><div class="embed-responsive embed-responsive-16by9 video-section "> <iframe class="embed-responsive-item" src="'.$atts["videosrc"].'" allowfullscreen></iframe> </div>'.
		do_shortcode($content).'</div>';
	}
	add_shortcode('video_content', 'video_content');


function custom_loginlogo() {
echo '<style type="text/css">
h1 a {background: url('.get_bloginfo('template_directory').'/img/logosub.png) no-repeat center !important; display: block; height: 90px !important; width: auto !important; }
.login,html{ background: #150e20 url('.get_bloginfo('template_directory').'/admin/images/home-values3.jpg) repeat-x !important; background-position: center bottom !important; }
</style>';
}
add_action('login_head', 'custom_loginlogo');



if ( ! function_exists( 'wp_css_login' ) ){
function wp_css_login(){
echo '<link href="'.get_bloginfo('template_directory').'/admin/css/wp-login.css" rel="stylesheet" media="all"  />';
}
add_action('login_head','wp_css_login');
}

?>
