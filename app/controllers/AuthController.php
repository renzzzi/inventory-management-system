<?php

require_once __DIR__ . '/../models/User.php';

class AuthController
{
    public function showLogin(): void
    {
        require __DIR__ . '/../views/auth/login.php';
    }

    public function login(): void
    {
        session_start();

        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        $userModel = new User();

        $user = $userModel->findByEmail($email);

        if ($user && password_verify($password, $user['password'])) {

            session_regenerate_id(true);

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];

            header('Location: /dashboard');
            exit;
        }

        $error = 'Invalid email or password.';

        require __DIR__ . '/../views/auth/login.php';
    }

    public function logout(): void
    {
        session_start();

        $_SESSION = [];

        session_destroy();

        header('Location: /login');
        exit;
    }
}