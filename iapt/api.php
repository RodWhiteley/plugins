<?php
$q = array();
parse_str($_SERVER['QUERY_STRING'], $q);

define('WP_USE_THEMES', false);
if (file_exists('wp-blog-header.php')) require_once('wp-blog-header.php');
else require_once('../../../wp-blog-header.php');

$result = array('version' => '0.1');

switch ($q['q']) {
	case 'version':
		break;
	case 'test':
		define('IAPT_API', true);
		$q['action'] = 'test';
		$result['greeting'] = include(WP_PLUGIN_DIR.'/iapt/xmlrpc.php');
		break;
	default:
		die();
	}

header('HTTP/1.1 200 OK');
header('Content-Type: application/json; charset=utf-8');
header('Connection: close');
echo json_encode($result);
?>