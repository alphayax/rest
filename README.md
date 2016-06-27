
# Rest

[![Latest Stable Version](https://poser.pugx.org/alphayax/rest/v/stable)](https://packagist.org/packages/alphayax/rest)
[![Latest Unstable Version](https://poser.pugx.org/alphayax/rest/v/unstable)](https://packagist.org/packages/alphayax/rest)
[![pakagist](https://img.shields.io/packagist/v/alphayax/rest.svg)](https://packagist.org/packages/alphayax/rest)

[![Code Coverage](https://api.codacy.com/project/badge/Coverage/d47a11a9043947e8a91aa30e60cab8fb)](https://www.codacy.com/app/alphayax/rest?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=alphayax/rest&amp;utm_campaign=Badge_Coverage)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/d47a11a9043947e8a91aa30e60cab8fb)](https://www.codacy.com/app/alphayax/rest?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=alphayax/rest&amp;utm_campaign=Badge_Grade)

[![License](https://poser.pugx.org/alphayax/rest/license)](https://packagist.org/packages/alphayax/rest)
[![Total Downloads](https://poser.pugx.org/alphayax/rest/downloads)](https://packagist.org/packages/alphayax/rest)

A simple project using curl in object oriented style

## Example

```php
$rest = new \alphayax\rest\Rest( 'https://api.github.com/users/alphayax/repos');
$rest->addHeader( 'User-Agent', 'alphayax-rest');
$rest->GET();

print_r( $rest->getCurlResponse());
```
