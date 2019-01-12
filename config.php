<?php
/*
*
* Veritabanı bağlantısı için
* gerekli bağlantı bilgilerinin
* bulunduğu ayar dosyası.
*
*/
//session_start();

date_default_timezone_set('Europe/Istanbul');

define('MYSQL_HOST',	'localhost');
define('MYSQL_DB',		'motor');
define('MYSQL_USER',	'root');
define('MYSQL_PASS',	'');

include 'db.php';
