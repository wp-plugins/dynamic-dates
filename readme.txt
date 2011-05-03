=== Dynamic Dates ===
Contributors: jasonhendriks
Donate link: http://www.jasonhendriks.com/programmer/dynamic-dates/
Tags: dynamic, date, dates, calculator
Requires at least: 2.7
Tested up to: 3.1.2
Stable tag: 0.1

A WordPress plugin that dynamically calculates dates in your post or page.

== Description ==

A WordPress plugin that dynamically calculates dates and times. Custom dates can be inserted in your post or page with short-codes.

== Installation ==

1. Download Dynamic Dates
1. Unzip and upload the resulting folder to the '/wp-content/plugins/' directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Place the shortcode in your posts and/or pages. A theme template function call is also available.

**Detailed examples for use can be found at the [Dynamic Dates homepage](http://www.jasonhendriks.com/programmer/dynamic-dates/)**

*Some simple examples:*

>[yesterday]

>[this-month]

>[next-year]

>[date output="F jS" time="this Sunday"]

>[date output="Y" time="2 years ago"]

>[date output="Y-m-d" time="march 4th -1 day +1 year"]

== Frequently Asked Questions ==

= How does it work? =

Dynamic Dates uses the built-in PHP functions [date] and [strtotime] to parse and display custom dates.

= What are the built-in shortcodes? =

* [yesterday], [today], [tomorrow], [last-month], [this-month], [next-month], [last-year], [this-year], [next-year]

= How can I create a customized date? =

* Use the [date] shortcode. It accepts an output format option (see the PHP [Date Format Options](http://php.net/manual/en/function.date.php) page) and a time option which is a date/time string (see the PHP [Date and Time Format](http://www.php.net/manual/en/datetime.formats.php) page).

= How can I contact the author? =

Send me a [question or comment](http://www.jasonhendriks.com/contact/ "Contact Jason Hendriks") at my webpage.

== Changelog ==

= 0.1 =
* Release date: 2011-05-03
* First release

== Upgrade Notice ==

