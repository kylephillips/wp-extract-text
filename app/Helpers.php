<?php 
namespace ExtractText;

class Helpers 
{
	/**
	* Plugin Root Directory
	*/
	public static function plugin_url()
	{
		return plugins_url() . '/wp-extrat-text';
	}

	/**
	* Views
	*/
	public static function view($file)
	{
		return dirname(dirname(__FILE__)) . '/views/' . $file . '.php';
	}

	/**
	* Get the current URL
	*/
	public static function currentUrl()
	{
		global $wp;
		return home_url(add_query_arg(array(), $wp->request));
	}
}