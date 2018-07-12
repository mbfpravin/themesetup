<?php 
    $currentYear = date("Y");
    $designYear = 2018;
    $year = ($currentYear > $designYear) ? $designYear." - ".date("y") : $currentYear;
?>
<footer>
		<?php 
		$facebook = get_option('facebook');
		$instagram = get_option('instagram');
		$twitter = get_option('twitter');
		$googlePlus = get_option('googleplus');
		$linkedIn = get_option('linked_in');
		$rssFeed = get_option('rssfeed');
		$pinInterest = get_option('pininterest');
		?>
		<div class="footer-nav-left">
			<ul class="footer-icons">
				<?php if($linkedIn!='') { ?>
				    <li>
						<a href="<?php echo $linkedIn; ?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
					</li>
				<?php } ?>
		   	  	<?php if($facebook!='') { ?>
				    <li>
						<a href="<?php echo $facebook; ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
					</li>
				<?php if($twitter!='') { ?>
				    <li>
						<a href="<?php echo $twitter; ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
					</li>
				<?php } ?>
				<?php } ?>
			  	<?php if($instagram!='') { ?>
				    <li>
						<a href="<?php echo $instagram; ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
					</li>
				<?php } ?>
				<?php if($googlePlus!='') { ?>
				    <li>
						<a href="<?php echo $googlePlus; ?>" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
					</li>
				<?php } ?>
				<?php if($pinInterest!='') { ?>
				    <li>
						<a href="<?php echo $pinInterest; ?>" target="_blank"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
					</li>
				<?php } ?>
				<?php if($rssFeed!='') { ?>
				    <li>
						<a href="<?php echo $rssFeed; ?>" target="_blank"><i class="fa fa-rss" aria-hidden="true"></i></a>
					</li>
				<?php } ?>
		   </ul>
			<p>The Digital Enterprise &copy; <?php echo $year; ?> All Rights Reserved.</p>
		</div>
	</div>
</footer>
<!-- end of footer section -->
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.js"></script>
<script src="<?php echo get_bloginfo('template_url'); ?>/js/app.js"></script>
<script src="<?php echo get_bloginfo('template_url'); ?>/js/wow.js"></script>
<script src="<?php echo get_bloginfo('template_url'); ?>/js/custom.js"></script>
<?php wp_footer(); ?>
</body>
</html>