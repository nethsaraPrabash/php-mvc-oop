<?php

class User {
    private int $id;
    private string $name;
    private string $email;
    private string $password;

    public function __construct(int $id, string $name, string $email, string $hashedPassword) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $hashedPassword;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function setPassword(string $password): void {
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }

    public function verifyPassword(string $password): bool {
        return password_verify($password, $this->password);
    }

    public function toArray(): array {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,

        ];
    }

    public static function fromArray(array $data): self {
        return new self(
            $data['id'],
            $data['name'],
            $data['email'],
            $data['password']
        );
    }

    public function __toString(): string {
        return "User [Name: {$this->name}, Email: {$this->email}]";
    }
}

?>