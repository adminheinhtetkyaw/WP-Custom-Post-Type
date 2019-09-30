<?php

/**
 * @wordpress-plugin
 * Plugin Name:       Custom Post Type - Work
 * Plugin URI:        https://gitlab.com/future-reference/custom-post-work
 * Description:       WordPress plugin that creates a custom post type named 'work'
 * Version:           1.0.1
 * Author:            Future Reference
 * Author URI:        http://futurereference.co/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       custom-post-work
 * GitLab Plugin URI: https://gitlab.com/future-reference/custom-post-work
 */

add_action('init', 'work_fr_register_post_types');

function work_fr_register_post_types()
{
    /* Register the Work post type. */
    register_post_type(
        'work',
        array(
            'description'         => '',
            'public'              => true,
            'publicly_queryable'  => true,
            'show_in_nav_menus'   => false,
            'show_in_admin_bar'   => true,
            'exclude_from_search' => false,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'menu_position'       => 20,
            'menu_icon'           => 'dashicons-format-image',
            'can_export'          => true,
            'delete_with_user'    => false,
            'hierarchical'        => false,
            'has_archive'         => true,
            'capability_type'     => 'post',

            /* The rewrite handles the URL structure. */
            'rewrite' => array(
                'slug'       => 'work',
                'with_front' => false,
                'pages'      => true,
                'feeds'      => true,
                'ep_mask'    => EP_PERMALINK,
            ),

            /* What features the post type supports. */
            'supports' => array(
                'title',
                'editor',
                'revisions',
                'thumbnail'
            ),

            /* Labels used when displaying the posts. */
            'labels' => array(
                'name'               => __('Works',                    'futurereference'),
                'singular_name'      => __('Work',                     'futurereference'),
                'menu_name'          => __('Works',                    'futurereference'),
                'name_admin_bar'     => __('Works',                    'futurereference'),
                'add_new'            => __('Add New',                   'futurereference'),
                'add_new_item'       => __('Add New Work',             'futurereference'),
                'edit_item'          => __('Edit Work',                'futurereference'),
                'new_item'           => __('New Work',                 'futurereference'),
                'view_item'          => __('View Work',                'futurereference'),
                'search_items'       => __('Search Works',             'futurereference'),
                'not_found'          => __('No works found',           'futurereference'),
                'not_found_in_trash' => __('No works found in trash',  'futurereference'),
                'all_items'          => __('Works',                    'futurereference'),
            )
        )
    );
}

add_action('init', 'work_fr_register_taxonomies');
function work_fr_register_taxonomies()
{
    /* Register the Work Category taxonomy. */
    register_taxonomy(
        'work_category',
        array('work'),
        array(
            'public'            => true,
            'show_ui'           => true,
            'show_in_menu'      => true,
            'show_in_nav_menus' => true,
            'show_tagcloud'     => false,
            'show_admin_column' => true,
            'hierarchical'      => true,
            /* The rewrite handles the URL structure. */
            'rewrite' => array(
                'slug'         => 'works',
                'with_front'   => false,
                'hierarchical' => true,
                'ep_mask'      => EP_NONE
            ),
            /* Labels used when displaying taxonomy and terms. */
            'labels' => array(
                'name'                       => __('Work Categories',          'futurereference'),
                'singular_name'              => __('Work Category',           'futurereference'),
                'menu_name'                  => __('Work Categories',          'futurereference'),
                'name_admin_bar'             => __('Work Category',           'futurereference'),
                'search_items'               => __('Search Work Categories',   'futurereference'),
                'popular_items'              => __('Popular Work Categories',  'futurereference'),
                'all_items'                  => __('All Work Categories',      'futurereference'),
                'edit_item'                  => __('Edit Work Category',      'futurereference'),
                'view_item'                  => __('View Work Category',      'futurereference'),
                'update_item'                => __('Update Work Category',    'futurereference'),
                'add_new_item'               => __('Add New Work Category',   'futurereference'),
                'new_item_name'              => __('New Work Category',       'futurereference'),
                'parent_item_colon'          => __('',                          'futurereference'),
                'separate_items_with_commas' => null,
                'add_or_remove_items'        => null,
                'choose_from_most_used'      => null,
                'not_found'                  => null,
            )
        )
    );
}
