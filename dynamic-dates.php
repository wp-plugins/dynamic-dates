<?php
/*
 *
 * Plugin Name: Dynamic Dates
 * Plugin URI: http://www.jasonhendriks.com/programmer/dynamic-dates/
 * Description: A WordPress plugin that calculates relative dates dynamically in your post or page
 * Version: 2.0.3
 * Author: Jason Hendriks
 * Author URI: http://jasonhendriks.com/
 * License: GPL version 3 or any later version
 *
 * * Requires WordPress 2.7 **
 *
 * Copyright (C) 2011 Jason Hendriks
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 *
 */
require_once 'Core.php';
require_once 'ShortCodeController.php';
require_once 'AdminController.php';

// start the meat and potatoes
new DynamicDatesShortCodeController ();
new DynamicDatesAdminController ( plugin_basename ( __FILE__ ) );

?>
