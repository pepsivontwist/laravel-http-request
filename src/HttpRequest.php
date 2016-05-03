<?php

namespace Overburn\HttpRequest;

use Illuminate\Support\Facades\Facade;

class HttpRequest extends Facade {
	$defaultOptions = [

	]

	public function get($url, $params) {
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$output = curl_exec($ch);

		curl_close($ch);

		return $output;
	}

	
}
