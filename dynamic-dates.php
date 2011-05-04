<?php
/*

		Plugin Name: Dynamic Dates
		Plugin URI: http://www.jasonhendriks.com/programmer/dynamic-dates/
		Description: A WordPress plugin that dynamically calculates dates in your post or page
		Version: 1.0.1
		Author: Jason Hendriks
		Author URI: http://jasonhendriks.com/
		License: GPL version 3 or any later version
		
		** Requires WordPress 2.7 **
		
		Copyright (C) 2011  Jason Hendriks
		
		This program is free software: you can redistribute it and/or modify
		it under the terms of the GNU General Public License as published by
		the Free Software Foundation, either version 3 of the License, or
		(at your option) any later version.
		
		This program is distributed in the hope that it will be useful,
		but WITHOUT ANY WARRANTY; without even the implied warranty of
		MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
		GNU General Public License for more details.
		
		You should have received a copy of the GNU General Public License
		along with this program.  If not, see <http://www.gnu.org/licenses/>.

 */

if(!class_exists("Dynamic_Dates")) {

	/**
	 * Dynamic_Dates.
	 */
	class Dynamic_Dates {
			
		function Dynamic_Dates() {
			add_shortcode( "date", array( $this, "date_shortcode") );
			add_shortcode( "dynamic-dates-version", array( $this, "version_shortcode") );
			add_shortcode( "yesterday", array( $this, "yesterday_shortcode") );
			add_shortcode( "today", array( $this, "today_shortcode") );
			add_shortcode( "tomorrow", array( $this, "tomorrow_shortcode") );
			add_shortcode( "last-month", array( $this, "last_month_shortcode") );
			add_shortcode( "this-month", array( $this, "this_month_shortcode") );
			add_shortcode( "next-month", array( $this, "next_month_shortcode") );
			add_shortcode( "last-year", array( $this, "last_year_shortcode") );
			add_shortcode( "this-year", array( $this, "this_year_shortcode") );
			add_shortcode( "next-year", array( $this, "next_year_shortcode") );
		}
	
		/**
		 * Shortcode to return the current plugin version.
		 * From http://code.garyjones.co.uk/get-wordpress-plugin-version/
		 *
		 * @return string Plugin version
		 */
		function version_shortcode() {
			return $this->get_version();
		}

		/**
		 * Shortcode to return the current plugin version.
		 * From http://code.garyjones.co.uk/get-wordpress-plugin-version/
		 *
		 * @return string Plugin version
		 */
		function get_version() {
			if ( ! function_exists( "get_plugins" ) ) {
				require_once( ABSPATH . "wp-admin/includes/plugin.php" );
			}
			$plugin_folder = get_plugins( "/" . plugin_basename( dirname( __FILE__ ) ) );
			$plugin_file = basename( ( __FILE__ ) );
			return $plugin_folder[$plugin_file]["Version"];
		}


		function yesterday_shortcode() {
			return $this->get_date("l", "-1 day");
		}

		function today_shortcode() {
			return $this->get_date("l");
		}

		function tomorrow_shortcode() {
			return $this->get_date("l", "+1 day");
		}

		function last_month_shortcode() {
			return $this->get_date("F", "-1 month");
		}

		function this_month_shortcode() {
			return $this->get_date("F");
		}

		function next_month_shortcode() {
			return $this->get_date("F", "+1 month");
		}

		function last_year_shortcode() {
			return $this->get_date("Y", "-1 year");
		}

		function this_year_shortcode() {
			return $this->get_date("Y");
		}

		function next_year_shortcode() {
			return $this->get_date("Y", "+1 year");
		}

		function date_shortcode($atts) {
			extract(shortcode_atts(array(
				"format" => "c",
				"output" => "c",
				"time" => "now"
			), $atts));
			if($output != "c") {
				$format = $output;
			}
			return $this->get_date($format, $time);
		}

		function get_date($format="c", $time="now") {
			return date($format, strtotime($time));
		}
	}
}

// start the meat and potatoes
if (class_exists("Dynamic_Dates")) {
    $dynamic_dates = new Dynamic_Dates();
}

?>
