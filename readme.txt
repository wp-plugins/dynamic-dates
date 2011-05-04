=== Dynamic Dates ===
Contributors: jasonhendriks
Donate link: http://www.jasonhendriks.com/programmer/dynamic-dates/
Tags: dynamic, date, dates, time, times, calculator
Requires at least: 3.0
Tested up to: 3.1.2
Stable tag: trunk

A WordPress plugin that dynamically calculates relative dates in your post or page.

== Description ==

A WordPress plugin that dynamically calculates relative dates and times. Custom dates can be inserted in your post or page with short-codes.

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

= How can I display a customized date? =

Use the `[date]` shortcode, providing *format*, *time* and *relative_to* options:

> [date format="*[PHP Date Format](http://php.net/manual/en/function.date.php)*" time="*[PHP Date or Time](http://www.php.net/manual/en/datetime.formats.php)*" relative_to="*[PHP Date or Time](http://www.php.net/manual/en/datetime.formats.php)*"]

Examples:

> Our church's next Sunday service is **May 8/11**

> `[date format="F j/Y" time="this Sunday"]`

> In **2009** I was two years younger

> `[date format="Y" time="2 years ago"]`

> Next year my birthday is on a **Sunday**!

> `[date format="l" time="march 4th +1 year"]`

> Next year, Canadian Thanksgiving is **October 10th** in 2011 and **October 8th** in 2012

> `[date format="l, F j, Y" time="second monday of october"]`

> `[date format="l, F j, Y" time="second monday of october" relative_to="next year"]`

= How can I contact the author? =

Send me a [question or comment](http://www.jasonhendriks.com/contact/ "Contact Jason Hendriks") at my webpage.

== Changelog ==

= trunk =
* Release date: 2011-05-03
* First release
* Tested with PHP v5.3.4

== Upgrade Notice ==

= trunk =
Having some issues with the WordPress versioning system.

== Screenshots ==

1. Dynamic Dates running at [jasonhendriks.com](http://www.jasonhendriks.com/programmer/dynamic-dates/dynamic-dates-examples/)
