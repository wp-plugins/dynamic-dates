<?php
if (! class_exists ( "DynamicDatesShortCodeController" )) {
	
	/**
	 * Dynamic_Dates.
	 */
	class DynamicDatesShortCodeController {
		private $gmt_offset;
		private $language;
		private $options;
		private $logger;
		function __construct() {
			$this->options = DynamicDatesOptions::getInstance ()->getOptions ();
			$this->logger = new DynamicDatesLogger ( 'DynamicDatesShortCodeController' );
			$current_offset = get_option('gmt_offset');
			$tzstring = get_option('timezone_string');
			$this->logger->debug ( sprintf ( 'gmt_offset=%s current_offset=%s timezone_name=%s', $current_offset, $tzstring, $this->gmt_offset ) );
			$this->gmt_offset = $tzstring;
			$this->language = get_locale ();
			$this->logger->debug ( sprintf ( "get_locale(): %s", $this->language ) );
			
			// register WordPress hooks
			add_shortcode ( "dynamic-dates-version", array (
					$this,
					"version_shortcode" 
			) );
			add_shortcode ( "date", array (
					$this,
					"date_shortcode" 
			) );
			add_shortcode ( "now", array (
					$this,
					"now_shortcode" 
			) );
			add_shortcode ( "yesterday", array (
					$this,
					"yesterday_shortcode" 
			) );
			add_shortcode ( "today", array (
					$this,
					"today_shortcode" 
			) );
			add_shortcode ( "tomorrow", array (
					$this,
					"tomorrow_shortcode" 
			) );
			add_shortcode ( "last-month", array (
					$this,
					"last_month_shortcode" 
			) );
			add_shortcode ( "this-month", array (
					$this,
					"this_month_shortcode" 
			) );
			add_shortcode ( "next-month", array (
					$this,
					"next_month_shortcode" 
			) );
			add_shortcode ( "last-year", array (
					$this,
					"last_year_shortcode" 
			) );
			add_shortcode ( "this-year", array (
					$this,
					"this_year_shortcode" 
			) );
			add_shortcode ( "next-year", array (
					$this,
					"next_year_shortcode" 
			) );
			// for versions of WordPress less than 3
			add_shortcode ( "last_month", array (
					$this,
					"last_month_shortcode" 
			) );
			add_shortcode ( "this_month", array (
					$this,
					"this_month_shortcode" 
			) );
			add_shortcode ( "next_month", array (
					$this,
					"next_month_shortcode" 
			) );
			add_shortcode ( "last_year", array (
					$this,
					"last_year_shortcode" 
			) );
			add_shortcode ( "this_year", array (
					$this,
					"this_year_shortcode" 
			) );
			add_shortcode ( "next_year", array (
					$this,
					"next_year_shortcode" 
			) );
		}
		/**
		 * Shortcode to return the current plugin version.
		 * From http://code.garyjones.co.uk/get-wordpress-plugin-version/
		 *
		 * @return string Plugin version
		 */
		function version_shortcode() {
			return DYNAMIC_DATES_VERSION;
		}
		/**
		 * This function handle all shortcode calls
		 *
		 * @param unknown $atts        	
		 * @param string $format        	
		 * @param string $time        	
		 * @param string $relative_to        	
		 */
		function handleShortCode($atts) {
			extract ( shortcode_atts ( array (
					"format" => 'r',
					"time" => 'now',
					"relative_to" => 'now',
					"gmt_offset" => '',
					"timezone" => '',
					"language" => $this->language,
					"parser" => '' 
			), $atts ) );
			if (! empty ( $gmt_offset ) && empty ( $timezone )) {
				$timezone = $gmt_offset;
			}
			if (empty ( $timezone )) {
				$timezone = $this->gmt_offset;
			}
			try {
				$this->logger->debug ( "language: " . $language );
				$allowInternational = $this->useInternational () && strcasecmp ( $parser, 'english' ) != 0;
				if (isset ( $this->options ['log_level'] )) {
					$d = new DynamicDatesConverter ( $allowInternational, $this->options ['log_level'] );
				} else {
					$d = new DynamicDatesConverter ( $allowInternational );
				}
				return $d->getDate ( $format, $time, $relative_to, $timezone, $language );
			} catch ( Exception $e ) {
				$this->logger->error ( $e->getMessage () );
				return '<em>[Dynamic Dates plugin error: ' . $e->getMessage () . ']</em>';
			}
		}
		private function useInternational() {
			// to be perfect, this should check to make sure the tag did not pass parser=english
			return class_exists ( 'IntlDateFormatter' ) && $this->options ['mode'] == 'international';
		}
		function now_shortcode($atts) {
			return $this->handleShortCode ( $atts );
		}
		function date_shortcode($atts) {
			return $this->handleShortCode ( $atts );
		}
		function yesterday_shortcode($atts) {
			$atts ['time'] = '-1 day';
			return $this->handleDayShortCode ( $atts );
		}
		function today_shortcode($atts) {
			return $this->handleDayShortCode ( $atts );
		}
		function tomorrow_shortcode($atts) {
			$atts ['time'] = '+1 day';
			return $this->handleDayShortCode ( $atts );
		}
		private function handleDayShortCode($atts) {
			if ($this->useInternational ()) {
				$atts ['format'] = 'EEEE';
			} else {
				$atts ['format'] = 'l';
			}
			return $this->handleShortCode ( $atts );
		}
		function last_month_shortcode($atts) {
			$atts ['time'] = '-1 month';
			return $this->handleMonthShortCode ( $atts );
		}
		function this_month_shortcode($atts) {
			return $this->handleMonthShortCode ( $atts );
		}
		function next_month_shortcode($atts) {
			$atts ['time'] = '+1 month';
			return $this->handleMonthShortCode ( $atts );
		}
		private function handleMonthShortCode($atts) {
			if ($this->useInternational ()) {
				$atts ['format'] = 'MMMM';
			} else {
				$atts ['format'] = 'F';
			}
			return $this->handleShortCode ( $atts );
		}
		function last_year_shortcode($atts) {
			$atts ['time'] = '-1 year';
			return $this->handleYearShortCode ( $atts );
		}
		function this_year_shortcode($atts) {
			return $this->handleYearShortCode ( $atts );
		}
		function next_year_shortcode($atts) {
			$atts ['time'] = '+1 year';
			return $this->handleYearShortCode ( $atts );
		}
		private function handleYearShortCode($atts) {
			if ($this->useInternational ()) {
				$atts ['format'] = 'y';
			} else {
				$atts ['format'] = 'Y';
			}
			return $this->handleShortCode ( $atts );
		}
	}
}
?>