=== Dynamic Dates ===
Contributors: jasonhendriks
Donate link: http://www.jasonhendriks.com/programmer/dynamic-dates/
Tags: dynamic, date, dates, time, times, calculator
Requires at least: 3.0
Tested up to: 3.1.2
Stable tag: 1.0.0

A WordPress plugin that calculates relative dates dynamically in your post or page.

== Description ==

A WordPress plugin that calculates relative dates and times dynamically. Custom dates can be inserted in your post or page with short-codes.

Requires WordPress 3.0 and PHP 5.3.

== Installation ==

1. Download Dynamic Dates
1. Unzip and upload the resulting folder to the '/wp-content/plugins/' directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Place a Dynamic Date shortcode in your posts and/or pages. A theme template function call is also available.

**Detailed examples for use can be found at the [Dynamic Dates homepage](http://www.jasonhendriks.com/programmer/dynamic-dates/)**

*Some quick examples:*

>`[yesterday]`

>`[next-month]`

>`[date format="F jS" time="this Sunday"]`

>`[date format="Y" time="2 years ago"]`

== Frequently Asked Questions ==

= How does it work? =

Dynamic Dates uses the built-in PHP functions date and strtotime to parse and display custom dates.

= How can I display a quick date? =

Use one of the built-in shortcodes:

> `[yesterday]`, `[today]`, `[tomorrow]`, `[last-month]`, `[this-month]`, `[next-month]`, `[last-year]`, `[this-year]`, `[next-year]`

Note: If you are *not* using WordPress 3 or later, you should substitute the hyphen in the shortcode with an underscore. Example: [this_year]

= How can I display a customized date? =

Use the [date] shortcode, providing *format*, *time* and *relative_to* options:

[date format="*[Format](http://php.net/manual/en/function.date.php)*" time="*[Date or Time](http://www.php.net/manual/en/datetime.formats.php)*" relative_to="*[Date or Time](http://www.php.net/manual/en/datetime.formats.php)*"]

Examples:

> Our church's next Sunday service is **May 8/11**

> `[date format="F j/Y" time="this Sunday"]`

> In **2009** I was two years younger

> `[date format="Y" time="2 years ago"]`

> Next year my birthday is on a **Sunday**!

> `[date format="l" time="march 4th +1 year"]`

> Canadian Thanksgiving is **October 10th** in 2011 and **October 8th** in 2012

> `[date format="l, F j, Y" time="second monday of october"]`

> `[date format="l, F j, Y" time="second monday of october" relative_to="next year"]`

= How can I contact the author? =

Send me a [question or comment](http://www.jasonhendriks.com/contact/ "Contact Jason Hendriks") at my webpage.

== Changelog ==

= 1.0.0 =
* Release date: 2011-05-03
* First release
* Tested with PHP v5.3.4

== Upgrade Notice ==

= 1.0.0 =
The first version. Yay!

== Screenshots ==

1. Dynamic Dates running at [jasonhendriks.com](http://www.jasonhendriks.com/programmer/dynamic-dates/dynamic-dates-examples/)
