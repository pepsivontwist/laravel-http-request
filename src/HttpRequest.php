<?php

namespace Overburn\HttpRequest;


class HttpRequest {

	public function __construct() {
		
	}

	public function get($url, $params) {
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$output = curl_exec($ch);

		curl_close($ch);

		return $output;
	}

	
}
