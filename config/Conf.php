<?php
class Conf {
	private static $databases = array(
		'hostname' => 'webinfo.iutmontp.univ-montp2.fr',
		'database' => 'vendranj',
		'login' => 'vendranj',
		'password' => '123456julien'
	);
	//Debug est un booléen
	static private $debug = True;

	static public function getLogin() {
		return self::$databases['login'];
	}

	static public function getHostname() {
		return self::$databases['hostname'];
	} 

	static public function getDatabase() {
		return self::$databases['database'];
	}

	static public function getPassword() {
		return self::$databases['password'];
	}

	static public function getDebug() {
		return self::$debug;
	} 
}
?>