<?php 
namespace ExtractText;

/**
* Plugin Bootstrap class
* WordPress actions/filters are defined in namespaced classes
*/
class Bootstrap 
{
	function __construct()
	{
		define('EXTRACT_TEXT_VERSION', '0.0.1');
		
		$plugin_directory = plugins_url() . '/' . basename(dirname(dirname(__FILE__)));
		define('EXTRACT_TEXT_DIRECTORY', $plugin_directory);

		add_action('init', [$this, 'wordpressInit']);
		$this->pluginInit();
	}

	/**
	* Initialize the Plugin
	*/
	public function wordpressInit()
	{
		new API\Endpoints;
	}

	/**
	* General Theme Functions
	*/
	public function pluginInit()
	{
		new Activation\Dependencies;
		new Settings\Settings;
		new Filters\WPApi;
		new Events\RegisterAdminEvents;
	}
}