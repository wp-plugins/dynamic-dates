<?php
if (! class_exists ( "DynamicDatesAdminController" )) {
	
	/**
	 * Dynamic_Dates.
	 */
	class DynamicDatesAdminController {
		private $options;
		
		// The key to save data under in the database
		const OPTION_NAME = 'dynamic_dates_options';
		
		// The Postman Group is used for saving data, make sure it is globally unique
		const SETTINGS_GROUP_NAME = 'dynamic_dates_group';
		
		// page titles
		const PAGE_TITLE = 'Dynamic Dates Settings';
		const MENU_TITLE = 'Dynamic Dates';
		
		// slugs
		const SLUG = 'dynamic-dates';

		/**
		 * 
		 * @param unknown $basename
		 */
		function __construct($basename) {
			$this->options = get_option ( DynamicDatesAdminController::OPTION_NAME );
			// Adds "Settings" link to the plugin action page
			add_filter ( 'plugin_action_links_' . $basename, array (
					$this,
					'add_action_links' 
			) );
			
			add_action ( 'admin_menu', array (
					$this,
					'add_plugin_page' 
			) );
			add_action ( 'admin_init', array (
					$this,
					'page_init' 
			) );
			if (! class_exists ( 'DateTime' )) {
				add_action ( 'admin_notices', Array (
						$this,
						'noDateTimeWarning' 
				) );
			}
		}
		public function noDateTimeWarning() {
			$this->displayWarningMessage ( "Your PHP is too old to support Dynamic Dates with timezones. All timezones will be UTC." );
		}
		public function displayMessage($message, $class) {
			echo '<div class="' . $class . '"><p>' . $message . '</p></div>';
		}
		private function displaySuccessMessage($message) {
			$this->displayMessage ( $message, 'updated' );
		}
		private function displayErrorMessage($message) {
			$this->displayMessage ( $message, 'error' );
		}
		private function displayWarningMessage($message) {
			$this->displayMessage ( $message, 'update-nag' );
		}
		/**
		 * Add Settings link to entry on Plugins page.
		 *
		 * @param unknown $links        	
		 */
		public function add_action_links($links) {
			$mylinks = array (
					'<a href="' . admin_url ( 'options-general.php?page=dynamic-dates' ) . '">Settings</a>' 
			);
			return array_merge ( $links, $mylinks );
		}
		/**
		 * Add options page
		 */
		public function add_plugin_page() {
			// This page will be under "Settings"
			add_options_page ( DynamicDatesAdminController::PAGE_TITLE, DynamicDatesAdminController::MENU_TITLE, 'manage_options', DynamicDatesAdminController::SLUG, array (
					$this,
					'create_admin_page' 
			) );
		}
		/**
		 * Print the Section text
		 */
		public function printMainSectionInfo() {
			if (class_exists ( 'IntlDateFormatter' )) {
				print 'Enabling multiple language support will <b>change the formatting codes</b> that Dynamic Dates uses.';
			} else {
				if (PHP_VERSION_ID >= 50300) {
					print 'To enable multiple language support, you must enable the <a href="http://pecl.php.net/package/intl">PHP International extension</a> setting in <b>php.ini</b>. See <a href="http://php.net/manual/en/intl.installation.php">additional instructions</a>.';
				} else {
					print 'To enable multiple language support, you must upgrade to PHP 5.3 and enable the <a href="http://pecl.php.net/package/intl">PHP International extension</a>.';
				}
			}
		}
		/**
		 * Register and add settings
		 */
		public function page_init() {
			if (! isset ( $this->options ['mode'] )) {
				$this->options ['mode'] = 'english';
			}
			debugDD ( 'mode: ' . $this->options ['mode'] );
			register_setting ( DynamicDatesAdminController::SETTINGS_GROUP_NAME, DynamicDatesAdminController::OPTION_NAME, array (
					$this,
					'sanitize' 
			) );
			
			// Sanitize
			add_settings_section ( 'main', 'International Mode', array (
					$this,
					'printMainSectionInfo' 
			), DynamicDatesAdminController::SLUG );
			
			add_settings_field ( 'international', 'Mode', array (
					$this,
					'international_callback' 
			), DynamicDatesAdminController::SLUG, 'main' );
		}
		/**
		 * Get the settings option array and print one of its values
		 */
		public function international_callback() {
			$disabled = '';
			if (! class_exists ( 'IntlDateFormatter' ) && false) {
				$disabled = 'disabled="disabled"';
			}
			printf ( '<input %s type="radio" id="mode" name="dynamic_dates_options[mode]" value="english" %s>English</input> ', $disabled, $this->options ['mode'] == 'english' ? 'checked="checked"' : '' );
			printf ( '<input %s type="radio" id="mode" name="dynamic_dates_options[mode]" value="international" %s>International</input>', $disabled, $this->options ['mode'] == 'international' ? 'checked="checked"' : '' );
		}
		
		/**
		 * Sanitize each setting field as needed
		 *
		 * @param array $input
		 *        	Contains all settings fields as array keys
		 */
		public function sanitize($input) {
			$new_input = array ();
			
			if (isset ( $input ['mode'] )) {
				debugDD ( 'mode sanitize ' . $input ['mode'] );
				$new_input ['mode'] = sanitize_text_field ( $input ['mode'] );
			}
			return $new_input;
		}
		/**
		 * Options page callback
		 */
		public function create_admin_page() {
			?>
<div class="wrap">
            <?php screen_icon(); ?>
            <h2><?php echo DynamicDatesAdminController::PAGE_TITLE ?></h2>
	<form method="post" action="options.php">
	<?php
			// This prints out all hidden setting fields
			settings_fields ( DynamicDatesAdminController::SETTINGS_GROUP_NAME );
			do_settings_sections ( DynamicDatesAdminController::SLUG );
			$disabled = '';
			if (! class_exists ( 'IntlDateFormatter' ) && false) {
				$disabled = 'disabled="disabled"';
			}
			submit_button ( 'Save Changes', 'primary', 'submit', true, $disabled );
			?>
			</form>
	<h4>Relative Dates and Times</h4>
	<p>
		Dynamic Dates uses PHP's strtotime() function to parse natural
		language into relative timestamps. For example, two years from now is
		<code>"+2 year"</code>
		and Canadian Thanksgiving is the
		<code>"second monday of october"</code>
		. Browse the <a
			href="http://php.net/manual/en/datetime.formats.relative.php">full
			strtotime() reference</a> to find other possibilities.
	</p>
<?php
			if ($this->options ['mode'] == 'english') {
				?>
	<h4>Formatting options in English mode</h4>
	<p>
		In English mode, Dynamic Dates uses PHP's date() function and DateTime
		class to format dates. <b><em>Please note, the formatting symbols used
				are different than International mode</em></b>. For example,
		<code>F</code>
		is used for the name of the month and
		<code>Y</code>
		is the four-digit year. Browse the <a
			href="http://php.net/manual/en/function.date.php">full date()
			reference</a> to find other possibilities.
	</p>
			<?php  } else { ?>
	<h4>Formatting options in International mode</h4>
	<p>
		In International mode, Dynamic Dates uses PHP's IntlDateFormatter
		class to format dates. <b><em>Please note, the ICU formatting symbols
				used are different than English mode </em></b>. For example,
		<code>MMMM</code>
		is used for the name of the month and
		<code>yyyy</code>
		is the four-digit year. Browse the <a
			href="http://userguide.icu-project.org/formatparse/datetime">ICU
			Date/Time Format Syntax</a> to find other possibilities.
	</p>
	<?php  } ?> 
	<h4>Built-in Shortcodes</h4>
	<p>Shortcodes ready for you to use in posts and pages include:</p>
	<ol>
		<li>[now] and [date]</li>
		<li>[yesterday], [today] and [tomorrow]</li>
		<li>[last-month], [this-month] and [next-month]</li>
		<li>[last-year], [this-year] and [next-year]</li>
	</ol>

	<h4>Customizing Shortcodes</h4>
	<p>All shortcodes can be modified with the following options:</p>
	<ol>
		<li>format - a pattern to format the date or time</li>
		<li>time - the date or time to format</li>
		<li>relative_to - a date or time that the first time is "relative to"</li>
		<li>timezone - a timezone to display (the default is set in the
			WordPress settings (requires PHP 5.2 or higher)</li>
		<li>language - a language to use (requires PHP 5.3 or higher)</li>
	</ol>

	<p>
		For more information and lots of examples, please visit the <a
			href="https://wordpress.org/plugins/dynamic-dates/faq/">Dynamic
			Dates</ a> homepage. 

</div>
<?php
		}
	}
}
?>