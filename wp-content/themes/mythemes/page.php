<?php 
get_header();
?>
<div class="container genericpage">
	<div class="row">
		<div class="col-12">
		   	<div class="white-bg"> 
			   <?php echo apply_filters('the_content',$post->post_content  );?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>