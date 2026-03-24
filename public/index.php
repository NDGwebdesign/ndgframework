<?php

require __DIR__.'/../core/Autoloader.php';
require __DIR__.'/../core/helpers.php';
require __DIR__.'/../core/Env.php';
Env::load(__DIR__.'/../.env');

$isHttps = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off');

if (session_status() === PHP_SESSION_NONE) {
	session_set_cookie_params([
		'lifetime' => 0,
		'path' => '/',
		'domain' => '',
		'secure' => $isHttps,
		'httponly' => true,
		'samesite' => 'Lax',
	]);

	session_start();
}

Autoloader::register();

$router = new Router();

require __DIR__.'/../routes/web.php';

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_SERVER['REQUEST_METHOD'];

$router->dispatch($uri, $method);