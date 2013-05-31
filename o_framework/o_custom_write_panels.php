<?php

## CREATE SLIDER CUSTOM POST TYPE META BOXES

add_action('save_post', 'o_save_slider_settings');

function o_add_slider_meta () {

add_meta_box('o_slider_settings', "Slider Item Settings", 'o_slider_settings_meta_box', 'slider', 'normal', 'high');

}

function o_slider_settings_meta_box () {

wp_nonce_field( plugin_basename(__FILE__), 'myplugin_noncename' );

?>

<div style="padding: 0px 20px 20px 20px;">

<h2>Slide Order (The position of the slide in the slider)</h2>

<input type="text" style="width: 29%;" name="o_slider_item_order" value="<?php echo get_post_meta($_GET['post'], 'o_slider_item_order', 12351); ?>" /> 
</div>

<?
}

function o_save_slider_settings ($post_id) {

  if ( !wp_verify_nonce( $_POST['myplugin_noncename'], plugin_basename(__FILE__) )) {
    return $post_id;
  }

  if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
    return $post_id;

  if ( 'page' == $_POST['post_type'] ) {
    if ( !current_user_can( 'edit_page', $post_id ) )
      return $post_id;
  } else {
    if ( !current_user_can( 'edit_post', $post_id ) )
      return $post_id;
  }

  update_post_meta($post_id, 'o_slider_item_order', $_POST['o_slider_item_order']);    
  
}


## CREATE WORK POST TYPE CUSTOM META BOXES

add_action('save_post', 'o_save_work_select');
add_action('add_meta_boxes', 'o_add_work_select_box');

function o_add_work_select_box(){
	add_meta_box('o_work_select', "Work Options", 'o_work_select_meta_box', 'page', 'normal', 'high');
}

function o_work_select_meta_box(){
	wp_nonce_field( plugin_basename(__FILE__), 'myplugin_noncename' );

	$custom_fields = get_post_custom_values('_wp_page_template', $_GET['post']);
	$page_template = $custom_fields[0];
	
	?>
	
	<div style="padding: 0px 20px 0px 20px;">
	
	<?php
	
	if ($page_template == "work.php") {
	
	echo '<h2>Choose the Work you wish to display.</h2>';
	
	$gallery_check = get_post_meta($_GET['post'], 'o_work_select', 23231);
	
	?>
	
	<select name="o_work_select" style="width: 99%;"> 
	 <option value="">Select a Work...</option> 
	 <?php 
	  $categories=  get_categories('taxonomy=works-categories'); 
	  foreach ($categories as $category) {
		$option = '<option value="' . $category->category_nicename . '"';
		if ($category->category_nicename == $gallery_check) $option .= "selected";
		$option .= ">";
		$option .= $category->cat_name;
		$option .= '</option>';
		echo $option;		
	  }
	 ?>
	</select>
    <?php
    } else {

	echo '<h2>Choose from one of the page templates in order to display one.</h2>';

	}
	?>

	</div>
	<?php 
}


function o_save_work_select ($post_id) {

 if ( !wp_verify_nonce( $_POST['myplugin_noncename'], plugin_basename(__FILE__) )) {
    return $post_id;
  }

  if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
    return $post_id;

  if ( 'page' == $_POST['post_type'] ) {
    if ( !current_user_can( 'edit_page', $post_id ) )
      return $post_id;
  } else {
    if ( !current_user_can( 'edit_post', $post_id ) )
      return $post_id;
  }
  
  $p_gallery_select = $_POST['o_work_select'];
    
  $custom_fields = get_post_custom_values('_wp_page_template', $_GET['post']);
  $page_template = $custom_fields[0];
  
  update_post_meta($post_id, 'o_work_select', $p_gallery_select);
  
  return;
    
}


## CREATE TEARSHEET CUSTOM POST TYPE META BOXES

add_action('save_post', 'o_save_tearsheet_settings');
add_action('add_meta_boxes', 'o_add_tearsheet_meta');

function o_add_tearsheet_meta () {

add_meta_box('o_tearsheet_settings', "Tearsheet Item Settings", 'o_tearsheet_settings_meta_box', 'tearsheet', 'normal', 'high');

}

function o_tearsheet_settings_meta_box () {

wp_nonce_field( plugin_basename(__FILE__), 'myplugin_noncename' );

?>

<div style="padding: 0px 20px 20px 20px;">

<ul>
	<li>
    <h2>Year</h2>
    <input type="text" style="width: 29%;" name="o_tearsheet_item_year" value="<?php echo get_post_meta($_GET['post'], 'o_tearsheet_item_year', 12351); ?>" /> 
    (Enter the year history for Tearsheet items)
    </li>
    
    <li>
    <h2>Link File</h2>
    <input type="text" style="width: 49%;" name="o_tearsheet_item_url" value="<?php echo get_post_meta($_GET['post'], 'o_tearsheet_item_url', 12351); ?>" /> 
    (Past the link file for this tearsheet item)
    </li>
    
    <li>
    <h2>Country</h2>
    <input type="text" style="width: 49%;" name="o_tearsheet_item_country" value="<?php echo get_post_meta($_GET['post'], 'o_tearsheet_item_country', 12351); ?>" /> 
    (Enter the country name for this tearsheet item)
    </li>
</ul>

</div>

<?
}

function o_save_tearsheet_settings ($post_id) {

  if ( !wp_verify_nonce( $_POST['myplugin_noncename'], plugin_basename(__FILE__) )) {
    return $post_id;
  }

  if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
    return $post_id;

  if ( 'page' == $_POST['post_type'] ) {
    if ( !current_user_can( 'edit_page', $post_id ) )
      return $post_id;
  } else {
    if ( !current_user_can( 'edit_post', $post_id ) )
      return $post_id;
  }
  
  update_post_meta($post_id, 'o_tearsheet_item_year', $_POST['o_tearsheet_item_year']);
  update_post_meta($post_id, 'o_tearsheet_item_url', $_POST['o_tearsheet_item_url']);
  update_post_meta($post_id, 'o_tearsheet_item_country', $_POST['o_tearsheet_item_country']);

}


?>