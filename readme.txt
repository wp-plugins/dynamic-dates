=== Dynamic Dates ===
Contributors: jasonhendriks
Tags: dynamic, date, dates, time, times, calculator, format, formatter, formatting
Requires at least: 2.7
Tested up to: 4.2
Stable tag: 2.0.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Calculate dates ('next Sunday') and relative dates ('December 25th two years from now') in your posts and pages.



== Description ==

Calculates dates and relative dates dynamically in your posts and pages. For example:

> Our church's next service is on **Mar 21/15**
>
> `[date format="M d/Y" time="this Sunday"]`

Add an always up-to-date copyright notice, or the date of your next monthly poker game.

See [examples on my website](http://programmer.jasonhendriks.com/dynamic-dates/dynamic-dates-examples/). See the FAQ for instructions on use.



###* What's New for v2 *
* Now supporting the local WordPress timezone, user-specified timezones, and user-specified languages!

= Requirements =
* PHP 5.2 for user-specified timezones or PHP 5.3 with the International extension for user-specified languages.



== Installation ==

1. Download Dynamic Dates
1. Unzip and upload the resulting folder to the '/wp-content/plugins/' directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Place a Dynamic Date shortcode in your posts and/or pages. A theme template function call is also available.



== Frequently Asked Questions ==

= How does it work? =

Dynamic Dates uses PHP's [strtotime()](http://php.net/manual/en/datetime.formats.relative.php) function to parse natural language into relative timestamps. For example, two years from now is "+2 year" and Canadian Thanksgiving is the "second monday of october" . Browse the full [strtotime()](http://php.net/manual/en/datetime.formats.relative.php) reference to find other possibilities.

= How can I display a simple date? =

Use one of the built-in shortcodes:

> `[now]`, `[yesterday]`, `[today]`, `[tomorrow]`, `[last-month]`, `[this-month]`, `[next-month]`, `[last-year]`, `[this-year]`, `[next-year]`

See [live examples](http://programmer.jasonhendriks.com/dynamic-dates/dynamic-dates-examples/) at my website.

= How can I display a customized date? =

This is a very powerful feature. Use any shortcode, or the generic `[date]` shortcode, and extend it with the following attributes, each of which is optional:

* format - a pattern to format the date or time. Browse the different formatting codes for [English mode](http://php.net/manual/en/function.date.php) and [International mode](http://userguide.icu-project.org/formatparse/datetime).
* time - the date or time [specified with natural language](http://php.net/manual/en/datetime.formats.relative.php)
* relative_to - a date or time that the first time is "relative to", also specified with natural language
* timezone - a [timezone](http://www.oracle.com/technetwork/java/javase/javase7locales-334809.html) to display (the default is set in the WordPress settings (requires PHP 5.2 or higher)
* language - a language to use (requires PHP 5.3 or higher)

'English Mode' advanced examples:

> It's **Sunday 15:58:47** in Paris, France
> 
>     [date format="l H:i:s" timezone="Europe/Paris"]
>
> Canadian Thanksgiving is **October 12th** this year and **October 10th** next year
> 
>     [date format="F jS" time="second monday of october"]
>     [date format="F jS" time="second monday of october" relative_to="next year"]

'International Mode' advanced examples:

> Voy a la fiesta **el viernes 22 de marzo**
> 
>     `[date format="d de MMMM" "time="friday" language="es_CL"]`

See [live examples](http://programmer.jasonhendriks.com/dynamic-dates/dynamic-dates-examples/) at my website.


== Changelog ==

= 2.0.4 - 2015-05-08 =
* [[Ticket](https://wordpress.org/support/topic/after-update-unknown-or-bad-timezone?replies=7)] Dates tags resulted in an error if the WordPress timezone was a GMT offset. Fixed.

= 2.0.3 - 2015-03-20 =
* Fixed: The method used to calculate the current timezone was faulty for some environments (produced '-4' for Toronto instead of '-5' during DST)
* Fixed: The method used to apply timezones was incorrectly applying it to calculated dates without times (eg. 'next sunday')
* Added an option to set the Log Level (defaulted to Error) instead of just blindly writing debug lines into debug.log/error.log
* Fixed: Systems with no ability to format international dates were incorrectly allowed to enable international formatting

= 2.0.2 - 2015-01-28 =
* Fixed: In some PHP environments, the WordPress timezone setting can not be interpreted - the error is DateTimeZone::__construct() [datetimezone.--construct]: Unknown or bad timezone

= 2.0.1 - 2015-01-27  =
* Gave the settings group name a more unique name to avoid collisions with other plugins

= 2.0 - 2015-01-25 =
* Added timezone support, the most requested feature. The default timezone is set in the WordPress configuration. Requires PHP 5.2. Use the timezone shortcode attribute.
* Added international language support, the second most requested feature. The default language is set in the WordPress configuration. Requires PHP 5.3 with the International extension. Use the language shortcode attribute.

= 1.0.1 - 2015-01-23  =
* A biennial update to re-list Dynamic Dates in the WordPress plugin directory

= 1.0.0 - 2011-05-03 =
* First release
* Tested with PHP v5.3.4

== Upgrade Notice ==

= 2.0.3 =
Stop clogging outfile with debug statements. Bug fixes.

= 2.0.2 =
Fixed the error that presents in some environment "Unknown or bad timezone"

= 2.0.1 =
Fix name collision issues with other plugins.

= 2.0 =
The first major update in nearly four years! Now with timezone and language support.

= 1.0.1 =
A superficial update to re-list Dynamic Dates in the WordPress plugin directory

= 1.0.0 =
The first version. Yay!

== Screenshots ==

1. Dynamic Dates running at [jasonhendriks.com](http://www.jasonhendriks.com/programmer/dynamic-dates/dynamic-dates-examples/)
