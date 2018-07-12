<?php
get_header();
$authFeatImage = wp_get_attachment_url(get_post_thumbnail_id($post->ID) );
$detailsImageId = MultiPostThumbnails::get_post_thumbnail_id('post_type_name', 'custom_multi-thumbnail_id', $post->ID);
$bannerImage = wp_get_attachment_url($detailsImageId, NULL);
if($bannerImage!='') {
	$img = $bannerImage;
} else {
	$img = $authFeatImage;
}

?>