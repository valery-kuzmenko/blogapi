<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Debug\Debug;

// If you don't want to setup permissions the proper way, just uncomment the following PHP line
// read http://symfony.com/doc/current/book/installation.html#configuration-and-setup for more information
//umask(0000);

// This check prevents access to debug front controllers that are deployed by accident to production servers.
// Feel free to remove this, extend it, or make something more sophisticated.
function myDump($p, $type = false, $add_write = false){
	if ($type != false) {
		$path = $_SERVER['DOCUMENT_ROOT'] . '/errors';
		if (!file_exists($path))
			mkdir($path, 0777);
		@chmod($path, 0777);
                $type = 'w';
                if($add_write)
                    $type = 'a';
                
		$fp = fopen($path . '/error.txt', $type);
		fwrite($fp, print_r($p, true));
		fclose($fp);
		@chmod($path . '/error.txt', 0777);
	} else {
		echo '<pre>';
		print_r($p);
		echo '</pre>';
	}
	return false;
}


$loader = require_once __DIR__.'/../app/autoload.php';
Debug::enable();

require_once __DIR__.'/../app/AppKernel.php';

$kernel = new AppKernel('dev', true);
//$kernel->loadClassCache();
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
