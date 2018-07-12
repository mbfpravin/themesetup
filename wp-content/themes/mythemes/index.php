<?php
/**********
Template Name: Home page
**********/
get_header();
$allPostTypes=array('post_type_name'); /*Give your custom posttypes name*/
$allPostArgs = array(
    'post_type'     => $allPostTypes,
    'numberposts' => -1,
    'order'         => 'DESC', 
    'orderby' => 'date',
    'post_status'   => 'publish',
      'meta_query' => array(
        array(
            'key' => 'show_in_banner', /*Metabox to show in banner section*/
            'value' => 'yes'
        )                                                
    ),   
); 
$allPosts = get_posts($allPostArgs);
?>
<section class="hero-banner banner-slider">
				<div class="hero-banner-slider">
					<img src="<?php echo get_bloginfo('template_url'); ?>/img/hero-banner.jpg">
					<div class="hero-banner-desc-left">
						<div class="container">
							<div class="hero-banner-content">					
								<h2>Empowering you</h2>
								<p>Lorum ipsum color sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enimad minim veniam, quis nostrudlamco.</p>				
							</div>
						</div>
					</div>
				</div>
				<div class="hero-banner-slider">
					<img src="<?php echo get_bloginfo('template_url'); ?>/img/hero-banner.jpg">
					<div class="hero-banner-desc-left">
						<div class="container">
							<div class="hero-banner-content">					
								<h2>Empowering you</h2>
								<p>Lorum ipsum color sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enimad minim veniam, quis nostrudlamco.</p>				
							</div>
						</div>
					</div>
				</div>
				<div class="hero-banner-slider">
					<img src="<?php echo get_bloginfo('template_url'); ?>/img/hero-banner.jpg">
					<div class="hero-banner-desc-left">
						<div class="container">
							<div class="hero-banner-content">					
								<h2>Empowering you</h2>
								<p>Lorum ipsum color sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enimad minim veniam, quis nostrudlamco.</p>				
							</div>
						</div>
					</div>
				</div>
			</section>
			<section>
				  <div class="button-section">
				  	<div class="container">
				    	<p>How can we help?</p>
				    	<button class="button button-primary">
				 		     CONDITIONS WE SEE
				 			</button>
				 			<button class="button button-primary">
				 	  		MEET THE TEAM
				 			</button>
				 			<button class="button-secondary">
				 				BOOK AN APPOINMENT
				 			</button>
				 	</div>	
				</div>
			</section>
<!-- Index section -->
<?php
	$subPageArgs = array( 
	   'post_parent'   => $post->ID,
	   'post_type'     => 'page', 
	   'order'         => 'ASC', 
	   'orderby'       => 'menu_order',
	   'post_status'   => 'publish',
	   'numberposts' => -1 
	); 
	$subPages = get_posts($subPageArgs);
		if (is_array($subPages) && count($subPages)>0) { 
	   	foreach ($subPages as $subPage) {
		   $postId = $subPage->ID;
		   $pageTemplate = get_post_meta($postId, '_wp_page_template', true);
		   $getTempPath = TEMPLATEPATH .'/'. $pageTemplate;
		   include TEMPLATEPATH .'/'. $pageTemplate;
	   	}
	} 
?>
<?php get_footer(); ?>