<?php
/**
 * Plugin Name: Contact Form
 * Description: Sample Contact form
 * Author: Dhruv Pawar
 * Text Domain: Sample-contact-form
 * 
 */

 if(!defined('ABSPATH')){

    exit;
 }

 class sampleCotntactForm{
      public function __construct()
      {
         
         add_action('init', array($this,'create_custom_post_type'));
         // assets(js, css)
         add_action('wp_enque_scripts',array($this, 'load_assets'));
         
         add_shortcode('contact-form', array($this, 'load_shortcode'));
      }
      public function create_custom_post_type(){

         $args = array(
            'public' => true,
            'has_archive' => true,
            'suppports' => array('title'),
            'exclude_form_search' => true,
            'publicly_queryable' => false,
            'capability' => 'manage_options',
            'labels' => array(
                  'name' => 'Contact Form Entry'
            ),
            'menu_icon' => 'dashicons-media-text',

         );
         register_post_type('simple_contact_form',$args);
         
      }

      public function load_assets(){
         wp_enqueue_style(
            'contact-form',
            plugin_dir_url(__FILE__).'css/contact-form.css',
            array(),
            1,
            'all'
         );   
         wp_enqueue_script(
            'contact-form',
            plugin_dir_url(__FILE__). 'js/contact-form.js',
            array('jquery'),
            1,
            true
         );
      }   
         public function load_shortcode()
         {?>
               <h1>Send us an email</h1>
               <p> Please fill the below form</p>
               <input type="text" placeholder="Name">
               <input type="email" placeholder="Email">
               <input type="tel" placeholder="Phone">
               <textarea placeholder="Type your message"></textarea>


         <?php }
      
 }
 new sampleCotntactForm;
?>
