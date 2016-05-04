# overburn/http-request

## [Work In Progress]

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
HttpRequest::get($url, $params = [])
```

```php
HttpRequest::post($url, $params = [], $files = [])
```
