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

    }//end of constructor

    /**
     * loaded text domain function
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

    }//loaded text domain function

}//end of the class

/**
 * initiate the class
 */
new customPostMeta();