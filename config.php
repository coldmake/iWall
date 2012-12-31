<?php

# read the credentials file
$string = false;

if (isset($_ENV['CRED_FILE'])) {
$string = file_get_contents($_ENV['CRED_FILE'], false);}

if ($string == false) {
   //die('FATAL: Could not read credentials file');
    define('DB_TYPE', 'mysql');
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'iwall');
    define('DB_USER', 'root');
    define('DB_PASS', '');
} else {

# the file contains a JSON string, decode it and return an associative array
$creds = json_decode($string, true);

# now use the $creds array to configure your app e.g.:
define('DB_TYPE', 'mysql');
define('DB_HOST', $creds['MYSQLS']['MYSQLS_HOSTNAME']);
define('DB_NAME', $creds['MYSQLS']['MYSQLS_DATABASE']);
define('DB_USER', $creds['MYSQLS']['MYSQLS_USERNAME']);
define('DB_PASS', $creds['MYSQLS']['MYSQLS_PASSWORD']);
}

define('ERROR_LOGIN','The email or the password is not correct @_@');
define('ERROR_SIGNUP','The email has already been registered >_<');
?>
