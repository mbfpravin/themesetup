<?php add_action('init', 'create_careers', 0);

function create_careers() {
    $labels = array(
        'name' => _x('Careers', 'post type general name'),
        'singular_name' => _x('Careers', 'post type singular name'),
        'add_new' => _x('Add Careers', 'Careers'),
        'add_new_item' => __('Add Careers'),
        'edit_item' => __('Edit Careers'),
        'new_item' => __('New Careers'),
        'view_item' => __('View Careers'),
        'search_items' => __('Search Careers'),
        'not_found' => __('No Careers found'),
        'not_found_in_trash' => __('No Careers found in Trash'),
        'parent_item_colon' => ''
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'career','with_front' => FALSE,),
        'capability_type' => 'post',
        'hierarchical' => true,
        'menu_position' => 7,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'page-attributes')
    );

    register_post_type('career', $args);
    register_taxonomy("career_cat", "career", array("hierarchical" => true,
        "label" => "Career Categories",
        "singular_label" => "Career",
        'rewrite' => array('slug' => 'career','with_front' => FALSE,),
        "query_var" => true,
        "show_ui" => true
            )
    );

}
?>