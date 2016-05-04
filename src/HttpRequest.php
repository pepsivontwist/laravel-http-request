<?php

namespace Overburn\HttpRequest;


class HttpRequest {

	public static function get($url, $params = []) {
		$ch = curl_init();

		if(count($params) > 0) {
			$url .= "?".http_build_query($params);
		}

		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$output = curl_exec($ch);

		curl_close($ch);

		return $output;
	}

	public static function post($url, $params = []) {
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_POST, 1);

		if(count($params) > 0) {			
			curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
		}

		curl_setopt($ch, CURLOPT_URL, $url);

		$output = curl_exec($ch);

		curl_close($ch);

		return $output;
	}

	
}
