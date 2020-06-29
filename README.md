# AuthnetXML

A PHP class that abstracts the Authorize.Net XML API

This class is deprecated. It is recommended that you use the 
[AuthnetJson PHP package](https://github.com/stymiee/authnetjson) instead.

## Requirements:
- PHP 5.2+
- cURL PHP Extension
- simplexml
- An Authorize.Net Merchant Account or Test Account. You can get a free test account at 
  https://developer.authorize.net/testaccount/.
  
## Installation

Include the 'AuthnetXML.class.php' and 'config.inc.php' files in your application.  

## Usage Examples:
 
See the individual examples in each of the APIs' directory

## Test Credit Card Numbers:

Set the expiration date to anytime in the future.
- American Express Test Card -> 370000000000002
- Discover Test Card         -> 6011000000000012
- Visa Test Card             -> 4007000000027
- Second Visa Test Card      -> 4012888818888
- JCB                        -> 3088000000000017
- Diners Club/ Carte Blanche -> 38000000000006

## Authorize.Net API Reference

https://developer.authorize.net/api/reference/index.html
