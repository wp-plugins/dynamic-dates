<?php
//
require_once 'Core.php';
date_default_timezone_set ( 'UTC' );

// test 1
$test1 = new testDateTime ();
$test1->testCases ();
print "\n";
// test2
$test2 = new testIntlDateFormatter ();
$test2->testCases ();
print "\n";

/**
 * Formatting comes from http://php.net/manual/en/function.date.php
 * 
 * @author jasonhendriks
 *        
 */
class testDateTime {
	function testCases() {
		$this->test ( '%s', "Y-m-d\\TH:i:s+e", 'now', 'now' );
		$this->test ( '%s', "l, F j, Y \\a\\t g:i:s A e" );
		$this->test ( 'Toronto: %s', "l, F j, Y \\a\\t g:i:s A e", 'now', 'now', 'EST' );
		$this->test ( 'Paris: %s', "l, F j Y H:i:s", 'now', 'now', 'Europe/Paris', 'FR' );
		
		// Copyright © 2015 Jason Hendriks
		$this->test ( 'Copyright © %s Jason Hendriks', 'Y' );
		// Copyright © 2015 Jason Hendriks
		// Our church’s next service is on February 1/15
		$this->test ( 'Our church’s next service is on %s', 'M d/y', 'this Sunday' );
		// Next year my birthday is on a Friday!
		$this->test ( 'In %s I was two years younger', 'Y', '2 years ago' );
		// Next year my Christmas is on a Friday!
		$this->test ( 'Next year Christmas is on a %s!', 'l', 'december 25th +1 year' );
		// Canadian Thanksgiving is October 12 this year and October 10 in 2016
		$this->test ( 'Canadian Thanksgiving is %s this year', 'M d', 'second monday of october' );
		$this->test ( 'Canadian Thanksgiving is %s next year', 'M d', 'second monday of october', 'next year' );
	}
	private function test($text, $format = null, $time = 'now', $relative_to = 'now', $gmt_offset = 'UTC', $language = 'en/US') {
		$d = new DynamicDatesConverter ( false );
		print sprintf ( $text, $d->getDate ( $format, $time, $relative_to, $gmt_offset, $language ) ) . "\n";
	}
}

/**
 * IntlDateFormatter uses International Components for Unicode (ICU)
 * see http://userguide.icu-project.org/formatparse/datetime
 *
 * @author jasonhendriks
 *        
 */
class testIntlDateFormatter {
	function testCases() {
		$this->test ( '%s', "yyyy-MM-dd'T'HH:mm:ss+zzz", 'now', 'now' );
		$this->test ( '%s', null );
		$this->test ( 'Toronto: %s', null, 'now', 'now', 'EST' );
		$this->test ( 'Paris: %s', "EEEE', 'MMMM dd yyyy HH:mm:ss", 'now', 'now', 'Europe/Paris', 'FR' );
		
		// Copyright © 2015 Jason Hendriks
		$this->test ( 'Copyright © %s Jason Hendriks', 'Y' );
		// Copyright © 2015 Jason Hendriks
		// Our church’s next service is on February 1/15
		$this->test ( 'Our church’s next service is on %s', 'MMM dd/yy', 'this Sunday' );
		// Next year my birthday is on a Friday!
		$this->test ( 'In %s I was two years younger', 'Y', '2 years ago' );
		// Next year my Christmas is on a Friday!
		$this->test ( 'Next year Christmas is on a %s!', 'EEEE', 'december 25th +1 year' );
		// Canadian Thanksgiving is October 12 this year and October 10 in 2016
		$this->test ( 'Canadian Thanksgiving is %s this year', 'MMMM d', 'second monday of october' );
		$this->test ( 'Canadian Thanksgiving is %s next year', 'MMMM d', 'second monday of october', 'next year' );
	}
	private function test($text, $format = null, $time = 'now', $relative_to = 'now', $gmt_offset = 'UTC', $language = 'en/US') {
		$d = new DynamicDatesConverter ( true );
		print sprintf ( $text, $d->getDate ( $format, $time, $relative_to, $gmt_offset, $language ) ) . "\n";
	}
}
?>