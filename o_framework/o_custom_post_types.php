<?php 

add_action('init', 'o_register_sliders_type');
add_action('init', 'o_register_bio_type');
add_action('init', 'o_register_works_type');
add_action('init', 'o_register_tearsheet_type');

## ADD WORK POST TYPE

function o_register_works_type () {

$labels = array(

    'name' => _x('Work Items', 'post type general name'),
    'singular_name' => _x('Work Item', 'post type singular name'),
    'add_new' => _x('Add New', 'work'),
    'add_new_item' => __('Add A New Work Item'),
    'edit_item' => __('Edit Work Item'),
    'new_item' => __('New Work Item'),
    'view_item' => __('View Work Item'),
    'search_items' => __('Search Work Items'),
    'not_found' =>  __('No work items found'),
    'not_found_in_trash' => __('No work items found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Work Items'

);

$args = array (
'labels' => $labels,
'public' => true,
'show_ui' => true,
'publicly_queryable' => true,
'capability_type' => 'post',
'supports' => array ('thumbnail', 'excerpt', 'comments', 'editor', 'title', 'custom-fields', 'revisions', 'author'),
'menu_position' => 20, 
'menu_icon' => get_stylesheet_directory_uri() . '/images/k-menu.gif',
'register_meta_box_cb' => 'o_add_work_meta',
'query_var' => true,
'rewrite' => true
);

register_post_type('work', $args);

$g_labels = array(
    'name' => _x( 'Works', 'taxonomy general name' ),
    'singular_name' => _x( 'Work', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Works' ),
    'popular_items' => __( 'Popular Works' ),
    'all_items' => __( 'All Works' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Works' ), 
    'update_item' => __( 'Update Works' ),
    'add_new_item' => __( 'Add New Work' ),
    'new_item_name' => __( 'New Work Name' ),
    'separate_items_with_commas' => __( 'Separate Works with commas' ),
    'add_or_remove_items' => __( 'Add or remove Works' ),
    'choose_from_most_used' => __( 'Choose from the most used Works' ),
    'menu_name' => __( 'Works' ),
);
  
register_taxonomy("works-categories", array("work"), array("hierarchical" => true, "label" => "Works", "singular_label" => "Works Category", "labels" => $g_labels, 'query_var' => true, "rewrite" => true, "show_in_nav_menus" => true));

add_post_type_support('works', 'thumbnail'); 

}


## ADD SLIDER POST TYPE

function o_register_sliders_type () {

$labels = array(

    'name' => _x('Slider Items', 'post type general name'),
    'singular_name' => _x('Slider Item', 'post type singular name'),
    'add_new' => _x('Add New', 'slider'),
    'add_new_item' => __('Add A New Slider Item'),
    'edit_item' => __('Edit Slider Item'),
    'new_item' => __('New Slider Item'),
    'view_item' => __('View Slider Item'),
    'search_items' => __('Search Slider Items'),
    'not_found' =>  __('No slider items found'),
    'not_found_in_trash' => __('No slider items found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Slider Items'

);

$args = array (
'labels' => $labels,
'public' => true,
'show_ui' => true,
'publicly_queryable' => true,
'capability_type' => 'post',
'supports' => array ('thumbnail', 'title', 'revisions', 'author'),
'menu_position' => 20, 
'menu_icon' => get_stylesheet_directory_uri() . '/images/k-menu.gif',
'register_meta_box_cb' => 'o_add_slider_meta',
'query_var' => true,
'rewrite' => true
);

register_post_type('slider', $args);

$g_labels = array(
    'name' => _x( 'Sliders', 'taxonomy general name' ),
    'singular_name' => _x( 'Slider', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Sliders' ),
    'popular_items' => __( 'Popular Sliders' ),
    'all_items' => __( 'All Sliders' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Slider' ), 
    'update_item' => __( 'Update Slider' ),
    'add_new_item' => __( 'Add New Slider' ),
    'new_item_name' => __( 'New Slider Name' ),
    'separate_items_with_commas' => __( 'Separate sliders with commas' ),
    'add_or_remove_items' => __( 'Add or remove sliders' ),
    'choose_from_most_used' => __( 'Choose from the most used sliders' ),
    'menu_name' => __( 'Sliders' ),
);
  
register_taxonomy("slider-categories", array("slider"), array("hierarchical" => true, "label" => "Sliders", "singular_label" => "Slider Category", "labels" => $g_labels, 'query_var' => true, "rewrite" => true, "show_in_nav_menus" => true));

add_post_type_support('slider', 'thumbnail'); 

}



## ADD TEARSHEET POST TYPE

function o_register_tearsheet_type () {

$labels = array(

    'name' => _x('Tearsheet Items', 'post type general name'),
    'singular_name' => _x('Tearsheet Item', 'post type singular name'),
    'add_new' => _x('Add New', 'tearsheet'),
    'add_new_item' => __('Add A New Tearsheet Item'),
    'edit_item' => __('Edit Tearsheet Item'),
    'new_item' => __('New Tearsheet Item'),
    'view_item' => __('View Tearsheet Item'),
    'search_items' => __('Search Tearsheet Items'),
    'not_found' =>  __('No tearsheet items found'),
    'not_found_in_trash' => __('No tearsheet items found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Tearsheet Items'

);

$args = array (
'labels' => $labels,
'public' => true,
'show_ui' => true,
'publicly_queryable' => true,
'capability_type' => 'post',
'supports' => array ('title', 'custom-fields', 'author'),
'menu_position' => 20, 
'menu_icon' => get_stylesheet_directory_uri() . '/images/k-menu.gif',
'register_meta_box_cb' => 'o_add_tearsheet_meta',
'query_var' => true,
'rewrite' => true
);

register_post_type('tearsheet', $args);

$g_labels = array(
    'name' => _x( 'Tearsheet', 'taxonomy general name' ),
    'singular_name' => _x( 'Tearsheet', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Tearsheet' ),
    'popular_items' => __( 'Popular Tearsheet' ),
    'all_items' => __( 'All Tearsheet' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Tearsheet' ), 
    'update_item' => __( 'Update Tearsheet' ),
    'add_new_item' => __( 'Add New Tearsheet' ),
    'new_item_name' => __( 'New Tearsheet Name' ),
    'separate_items_with_commas' => __( 'Separate tearsheet with commas' ),
    'add_or_remove_items' => __( 'Add or remove tearsheet' ),
    'choose_from_most_used' => __( 'Choose from the most used tearsheet' ),
    'menu_name' => __( 'Tearsheet' ),
);
  
register_taxonomy("tearsheet-categories", array("tearsheet"), array("hierarchical" => true, "label" => "Tearsheet", "singular_label" => "Tearsheet Category", "labels" => $g_labels, 'query_var' => true, "rewrite" => true, "show_in_nav_menus" => true));

}


## ADD BIOGRAPHY POST TYPE

function o_register_bio_type(){

$labels = array(

    'name' => _x('Biography Items', 'post type general name'),
    'singular_name' => _x('Biography Item', 'post type singular name'),
    'add_new' => _x('Add New', 'biography'),
    'add_new_item' => __('Add A New Biography Item'),
    'edit_item' => __('Edit Biography Item'),
    'new_item' => __('New Biography Item'),
    'view_item' => __('View Biography Item'),
    'search_items' => __('Search Biography Items'),
    'not_found' =>  __('No biography items found'),
    'not_found_in_trash' => __('No biography items found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Biography Items'

);

$args = array (
'labels' => $labels,
'public' => true,
'show_ui' => true,
'publicly_queryable' => true,
'capability_type' => 'post',
'supports' => array ('title', 'editor', 'custom-fields', 'author'),
'menu_position' => 20, 
'menu_icon' => get_stylesheet_directory_uri() . '/images/k-menu.gif',
'register_meta_box_cb' => 'o_add_biography_meta',
'query_var' => true,
'rewrite' => true
);

register_post_type('biography', $args);

$g_labels = array(
    'name' => _x( 'Biography', 'taxonomy general name' ),
    'singular_name' => _x( 'Biography', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Biography' ),
    'popular_items' => __( 'Popular Biography' ),
    'all_items' => __( 'All Biography' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Biography' ), 
    'update_item' => __( 'Update Biography' ),
    'add_new_item' => __( 'Add New Biography' ),
    'new_item_name' => __( 'New Biography Name' ),
    'separate_items_with_commas' => __( 'Separate biography with commas' ),
    'add_or_remove_items' => __( 'Add or remove biography' ),
    'choose_from_most_used' => __( 'Choose from the most used biography' ),
    'menu_name' => __( 'Biography' ),
);
  
register_taxonomy("biography-categories", array("biography"), array("hierarchical" => true, "label" => "Biography", "singular_label" => "Biography Category", "labels" => $g_labels, 'query_var' => true, "rewrite" => true, "show_in_nav_menus" => true));
	
}


## Biography_columns, <-  register_post_type then append _columns
add_filter("manage_edit-biography_columns", "bio_edit_columns");
add_action("manage_posts_custom_column",  "bio_custom_columns");

function bio_edit_columns($columns){

		$newcolumns = array(
			"cb" => "<input type=\"checkbox\" />",
			"title" => "Title",
			"biography-categories" => "Categories"
		);
		
		$columns= array_merge($newcolumns, $columns);

		return $columns;
}

function bio_custom_columns($column){
		global $post;
		switch ($column)
		{
			case "description":
				#the_excerpt();
				break;
			case "biography-categories":
				echo get_the_term_list($post->ID, 'biography-categories', '', ', ','');
				break;
		}
}

## Work_columns, <-  register_post_type then append _columns
add_filter("manage_edit-work_columns", "work_edit_columns");
add_action("manage_posts_custom_column",  "work_custom_columns");

function work_edit_columns($columns){

		$newcolumns = array(
			"cb" => "<input type=\"checkbox\" />",
			"title" => "Title",
			"thumbnail" => "Images",
			"works-categories" => "Categories"
		);
		
		$columns= array_merge($newcolumns, $columns);

		return $columns;
}

function work_custom_columns($column){
		global $post;
		switch ($column)
		{
			case "description":
				#the_excerpt();
				break;
			case "thumbnail":								
				echo the_post_thumbnail(array(100,100));
				
				break;
			case "works-categories":
				echo get_the_term_list($post->ID, 'works-categories', '', ', ','');
				break;
		}
}


## Slider_columns, <-  register_post_type then append _columns
add_filter("manage_edit-slider_columns", "slider_edit_columns");
add_action("manage_posts_custom_column",  "slider_custom_columns");

function slider_edit_columns($columns){

		$newcolumns = array(
			"cb" => "<input type=\"checkbox\" />",
			"title" => "Title",
			"thumbnail" => "Images",
			"slider-categories" => "Categories"
		);
		
		$columns= array_merge($newcolumns, $columns);

		return $columns;
}

function slider_custom_columns($column){
		global $post;
		switch ($column)
		{
			case "description":
				#the_excerpt();
				break;

			case "slider-categories":
				echo get_the_term_list($post->ID, 'slider-categories', '', ', ','');
				break;
		}
}


?>