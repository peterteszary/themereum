<?php

/**
 * @package  ThemereumPlugin
 */
/*
Plugin Name: Themereum Plugin
Plugin URI: http://peterteszary.com
Description: Change the elements of the admin Dashboard
Version: 1.0.0
Author: Peter Teszáry
Author URI: http://peterteszary.com
License: GPLv2 or later
Text Domain: themereum-plugin
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2005-2015 Automattic, Inc.
*/

// If this file is called firectly, abort!!!
defined( 'ABSPATH' ) or die( 'Hey, what are you doing here? You silly human!' );


/*Admin Dashboard Style*/



// Add custom dashboard with styles

add_action('admin_head', 'custom_dashboard');
function custom_dashboard() {

  echo '<style>
 @import url("https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap");

/* Remove default dashboard column border */
.postbox {
border: none;
}

/* Customize columns */
p { /* regular text */
	font-size: 16px;
	text-align: center;
}  
hr { /* divider */
  height: 3px;
  background: #ebebeb;
  border: none;
  outline: none;
  width:20%;
  margin:1em auto;
  position: relative;
}
iframe {
margin-bottom: 1em;
}
.icon-container { /* customize icon shortcut columns. Add or remove 1fr for adding or removing columns */
  display: grid;
  grid-template-columns: 1fr 1fr 1fr 1fr; / * four columns */
  padding: 20px;
  text-align: center;
  font-family: "Ubuntu", sans-serif;
}
.video-container {  /* customize video columns */
  display: grid;
  grid-template-columns: 1fr 1fr ; /*two columns*/
  padding: 20px;
  text-align: center;
  font-family: "Ubuntu", sans-serif;
}
.default-container {  /* customize heading and contact form containers */
  display: grid;
  grid-template-columns: 1fr ; /* one column */
  padding: 20px 20px 0px 20px;
  text-align: center;
  font-family: "Ubuntu", sans-serif;
}
.column, .video-column {
 box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
}

@media (max-width: 520px) { /* for screens up to 520px. Modifies all container types */
  .icon-container, .video-container, .default-container {
    grid-template-columns: none;
	padding: 0px;
  }
}
@media (min-width: 521px) and (max-width: 767px) { /* for screens between 521 and 775px. Modifies only icon shortcut columns */
  .icon-container {
    grid-template-columns: 1fr 1fr;
	padding: 0px;
  }
}
@media (min-width: 768px) and (max-width: 990px) { /* for screens between 786 and 990px. Modifies only icon shortcut columns */
  .icon-container {
    grid-template-columns: 1fr 1fr 1fr;
	padding: 0px;
  }
}
    .column, .video-column { /* customize icon shortcut columns */
      background: #fff; 
	  color: #000;
	  padding: 30px; 
	  transition: background-color 0.5s ease;
	  text-transform: uppercase;
	  font-family: "Ubuntu", sans-serif;
	  font-size: 16px;
	  text-align: center;
	  text-decoration: none;
	  margin: 3%;
    } 
	.column:hover, .video-column:hover {  /* customize icon shortcut and video column hover style */
	background: #f9f9f9;
	}
	  .video-column { /* customize video columns */
	  padding: 10px 10px 20px 10px; 
    } 
		.column a, .video-column a { /* link colors */
	color: #000 !important;
	text-decoration: none;
	}
	
	/* SHORTCUT ICON CUSROMIZATION. It uses Dashicons, see here https://developer.wordpress.org/resource/dashicons/#menu-alt */
	
	.edit-pages:before { /* Edit pages */
	font-family: "dashicons"; 
	content: "\f123";
	font-size: 34px;
	margin-right: 7px;
	display: block;
	color: #2681B0;
	}
	.edit-posts:before { /* Edit posts */
	font-family: "dashicons"; 
	content: "\f109";
	font-size: 34px;
	margin-right: 7px;
	display: block;
	color: #2681B0;
	}
	.add:before { /* Add icon */
	font-family: "dashicons"; 
	content: "\f132";
	font-size: 34px;
	margin-right: 7px;
	display: block;
	color: #2681B0;
	}
	.edit-menu:before { /* Navigation icon */
	font-family: "dashicons"; 
	content: "\f329";
	font-size: 34px;
	margin-right: 7px;
	display: block;
	color: #2681B0;
	}
	.edit-orders:before { /* Orders icon */
	font-family: "dashicons"; 
	content: "\f163";
	font-size: 34px;
	margin-right: 7px;
	display: block;
	color: #2681B0;
	}
	.edit-products:before { /* Products icon */
	font-family: "dashicons"; 
	content: "\f174";
	font-size: 34px;
	margin-right: 7px;
	display: block;
	color: #2681B0;
	}
	}
  </style>';
}


