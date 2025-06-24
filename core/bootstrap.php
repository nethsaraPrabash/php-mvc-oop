<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/repositories/UserRepository.php';
require_once __DIR__ . '/../app/services/UserService.php';
require_once __DIR__ . '/../app/controllers/UserController.php';
require_once __DIR__ . '/Database.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$database = new Database($_ENV['DB_DSN'], $_ENV['DB_USER'], $_ENV['DB_PASS']);
$userRepository = new UserRepository($database);
$userService = new UserService($userRepository);
$userController = new UserController($userService);

// Export dependencies as needed
return [
    'userController' => $userController,
];