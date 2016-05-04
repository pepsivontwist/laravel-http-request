<?php

namespace Overburn\HttpRequest;


class HttpRequest {

	public static function get($url, $params = []) {
		$ch = curl_init();

		if(count($params) > 0) {
			$url .= "?".http_build_query($params);
		}
		echo $url;

		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$output = curl_exec($ch);

		curl_close($ch);

		return $output;
	}

	
}
