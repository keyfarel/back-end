<?php 
//menginisialisasi database mulai dari host username password dan name agar tidak tertulis di connection

define('BASEURL', 'http://localhost/IsFor-website/php/public');
define('PHOTOPROFILE', 'http://localhost/IsFor-website/php/app/img/profile/');
define('ASSETS', 'http://localhost/IsFor-website/php/app/views/assets');
define('LETTER', 'http://localhost/IsFor-website/php/app/letters');

// define('DB_HOST', 'localhost');
// define('DB_USER', 'root');
// define('DB_PASS', '');
// define('DB_NAME', 'isfor_database');

define('DB_HOST', '192.168.66.208'); // Atau IP server SQL Server
define('DB_USER', 'sa');        // Username SQL Server
define('DB_PASS', 'MySecureDB#456'); // Password SQL Server
define('DB_NAME', 'isfor_database'); // Nama database
