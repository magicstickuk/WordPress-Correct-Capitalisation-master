<?php
/*
* Plugin Name: WordPress Correct Capitalisation
* Version: 1.0
* Plugin URI: http://www.wpmaz.uk
* Description: A simple plugin to correct capitalisation of the word 'WordPress' in posts
* Author: Mario Jaconelli
* Author URI: http://www.wpmaz.uk
* Requires at least: 4.0
* Tested up to: 4.0
*
* Text Domain: wordpress-correct-capitalisation
*
* @package WordPress
* @author Mario Jaconelli
* @since 1.0.0
*/
 

/**
* A simple plugin that corrects any incorrect capitaliation of the word 'WordPress'
* before saving your data to the database.
*
* @since  1.0.0
* @return object WordPress_Plugin_Template
*/
 

function correct_capitalisation_WordPress( $data , $postarr ) {
 
  $correct_capitalisation 		= array();

  $incorrect_capitalisations 	= array(

  										'post_content' 	=> $data['post_content'],
  										'post_title' 	=> $data['post_title'],
  										'post_excerpt' 	=>$data['post_excerpt']

  										);

  foreach ($incorrect_capitalisations  as $key => $incorrect_capitalisation) {

  		$correct_capitalisation[$key] = str_ireplace("wordpress", "WordPress", $incorrect_capitalisation);
  		$data[$key]  = $correct_capitalisation[$key];
  }
 
  return $data;
 

}
 

add_filter( 'wp_insert_post_data', 'correct_capitalisation_WordPress', '99', 2 );

?>