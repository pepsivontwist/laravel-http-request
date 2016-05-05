# overburn/laravel-http-request

[![Build Status](https://travis-ci.org/overburn/laravel-http-request.svg?branch=master)](https://travis-ci.org/overburn/laravel-http-request)
[![Latest Stable Version](https://poser.pugx.org/overburn/http-request/v/stable)](https://packagist.org/packages/overburn/http-request)
[![Total Downloads](https://poser.pugx.org/overburn/http-request/downloads)](https://packagist.org/packages/overburn/http-request)
[![License](https://poser.pugx.org/overburn/http-request/license)](https://packagist.org/packages/overburn/http-request)
[![Bitdeli Badge](https://d2weczhvl823v0.cloudfront.net/overburn/laravel-http-request/trend.png)](https://bitdeli.com/free "Bitdeli Badge")

## Installation

Update your `composer.json` file to include this package as a dependency
```json
"overburn/http-request"
```

Register the HttpRequest service provider by adding it to the providers array in the `config/app.php` file.
```php
Overburn\HttpRequest\HttpRequestServiceProvider::class
```

Alias the HttpRequest facade by adding it to the aliases array in the `config/app.php` file.
```php
'aliases' => [
     'HttpRequest' => Overburn\HttpRequest\Facades\HttpRequest::class
]
```

## Usage 


### HttpRequest::request

Returns 

```php
[ 
	"response" => "response body given by the server",
	"info" => "the results of curl_getinfo() on the current request"
]
```

```php
HttpRequest::request($options);
```

The options is an array

```php
$options = [
	"method" => "get", //required - get, post, put, patch, delete
	"url" => "http://www.example.com", //required
	"params" => ["parameter"=>"value", "another" => "newvalue"], // url parameters for the request (optional)
	"data" => ["postdata[]"=>"avalue", "postdata[]"=>"anothervalue"], // data for post/put/patch/delete requests (optional, not available on "get")
	"files" => ["file" => "./example.pdf"], //an array of files (optional, not available on "get")
]
```