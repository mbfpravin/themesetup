<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="<?php echo get_bloginfo('template_url'); ?>/img/TDE-SVG-FINAL.svg" type="image/x-icon" />
	<title><?php wp_title(); ?></title>
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
	<?php wp_head(); ?>
	<script type="text/javascript">
			var templateUri = "<?php echo get_bloginfo('template_url'); ?>";
			var blogUri = "<?php echo get_bloginfo('url'); ?>";
			var templateUri = '<?php echo TMPL_URL; ?>';
	</script>
	<style>
		body{
			background-color: #fff;
		}  
		.render-blk{ opacity:0; }
	</style>
	<script type="text/javascript">
		var styleSheets = ["css/app.css","style.css"];
		for (i = 0; i < styleSheets.length; i++) { 
			 var linkVal = "<?php echo get_bloginfo('template_url'); ?>/"+styleSheets[i];
			 var link = document.createElement('link')
			 link.setAttribute('rel', 'stylesheet')
			 link.setAttribute('type', 'text/css')
			 link.setAttribute('href', linkVal);
			 document.getElementsByTagName('head')[0].appendChild(link)
		}
	</script>
	<noscript>
		<style  media="screen">
			.render-blk{ opacity: 1; }  
		</style>
	</noscript>
</head>
<body <?php body_class(); ?>>
<div class="render-blk">
<!-- header section -->
<header class="home-header">
	<a href="<?php echo get_bloginfo('url'); ?>" >
		<img src="<?php echo get_bloginfo('template_url'); ?>/img/logo-final.png" class="sublogo tab-show" alt="mobilelogo" />
	</a>
			<div class="container">
				<div class="menu-blk">	
					<div class="row">
						<div class="col-3">
					    <a href="#" class="logo">
						 logo
					    </a>
					  </div>
					  <div class="col-9">
					  	<nav class="sub-menu">
							<ul>
								<li>
									<a href="#">ABOUT US</a>
								</li>
								<li>
									<a href="#">MEET THE TEAM</a>
								</li>
								<li>
									<a href="#">CONDITIONS WE SEE</a>
								</li>
								<li>
									<a href="#">TREATMENT</a>
								</li>
								<li>
									<a href="#">RESOURCES</a>
								</li>
								<li>
									<a href="#">TESTIMONIALS</a>
								</li>
							</ul>
							</nav>	
						</div>		
         </div>
         </div>
         <div class="social-icons">
         	<ul>
         		<li>
         	    <a href="#">
         		    <i class="fa fa-mail">HELP@CMHC.COM</i>
            	</a>
            </li>
            <li>
         	  	<a href="#">
         		    <i class="fa fa-mail">HELP@CMHC.COM</i>
         	    </a>
         	  </li>
         	  <li>
         	  	<a href="#">
         		   <i class="fa fa-mail">HELP@CMHC.COM</i>
         	    </a>
            </li>
         	</ul>
         </div>
         </div>
</header>