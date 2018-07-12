<?php add_action('init', 'create_testimonials', 0);

function create_testimonials() {
    $labels = array(
        'name' => _x('Testimonials', 'post type general name'),
        'singular_name' => _x('Testimonials', 'post type singular name'),
        'add_new' => _x('Add Testimonials', 'Testimonials'),
        'add_new_item' => __('Add Testimonials'),
        'edit_item' => __('Edit Testimonials'),
        'new_item' => __('New Testimonials'),
        'view_item' => __('View Testimonials'),
        'search_items' => __('Search Testimonials'),
        'not_found' => __('No Testimonials found'),
        'not_found_in_trash' => __('No Testimonials found in Trash'),
        'parent_item_colon' => ''
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'testimonials','with_front' => FALSE,),
        'capability_type' => 'post',
        'hierarchical' => true,
        'menu_position' => 7,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'page-attributes')
    );

    register_post_type('testimonials', $args);
    register_taxonomy("testimonials_cat", "testimonials", array("hierarchical" => true,
        "label" => "Testimonials Categories",
        "singular_label" => "Testimonials",
        'rewrite' => array('slug' => 'testimonials','with_front' => FALSE,),
        "query_var" => true,
        "show_ui" => true
            )
    );

}
?>