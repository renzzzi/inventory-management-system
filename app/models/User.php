<?php

require_once __DIR__ . '/../../config/database.php';

class User
{
    public function findByEmail(string $email): ?array
    {
        global $pdo;

        $statement = $pdo->prepare(
            'SELECT * FROM users WHERE email = :email LIMIT 1'
        );

        $statement->execute([
            'email' => $email
        ]);

        $user = $statement->fetch();

        return $user ?: null;
    }
}