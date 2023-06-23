<?php
namespace ExtractText\Settings;

/**
* Plugin Settings
*/
class Settings
{

	public function __construct()
	{
		add_action( 'admin_menu', [$this, 'registerSettingsPage']);
	}

	/**
	* Register the settings page
	*/
	public function registerSettingsPage()
	{
		add_menu_page( 
			'Extract Text',
			'Extract Text',
			'manage_options',
			'extract-text', 
			[$this, 'settingsPage'],
			'dashicons-editor-paste-text'
		);
	}

	/**
	* Display the Settings Page
	* Callback for registerSettingsPage method
	*/
	public function settingsPage()
	{
		$tab = ( isset($_GET['tab']) ) ? sanitize_text_field($_GET['tab']) : 'general';
		include( \ExtractText\Helpers::view('settings/settings') );
	}
}