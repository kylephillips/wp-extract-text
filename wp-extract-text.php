<?php
/*
Plugin Name: Extract Text for WordPress
Plugin URI: https://github.com/kylephillips/wp-extract-text
Description: Provides a simple interface for extracting plain text from WordPress content for use in AI engines
Version: 0.0.1
Author: Kyle Phillips
Author URI: https://github.com/kylephillips
License: GPL
*/
$loader = require_once 'vendor/autoload.php';
require_once('app/Bootstrap.php');
new ExtractText\Bootstrap;