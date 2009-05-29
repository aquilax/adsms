<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Base Site URL
|--------------------------------------------------------------------------
|
| URL to your CodeIgniter root. Typically this will be your base URL,
| WITH a trailing slash:
|
|	http://example.com/
|
*/

$config['base_url']	= "http://www.example.com/adsms";

/*
|--------------------------------------------------------------------------
| Default Language
|--------------------------------------------------------------------------
|
| This determines which set of language files should be used. Make sure
| there is an available translation if you intend to use something other
| than english.
|
*/

$config['language']	= "bulgarian";

/*
|--------------------------------------------------------------------------
| Encryption Key
|--------------------------------------------------------------------------
|
| If you use the Encryption class or the Sessions class with encryption
| enabled you MUST set an encryption key.  See the user guide for info.
|
*/

$config['encryption_key'] = "secret";

/*
|--------------------------------------------------------------------------
| SMS Payment Keys
|--------------------------------------------------------------------------
|
| This array contains the SMS paymnet service keys the formatted as:
| service_id => key
|
*/

$config['keys'] = array(
  'service_id' => 'key',
);


?>