// Create custom WordPress admin dashboard items

add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
function my_custom_dashboard_widgets() {
global $wp_meta_boxes;
wp_add_dashboard_widget('custom_help_widget', 'DASHBOARD', 'custom_dashboard_help');
}
function custom_dashboard_help() {
	// ROW WITH HEADING	
	echo '
	<div class="default-container">
	<h2>VEZÉRLŐPULT</h2>
	<hr>
	<p>Az alábbi gyorsgombokkal lehet a tartlamakat közvetlenül létrehozni </p>
		</div>';
	
// COLUMNS WITH SHORTCUTS	
	echo '<div class="icon-container"> 
	
  	
	  <div class="column"><a href="/wp-admin/edit.php" class="add">Bejegyzések módosítása</a></div>
	  <div class="column"><a href="/wp-admin/post-new.php" class="add">Bejegyzés hozzáadása</a></div>
	  <div class="column"><a href="/wp-admin/post-new.php?post_type=hir" class="add">Hír hozzáadása</a></div>
	  <div class="column"><a href="/wp-admin/post-new.php?post_type=palyazatok" class="add">Pályázat hozzáadása</a></div>
	  <div class="column"><a href="/wp-admin/post-new.php?post_type=hirdetes" class="add">Hirdetés hozzáadása</a></div>
	  <div class="column"><a href="/wp-admin/edit.php?post_type=informacios_oldalak" class="add">Info oldalak szerkesztése</a></div>
	  <div class="column"><a href="/wp-admin/admin.php?page=logo-es-kepek" class="add">Logó és képek</a></div>
	  <div class="column"><a href="/wp-admin/media-new.php" class="add">Média hozzáadása</a></div>
	  
  </div>';
  

	
// Don’rtemove this one here below	
}


// One column dashboard
function single_column( $columns ) {
    $columns['dashboard'] = 1;
    return $columns;
}
add_filter( 'screen_layout_columns', 'single_column' );
 
function one_column_dashboard(){
	return 1;
}
add_filter( 'get_user_option_screen_layout_dashboard', 'one_column_dashboard' );

/*Remove Widgets from Dashboard*/

function wpsh_remove_dashboard_widgets() {

	remove_meta_box( 'dashboard_primary','dashboard','side' ); // WordPress.com Blog
	remove_meta_box( 'dashboard_plugins','dashboard','normal' ); // Plugins
	remove_meta_box( 'dashboard_right_now','dashboard', 'normal' ); // Right Now
	remove_action( 'welcome_panel','wp_welcome_panel' ); // Welcome Panel
	remove_action( 'try_gutenberg_panel', 'wp_try_gutenberg_panel'); // Try Gutenberg
	remove_meta_box('dashboard_quick_press','dashboard','side'); // Quick Press widget
	remove_meta_box('dashboard_recent_drafts','dashboard','side'); // Recent Drafts
	remove_meta_box('dashboard_secondary','dashboard','side'); // Other WordPress News
	remove_meta_box('dashboard_incoming_links','dashboard','normal'); //Incoming Links
	remove_meta_box('rg_forms_dashboard','dashboard','normal'); // Gravity Forms
	remove_meta_box('dashboard_recent_comments','dashboard','normal'); // Recent Comments
	remove_meta_box('icl_dashboard_widget','dashboard','normal'); // Multi Language Plugin
	remove_meta_box('dashboard_activity','dashboard', 'normal'); // Activity
}
add_action( 'wp_dashboard_setup', 'wpsh_remove_dashboard_widgets' );

// Remove Elementor Overview widget
function disable_elementor_dashboard_overview_widget() {
	remove_meta_box( 'e-dashboard-overview', 'dashboard', 'normal');
}
add_action('wp_dashboard_setup', 'disable_elementor_dashboard_overview_widget', 40);

// remove WooCommerce Dashboard Status widgets
function remove_dashboard_widgets(){
remove_meta_box( 'woocommerce_dashboard_status', 'dashboard', 'normal');    
}
add_action('wp_user_dashboard_setup', 'remove_dashboard_widgets', 20);
add_action('wp_dashboard_setup', 'remove_dashboard_widgets', 20);

// Remove Site Health from the Dashboard
add_action(
    'wp_dashboard_setup',
    function () {
        global $wp_meta_boxes;
        unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_site_health'] );
    }
 );
 
