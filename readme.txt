=== Dynamic Dates ===
Contributors: jasonhendriks
Tags: dynamic, date, dates, time, times, calculator, format, formatter, formatting
Requires at least: 2.7
Tested up to: 4.1
Stable tag: 1.0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A WordPress plugin that calculates dates and relative dates dynamically in your post or page.

== Description ==

A WordPress plugin that calculates dates and relative dates dynamically. Custom dates can be inserted in your post or page with short-codes.

Add an always up-to-date copyright notice, or the date of your next monthly poker game.

Requires WordPress 3.0 and PHP 5.3.

== Installation ==

1. Download Dynamic Dates
1. Unzip and upload the resulting folder to the '/wp-content/plugins/' directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Place a Dynamic Date shortcode in your posts and/or pages. A theme template function call is also available.

== Frequently Asked Questions ==

= How does it work? =

Dynamic Dates uses the built-in PHP functions date and strtotime to parse and display custom dates.

= How can I display a date? =

Use one of the built-in shortcodes:

> `[yesterday]`, `[today]`, `[tomorrow]`, `[last-month]`, `[this-month]`, `[next-month]`, `[last-year]`, `[this-year]`, `[next-year]`

Note: If you are *not* using WordPress 3 or later, you should substitute the hyphen in the shortcode with an underscore. Example: [this_year]

= How can I display a customized date? =

This is a very powerful feature. Use the [date] shortcode, providing *format*, *time* and the optional *relative_to*:

[date format="*[Format](http://php.net/manual/en/function.date.php)*" time="*[Date or Time](http://php.net/manual/en/datetime.formats.relative.php)*" [relative_to="*[Date or Time](http://php.net/manual/en/datetime.formats.relative.php)*"] ]

> `[date format="F j/Y" time="this Sunday"]`

> `[date format="Y" time="2 years ago"]`

> `[date format="l" time="march 4th +1 year"]`

> `[date format="F jS" time="second monday of october"]`

> `[date format="F jS" time="second monday of october" relative_to="next year"]`

See [live examples](http://programmer.jasonhendriks.com/programmer/dynamic-dates/dynamic-dates-examples/) at my website.


== Changelog ==

= 1.0.1 =
* Release date: 2015-01-23
* A biennial update to re-list Dynamic Dates in the WordPress plugin directory

= 1.0.0 =
* Release date: 2011-05-03
* First release
* Tested with PHP v5.3.4

== Upgrade Notice ==

= 1.0.1 =
A superficial update to re-list Dynamic Dates in the WordPress plugin directory

= 1.0.0 =
The first version. Yay!

== Screenshots ==

1. Dynamic Dates running at [jasonhendriks.com](http://www.jasonhendriks.com/programmer/dynamic-dates/dynamic-dates-examples/)
