<?php
/*
 * Plugin Name: Custom Post Meta
	Plugin URL:
	Description: Demo of Plugin Custom Post Meta
	Version: 1.0
	Author: osman forhad
	Author URI: https://osmanforhad.net
	License: GPLv2 or later
	Text Domain:custom-post-meta-plug
	Domain Path: /languages/
 * */
class customPostMeta{

    /**
     * constructor Method
     */
    public function __construct(){

        /**
         * plugins_loaded action hook with callback
         */
        add_action('plugin_loaded', array($this,'cbx_plugin_load_text_domain'));

        /**
         * custom post type action hook with callback 
         */
        add_action('init',array($this, 'cbx_custom_postType'));

        /**
         * add custom metabox action hook with callback
         */
        add_action('admin_menu', array($this, 'cbx_add_custom_metabox'));

    }//end of constructor

    /**
     * loaded text domain callback function
     */
    public function cbx_plugin_load_text_domain(){

        /**
         * load text domain 
         * */
        load_plugin_textdomain(
            $plugin_domain = 'custom-post-meta-plug',//(string) (required)
            $path = 'false',//plugin folder path (string) (optional)
            $real_path = dirname(__FILE__) . "/languages" //plugin_rel_path (string) (optional) 
        );//end load text domain

    }//loaded text domain callback function

    /**
     * custom post type callback function
     */
    public function cbx_custom_postType(){

        /**
         * register post type
         */
        $postType_register = register_post_type(
            $post_type = 'cbx_products',//Post type key. (string) (Required)

            $postType_args = array(

                $labels_name = 'labels' => array(

                    $general_name = 'name' => __('latest products'),//General name for the post type
                    $nameOf_object = 'singular_name' => __('latest product')//Name of one object for the post type

                ),

                $public_label = 'public' => true,//Default label for this item
                $archive_label = 'has_archive' => true,//label for nav menus archive
                $custom_slug = 'rewrite' => array('slug' => 'my_product'),//Custom slug
            )

        );//end registe post type

    }//end custom post type call back function

    /**
     * custom metabox add callback function
     */
    public function cbx_add_custom_metabox(){

          add_meta_box(
           $metabox_id = 'cbx_metaboxText_Fields',//Unique id

          $Metabox_name =   __('Custom Meta Box Text Fields',//Meta box name 
           $plugin_textDomain =  'custom-post-meta-plug'),//text domain of plugin

           $renderCallback =  array($this, 'Displaycbx_custompostType_with_customMeta'),//for render html field callback

           $customPost_typeName = array('cbx_products')//Post type key. (string) (Required)
        );
        //write_log($test);

    }//end custom metabox add callback function

    /**
     * display or rendaring metabox callback function through the post param
     * @param $post
     */
    public function Displaycbx_custompostType_with_customMeta($post){
   
    }

}//end of the class

/**
 * initiate the class
 */
new customPostMeta();