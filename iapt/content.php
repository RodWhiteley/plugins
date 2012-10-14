<?php
// add my stylesheet...
function iapt_css () {
	wp_register_style('iapt', plugins_url('css/content.css', __FILE__));
	wp_enqueue_style('iapt');
	
	wp_enqueue_script('jquery');
	}
add_action('wp_enqueue_scripts', 'iapt_css');

// AJAX test...
function ajax_test () {
	return '<div id="ajax-test" class="loading">&nbsp;</div>'
		.'<script>
jQuery(document).ready(function ($) {
	$("#ajax-test").load(
		"'.WP_PLUGIN_URL.'/iapt/xmlrpc.php?action=test&nonce='.wp_create_nonce('iapt-ajax-test').'",
		function () {$("#ajax-test").removeClass("loading")});
	})
</script>'."\n";
	}
add_shortcode('ajax-test', 'ajax_test');

// catalogue IAPT CSV files...
function iapt_csv_list () {
	$url = WP_PLUGIN_URL.'/iapt/kpi.dat';
	$data = json_decode(file_get_contents($url));
	$rr = $data->resources;
	$txt = '';
	foreach ($rr as $r) {
		if ($r->format == 'CSV') $txt .= $r->url.'<br/>';
		}
	return $txt.'<pre>'.print_r($data->resources, true).'</pre><br/><br/>';
	}
add_shortcode('iapt-csv-list', 'iapt_csv_list');
?>