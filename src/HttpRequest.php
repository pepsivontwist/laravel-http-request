<?php

namespace Overburn\HttpRequest;


class HttpRequest {

	public static function request($verb = "get", $url, $params = [], $data = [], $files = []) {
		$ch = curl_init();

		if(count($params) > 0) {
			$url .= "?".http_build_query($params);
		}

	
		if(count($files) > 0) {
			foreach($files as $k=>$file) {
				$files[$k] = new \CURLFile($file);
			}
		}




		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SAFE_UPLOAD, true);


		$body = array_merge($data, $files);

		switch($verb) {
			case "get":
				//Roll with it
				break;
			case "post":				
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
				break;
			case "put":
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
				curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
				break;
			case "patch": 
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
				curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
				break;
			case "delete":
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
				curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
				break;
		}

		$output = curl_exec($ch);
		$info = curl_getinfo($ch);


		curl_close($ch);

		return $output;
	}

	public static function get($url, $params = []) {
		return self::request("get", $url, $params);
	}

	public static function post($url, $params = [], $data = [], $files = []) {
	
		return self::request("post", $url, $params, $data, $files);
	}

	public static function put($url, $params = [], $data = [], $files = []) {
		return self::request("put", $url, $params, $data, $files);
	}

	public static function patch($url, $params = [], $data = [], $files = []) {
		return self::request("patch", $url, $params, $data, $files);
	}

	public static function delete($url, $params = [], $data = [], $files = []) {
		return self::request("delete", $url, $params, $data, $files);
	}


	
}
