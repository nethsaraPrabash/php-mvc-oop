<?php

require_once __DIR__ . '/../repositories/UserRepository.php';

class UserService {
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function registerUser(string $name, string $email, string $password): bool {
        if ($this->userRepository->findByEmail($email)) {
            return false;
        }

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $user = new User(0, $name, $email, $hashedPassword);
        return $this->userRepository->register($user);
    }

    public function loginUser(string $email, string $password): ?User {
        $user = $this->userRepository->findByEmail($email);
        if ($user && password_verify($password, $user->getPassword())) {
            return $user;
        }
        return null;
    }

}

?>