<?php
if (! class_exists ( "DynamicDatesConverter" )) {
	
	/**
	 * This is where the "Heavy Lifting" gets done
	 * 
	 * @author jasonhendriks
	 *        
	 */
	class DynamicDatesConverter {
		private $allowIntlDateFormatter;
		private $logger;
		
		/**
		 * Returns a formatted date supporting WordPress timezones
		 *
		 * @param string $format        	
		 * @param string $time        	
		 * @param string $relative_to        	
		 */
		function __construct($allowIntlDateFormatter = false, $logLevel = DynamicDatesLogger::ERROR_INT) {
			$this->allowIntlDateFormatter = $allowIntlDateFormatter;
			$this->logger = new DynamicDatesLogger ( 'DynamicDatesConverter', $logLevel );
		}
		function getDate($format, $time = 'now', $relative_to = 'now', $gmt_offset = 'UTC', $language = 'en/US') {
			$this->logger->debug ( 'Formatting - format=' . $format . ' time=' . $time . ' relative_to=' . $relative_to . ' gmt_offset=' . $gmt_offset . ' language=' . $language );
			$answer = '';
			$timestamp = strtotime ( $time, strtotime ( $relative_to ) );
			if (class_exists ( 'IntlDateFormatter' ) && $this->allowIntlDateFormatter) {
				$fmt = new IntlDateFormatter ( $language, IntlDateFormatter::FULL, IntlDateFormatter::FULL, $gmt_offset, IntlDateFormatter::GREGORIAN, $format );
				$answer = $fmt->format ( $timestamp );
			} else if (class_exists ( 'DateTime' )) {
				$date = new DateTime ();
				$date->setTimestamp ( $timestamp );
				$time = $date->format('His');
				// don't set a timezone if the constructed date contains no time!
				if ($time != '000000' && ! empty ( $gmt_offset ))
					$date->setTimezone ( new DateTimeZone ( $gmt_offset ) );
				$answer = $date->format ( $format );
			} else {
				$answer = date ( $format, strtotime ( $time, strtotime ( $relative_to ) ) );
			}
			$this->logger->debug ( 'Formatting - ' . $answer );
			return $answer;
		}
	}
}
?>