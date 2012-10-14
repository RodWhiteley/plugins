<?php
/*
Plugin Name: IAPT Data
Description: Data module for IAPT KPIs
Author: Rod Whiteley
*/
require (WP_PLUGIN_DIR.'/iapt/common.php');
require (WP_PLUGIN_DIR.'/iapt/'.(defined('WP_ADMIN')? 'admin.php' : 'content.php'));
?>