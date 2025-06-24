<?php

$controllers = require __DIR__ . '/../core/bootstrap.php';
require_once __DIR__ . '/../core/Route.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

Route::handle($uri, $controllers);