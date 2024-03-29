<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');



//status http code
define("STATUS_CODE_OK",                            200);
define("STATUS_CODE_BAD_REQUEST",                   400);



//Status
define("STATUS_SUCCESS",                            "SUCCESS");
define("STATUS_FAILED",                             "FAILED");

//curl error code
define("CURL_COULDNT_CONNECT",                      "COULDNT_CONNECT");
define("CURL_TIMEOUT",                              "CURL_TIMEOUT");
define("CURL_GENERAL_ERROR",                        "CURL_GENERAL_ERROR");


//message response
define('DESC_INVALID_REQUEST',                      "Invalid request");







//api area
define('BASE_URL',                                  "https://places.api.here.com");
define("API_VERSION",                               "1");




define("API_DISCOVER_PLACES",                       "/places/v1/discover/explore");
//end api area

define("IMAGE_URL_500",                                 "https://image.tmdb.org/t/p/w500");
define("IMAGE_URL_ORIGINAL",                            "https://image.tmdb.org/t/p/original");