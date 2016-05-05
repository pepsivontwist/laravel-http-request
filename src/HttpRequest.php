<?php

namespace Overburn\HttpRequest;


class HttpRequest {

	$options = [
		"method" => "get",
		"url" => "",
		"params" => [],
		"data" => [],
		"files" => []
	]

	public static function request( $options )
	{
		$ch = curl_init();

		if(!isset($options['method'])) return ["error" => "'method' is required"];
		$method = $options['method'];

		if(!isset($options['url'])) return ["error" => "'url' is required"];
		$url = $options['url'];

		if(isset($options['params']) && count($options['params']) > 0) {			
			$url .= "?".http_build_query($options['params']);
		}

		$files = [];

		if(isset($options['files']) && count($options['files']) > 0) {
			$files = $options['files'];

			foreach($files as $k=>$file) {
				$files[$k] = new \CURLFile($file);
			}
		}

		$data = [];

		if(isset($options['data']) && count($options['data']) > 0) {
			$data = $options['data'];
		}
	
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SAFE_UPLOAD, true);

		$body = array_merge($data, $files);		

		switch($method) {
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

		return ["response" => $output, "info" => $info];
	}	
}
