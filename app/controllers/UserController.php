<?php

require_once __DIR__ . '/../services/UserService.php';
require_once __DIR__ . '/../../core/View.php';

class UserController {
    private UserService $userService;

    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $success = $this->userService->registerUser($name, $email, $password);

            if ($success) {
                View::render('register', ['message' => 'Registration successful!']);
            } else {
                View::render('register', ['message' => 'Registration failed: Email already exists.']);
            }
        } else {
            View::render('register');
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $user = $this->userService->loginUser($email, $password);

            if ($user) {
                View::render('login', ['message' => 'Login successful!']);
            } else {
                View::render('login', ['message' => 'Login failed: Invalid credentials.']);
            }
        } else {
            View::render('login');
        }
    }
}

?>