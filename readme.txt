=== Dynamic Dates ===
Contributors: jasonhendriks
Donate link: http://www.jasonhendriks.com/programmer/dynamic-dates/
Tags: dynamic, date, dates, time, times, calculator
Requires at least: 2.7
Tested up to: 3.1.2
Stable tag: 1.0

A WordPress plugin that dynamically calculates dates in your post or page.

== Description ==

A WordPress plugin that dynamically calculates dates and times. Custom dates can be inserted in your post or page with short-codes.

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

Use the `[date]` shortcode, providing both a *format* and *time* option:

> [date format="*[PHP Date Format](http://php.net/manual/en/function.date.php)*" time="*[PHP Date or Time](http://www.php.net/manual/en/datetime.formats.php)*"]

Examples:

* Our church's next Sunday service is **May 8th**

> `[date format="F jS" time="this Sunday"]`

* Canadian Thanksgiving is **Monday, October 10, 2011**

> `[date format="l, F j, Y" time="second monday of october"]`

* In **2009** I was two years younger

> `[date format="Y" time="2 years ago"]`

* The day before my next birthday is **2012-03-03**

> `[date format="Y-m-d" time="march 4th -1 day +1 year"]`

= How can I contact the author? =

Send me a [question or comment](http://www.jasonhendriks.com/contact/ "Contact Jason Hendriks") at my webpage.

== Changelog ==

= 1.0 =
* Release date: 2011-05-03
* First release
* Tested with PHP v5.3.4

== Upgrade Notice ==

= 1.0 =
Having some issues with the WordPress versioning system.

== Screenshots ==

1. Dynamic Dates running at [jasonhendriks.com](http://www.jasonhendriks.com/programmer/dynamic-dates/dynamic-dates-examples/)
