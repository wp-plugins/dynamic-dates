<?php
if (! class_exists ( "DynamicDatesConverter" )) {
	
	/**
	 * This is where the "Heavy Lifting" gets done
	 * @author jasonhendriks
	 *
	 */
	class DynamicDatesConverter {
		private $allowIntlDateFormatter;
		
		/**
		 * Returns a formatted date supporting WordPress timezones
		 *
		 * @param string $format        	
		 * @param string $time        	
		 * @param string $relative_to        	
		 */
		function __construct($allowIntlDateFormatter = false) {
			$this->allowIntlDateFormatter = $allowIntlDateFormatter;
		}
		function getDate($format, $time = 'now', $relative_to = 'now', $gmt_offset = 'UTC', $language = 'en/US') {
			debugDD ( 'Formatting - format=' . $format . ' time=' . $time . ' relative_to=' . $relative_to . ' gmt_offset=' . $gmt_offset . ' language=' . $language );
			$answer = '';
			$timestamp = strtotime ( $time, strtotime ( $relative_to ) );
			if (class_exists ( 'IntlDateFormatter' ) && $this->allowIntlDateFormatter) {
				$fmt = new IntlDateFormatter ( $language, IntlDateFormatter::FULL, IntlDateFormatter::FULL, $gmt_offset, IntlDateFormatter::GREGORIAN, $format );
				$answer = $fmt->format ( $timestamp );
			} else if (class_exists ( 'DateTime' )) {
				$date = new DateTime ();
				if (! empty ( $gmt_offset ))
					$date->setTimezone ( new DateTimeZone ( $gmt_offset ) );
				$date->setTimestamp ( $timestamp );
				$answer = $date->format ( $format );
			} else {
				$answer = date ( $format, strtotime ( $time, strtotime ( $relative_to ) ) );
			}
			debugDD ( 'Formatting - ' . $answer );
			return $answer;
		}
	}
}
?>