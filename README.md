# Prosperworks PHP SDK


A PHP client (fancy named SDK) to access Prosperworks API. 
Default HTTP library is CURL but it works with Guzzle too. 


## Installation

With [Composer](https://getcomposer.org/). Add the Prosperworks PHP SDK package to your `composer.json` file.

```json
{
    "require": {
        "prosperworks/php-sdk-v1": "~1.0"
    }
}
```


## Usage

> **Note:** PHP 5.4 or greater is required.

Using

```
$config = array(
    'access_token' => 'YOURACCESSTOKENHERE',
    'user_email' => 'youremail@domain.com'
    // 'client_http' => 'guzzle' // if you want to use guzzle 5.0    
);

$app = new Prosperworks($config);
$result = $app->post('companies/search');
print_r($result);
```


## Tests

1. [Composer](https://getcomposer.org/) is a prerequisite for running the tests. 
Install composer globally, then run `composer install` to install required files.
2. Get API credentials from Prosperworks and update the $config array.
3. The tests can be executed by running this command from the root directory:

```bash
$ ./vendor/bin/phpunit
```