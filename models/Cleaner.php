<?php
class Cleaner {
	public function __construct() {
	}

	static function cleanInput($input) {
		$output  =addslashes(trim($input));
	  	$search =array(
		    '@<script [^>]*?>.*?@si',            // Strip out javascript
		    '@< [/!]*?[^<>]*?>@si',            // Strip out HTML tags
		    '@<style [^>]*?>.*?</style>@siU',    // Strip style tags properly
		    '@< ![sS]*?--[ tnr]*>@'         // Strip multi-line comments
	  	);
		$output = htmlspecialchars($output, ENT_QUOTES);
		$output =preg_replace($search, '', $output);
		$output =addslashes(trim($output));
	  return $output;
	}
}
