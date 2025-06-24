<?php
require_once __DIR__ . '/../../core/Database.php';
require_once __DIR__ . '/../models/User.php';

class UserRepository {
    private Database $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function register(User $user): bool {
        $stmt = $this->db->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $user->getName(), $user->getEmail(), $user->getPassword());
        return $stmt->execute();
    }

    public function findByEmail(string $email): ?User {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            return null;
        }

        $data = $result->fetch_assoc();
        return User::fromArray($data);
    }

    public function login(string $email, string $password): ?User {
        $user = $this->findByEmail($email);
        if ($user && $user->verifyPassword($password)) {
            return $user;
        }
        return null;
    }

    public function findUserById(int $id): ?User {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            return null;
        }

        $data = $result->fetch_assoc();
        return User::fromArray($data);
    }


}


?>