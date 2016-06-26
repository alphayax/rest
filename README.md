
# Rest

A simple project using curl in object oriented style

## Example

```php
$rest = new \alphayax\utils\Rest( 'https://api.github.com/users/alphayax/repos');
$rest->addHeader( 'User-Agent', 'alphayax-php_utils');
$rest->GET();

print_r( $rest->getCurlResponse());
```
