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
         * assets script load action hook with callback
         */
        add_action('admin_enqueue_scripts',array($this, 'cbx_customPostMeta_pluginAssets'));

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

    }//end loaded text domain callback function

    /**
     * load accets script callback function
     */
    public function cbx_customPostMeta_pluginAssets(){

        /**
         * Declare global post Type
         */
        global $post_type;

        /**
         * Name of custom post page
         */
        $CustomPost_PageName = 'cbx_products';//post page url (string) (Required)

        /**
         * check post type
         */
		if ($post_type == $CustomPost_PageName) {

            /**
             * register script
             */
        $register_Script =	wp_register_script(//start register script
            
                $script_Name = 'customscript-js',//Unique Name (string) (Required)
                
                
			$file_path = plugins_url( '/assets/js/datepicker.js',//Url of the script (string|bool) (Required) 
                    __FILE__ ),
                    
                array(
                   $Scripthandaler_name = 'jquery',//(string) (Required) Name of the script
                $nameOf_Script = 'jquery-ui-datepicker' ),

                $jsversionNumber = '1.0',
                 $visibality =  true );//end register script 

                 /**
                  * cdn style for date picker
                  */
               $style_datepicker =  wp_enqueue_style(
                  $Uihandaler_Name = 'jquery-ui-css',//(string) (Required) Name of the stylesheet
               $cdnFile_path = '//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css',//(string) (Optional) Full URL of the stylesheet
                $dependecy = null,//no dependency 
               $cssvesionNumber = time()//use for cdn updated version
            );//end cdn style
                
               $script_type = wp_enqueue_script($Scripthandaler_name);//script type

               $customScript_type = wp_enqueue_script($script_Name);//custom script type

		}//end check post type

    }//end load assets script callback function

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

        /**
         * custom metabox for text option
         */
          $metbox_textField = add_meta_box(
           $metabox_id = 'cbx_metaboxText_Fields',//Unique id

          $Metabox_name =   __('Custom Meta Box Text Fields',//Meta box name 
           $plugin_textDomain =  'custom-post-meta-plug'),//text domain of plugin

           $renderCallback =  array($this, 'Displaycbx_customMeta_field'),//for render html field callback

           $customPost_typeName = array('cbx_products')//Post type key. (string) (Required)
        );//end metabox for text option

        //write_log($metbox_textField );

    }//end custom metabox add callback function

    /**
     * display or rendaring metabox callback function through the post param
     * @param $post
     */
    public function Displaycbx_customMeta_field($post){

        /**
         * metafield label
         */
        $text_label = __( //start text label

            $field_name = 'Text Field',//field Name (string) (Required)
            $domain_name = 'custom-post-meta-plug'//plugin text domain (optional)

        );//end text label

        $email_label = __( //start email label

            $field_name = 'Email Field',//field Name (string) (Required)
            $domain_name = 'custom-post-meta-plug'//plugin text domain (optional)

        );//end email label

        $password_label = __( //start password label

            $field_name = 'Password Field',//field Name (string) (Required)
            $domain_name = 'custom-post-meta-plug'//plugin text domain (optional)

        );//end password label

        $datepicker_label = __( //start datepiecker label

            $field_name = 'Date Field',//field Name (string) (Required)
            $domain_name = 'custom-post-meta-plug'//plugin text domain (optional)

        );//end datepicker label


          /**
         * end metafield label
         */

        /**
         * Display HTML Text Field
        */

        ?>
        
        <!--html for text field-->
        <p>
        <label for="text_field"><?php echo $text_label; ?>:</label>
        <input type ="text" name="" id="" value="" placeholder="Name Here">
        </p> <!--end html text field-->
        <br>

        <!--html for email field-->
        <p>
        <label for="email_field"><?php echo $email_label; ?>:</label>
        <input type ="email" name="" id="" value="" placeholder="Email Here">
        </p> <!--end html email field-->
        <br>

        <!--html for password field-->
        <p>
        <label for="password_field"><?php echo $password_label; ?>:</label>
        <input type ="password" name="" id="" value="" placeholder="Password Here">
        </p> <!--end html password field-->
        <br>

        <!--html for datepicker field-->
        <p>
        <label for="password_field"><?php echo $datepicker_label; ?>:</label>
        <input type ="text" name="cbx_meta[cbx_metabox_date]" id="cbx_metabox_date" value="" placeholder="mm/dd/yy">
        </p> <!--end html datepicker field-->
        <br>

        <?php

        /**
         * end Display HTML Text Field
        */
    }

}//end of the class

/**
 * initiate the class
 */
new customPostMeta();