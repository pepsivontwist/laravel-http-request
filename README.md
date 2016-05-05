# overburn/http-request

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

```php
HttpRequest::request($verb = "get", $url, $params = [], $data = [], $files = []);
```

### Example
```php
HttpRequest::request("get", "http://httpbin.org/get", ["acme" => "beep-beep"])
```

```php
HttpRequest::get($url, $params = []);
```

### Example
```php
HttpRequest::get("http://httpbin.org/get", ["acme" => "beep-beep"])
```

```php
HttpRequest::post($url, $params = [], $data = [], $files = []);
```

### Example
```php
HttpRequest::post("http://httpbin.org/post", ["acme" => "beep-beep"], 
		[
			"product[]" => "SPRING-POWERED SHOES",
			"product[]" => "ROCKET SKATES"
		],
		[
			"order" => "acme.png"
		])
```

```php
HttpRequest::put($url, $params = [], $data = [], $files = []);
```
### Example
```php
HttpRequest::put("http://httpbin.org/post", ["acme" => "beep-beep"], 
		[
			"product[]" => "SPRING-POWERED SHOES",
			"product[]" => "ROCKET SKATES"
		],
		[
			"order" => "acme.png"
		])
```

```php
HttpRequest::patch($url, $params = [], $data = [], $files = []);
```
### Example
```php
HttpRequest::patch("http://httpbin.org/post", ["acme" => "beep-beep"], 
		[
			"product[]" => "SPRING-POWERED SHOES",
			"product[]" => "ROCKET SKATES"
		],
		[
			"order" => "acme.png"
		])
```

```php
HttpRequest::delete($url, $params = [], $data = [], $files = []);
```

### Example
```php
HttpRequest::delete("http://httpbin.org/post", ["acme" => "beep-beep"], 
		[
			"product[]" => "SPRING-POWERED SHOES",
			"product[]" => "ROCKET SKATES"
		],
		[
			"order" => "acme.png"
		])
```