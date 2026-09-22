<?php

require_once __DIR__ . '/../models/User.php';

class AuthController
{
    public function showLogin(): void
    {
        require __DIR__ . '/../views/auth/login.php';
    }

    public function showCreateAccount(): void
    {
        require __DIR__ . '/../views/auth/createAccount.php';
    }

    public function showForgotPassword(): void
    {
        require __DIR__ . '/../views/auth/forgotPassword.php';
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

            $base = rtrim(dirname($_SERVER['SCRIPT_NAME'] ?? ''), '/\\');
            header('Location: ' . ($base ?: '') . '/dashboard');
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

        $base = rtrim(dirname($_SERVER['SCRIPT_NAME'] ?? ''), '/\\');
        header('Location: ' . ($base ?: '') . '/login');
        exit;
    }
}