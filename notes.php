<?php 
/**
 * Plugin Name: Custom Post Type - Notes
 * Plugin URI: 
 * Description: Add Private Notes to wordpress
 * Version: 1.0.0
 * Author: Factory Digital Web
 * Author URI: 
 * License: GPL
 */


// Hooking up our function to theme setup
add_action( 'init', 'custom_post_type' );

/*
* Creating a function to create our CPT
*/

function custom_post_type() {
  
  // Set UI labels for Custom Post Type
      $labels = array(
          'name'                => _x( 'Notes', 'Post Type General Name' ),
          'singular_name'       => _x( 'Note', 'Post Type Singular Name' ),
          'menu_name'           => __( 'Notes' ),
          'parent_item_colon'   => __( 'Parent Note' ),
          'all_items'           => __( 'All Notes'),
          'view_item'           => __( 'View Note'),
          'add_new_item'        => __( 'Add New Note' ),
          'add_new'             => __( 'Add New' ),
          'edit_item'           => __( 'Edit Note' ),
          'update_item'         => __( 'Update Note'),
          'search_items'        => __( 'Search Note' ),
          'not_found'           => __( 'Not Found' ),
          'not_found_in_trash'  => __( 'Not found in Trash' ),
          
      );
        
  // Set other options for Custom Post Type
        
      $args = array(
          'label'               => __( 'Notes' ),
          'description'         => __( 'Note news and reviews' ),
          'labels'              => $labels,
          'menu_icon'           => __('dashicons-welcome-write-blog'),
         
          // Features this CPT supports in Post Editor
          'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
          // You can associate this CPT with a taxonomy or custom taxonomy. 
          'taxonomies'          => array( 'genres' ),
          
          /* A hierarchical CPT is like Pages and can have
          * Parent and child items. A non-hierarchical CPT
          * is like Posts.
          */
          'hierarchical'        => false,
          'public'              => true,
          'show_ui'             => true,
          'show_in_menu'        => true,
          'show_in_nav_menus'   => true,
          'show_in_admin_bar'   => true,
          'menu_position'       => 5,
          'can_export'          => true,
          'has_archive'         => true,
          'exclude_from_search' => false,
          'publicly_queryable'  => true,
          'capability_type'     => 'post',
          'show_in_rest' => true,
    
      );
        
      // Registering your Custom Post Type
      register_post_type( 'Notes', $args );
    
  }

  function add_my_custom_page() {
    // Create post object
    $my_post = array(
      'post_title'    => wp_strip_all_tags( 'My Custom Page' ),
      'post_content'  => 'My custom page content',
      'post_status'   => 'publish',
      'post_author'   => 1,
      'post_type'     => 'page',
    );

    // Insert the post into the database
    wp_insert_post( $my_post );
}

register_activation_hook(__FILE__, 'add_my_custom_page');