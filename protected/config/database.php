<?php

// This is the database connection configuration.
	// Local
	$host = 'localhost';
	$dbname = 'aircpit';
	$username = 'root';
	$password = '';

	// Server
	/*$host = 'aircpit.db.12043759.hostedresource.com';
	$dbname = 'aircpit';
	$username = 'aircpit';
	$password = 'Test#123';*/

return array(
	// 'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database

	'connectionString' => 'mysql:host='.$host.';dbname='.$dbname,
	'emulatePrepare' => true,
	'username' => $username,
	'password' => $password,
	'charset' => 'utf8',
);