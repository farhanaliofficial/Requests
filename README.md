# Farhan/Requests

Farhan/Requests is a simple PHP library that provides an easy-to-use wrapper for cURL functionality, allowing you to make HTTP requests and handle responses with ease.

## Installation

You can install the library via Composer:

```bash
composer require farhanaliofficial/requests
```

## Usage

Here's an example of how to use the Farhan/Requests library:

```php
<?php

require 'vendor/autoload.php';

use Farhan\Requests;

$url = "https://example.com";

// Make Object of Requests
$reqs = new Requests();

// Using default options
$r = $reqs->get($url);
echo "Response 1: " . $r->getBody() . "\n";

// Overriding options
$options = [
    'allow_redirects' => false,
    'ssl_verification' => false,
];

$r2 = $reqs->get($url, [], $options);
echo "Response 2: " . $r2->getBody() . "\n";
```

## Options

The `Requests` class provides the following options that you can pass while making requests:

- `allow_redirects`: Specify whether to follow redirects. Default is `true`.
- `ssl_verification`: Specify whether to verify SSL certificates. Default is `true`.

## Response Object

The `Response` object provides methods to access various aspects of the HTTP response:

- `getCode()`: Get the HTTP status code.
- `getHeaders()`: Get an array of response headers.
- `getBody()`: Get the response body content.

## License

Farhan/Requests is open-source software licensed under the [MIT License](LICENSE).