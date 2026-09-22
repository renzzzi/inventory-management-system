<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$base = rtrim(dirname($_SERVER['SCRIPT_NAME'] ?? ''), '/\\');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account - Inventory Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    <!-- Header Navigation (Same as index.php) -->
    <nav class="bg-white shadow-sm border-b sticky top-0 z-50">
        <div class="max-w-5xl mx-auto px-4 py-3 flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <img 
                    src="<?= $base ?>/images/LNHS%20logo.jpg" 
                    alt="LNHS Logo" 
                    class="w-10 h-10 object-contain rounded-full border"
                    onerror="this.src='images/LNHS%20logo.jpg'"
                >
                <div>
                    <h1 class="font-bold text-gray-800 text-sm sm:text-base leading-tight">
                        Limpapa National High School
                    </h1>
                    <p class="text-xs text-gray-500">
                        Inventory Management System
                    </p>
                </div>
            </div>

            <div class="flex items-center space-x-2">
                <a href="<?= $base ?>/" class="text-gray-600 hover:text-gray-800 text-sm px-3 py-2 rounded transition">
                    Home
                </a>
                <a href="<?= $base ?>/login" class="bg-green-700 text-white text-sm px-4 py-2 rounded hover:bg-green-800 transition">
                    Login
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content Area -->
    <main class="flex-1 flex items-center justify-center px-4 py-10">
        <div class="bg-white p-8 sm:p-10 rounded-lg shadow-md max-w-md w-full">
            
            <img 
                src="<?= $base ?>/images/LNHS%20logo.jpg" 
                alt="LNHS Logo" 
                class="w-20 h-20 mx-auto mb-4 object-contain rounded-full border"
                onerror="this.src='images/LNHS%20logo.jpg'"
            >

            <h2 class="text-2xl font-bold text-gray-800 text-center mb-1">
                Create Account
            </h2>
            <p class="text-gray-500 text-xs sm:text-sm text-center mb-6">
                Register for staff and custodian inventory access
            </p>

            <?php if (!empty($error)): ?>
                <div class="bg-red-100 border border-red-200 text-red-700 px-4 py-3 rounded mb-4 text-sm">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($success)): ?>
                <div class="bg-green-100 border border-green-200 text-green-700 px-4 py-3 rounded mb-4 text-sm">
                    <?= htmlspecialchars($success) ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="<?= $base ?>/create-account/submit">
                
                <!-- Full Name -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-medium mb-1" for="name">
                        Full Name
                    </label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        required
                        autocomplete="name"
                        value="<?= htmlspecialchars($_POST['name'] ?? '') ?>"
                        placeholder="e.g. Maria Santos"
                        class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-green-600"
                    >
                </div>

                <!-- Email Address -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-medium mb-1" for="email">
                        Email Address
                    </label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        required
                        autocomplete="email"
                        value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                        placeholder="e.g. maria.santos@deped.gov.ph"
                        class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-green-600"
                    >
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-medium mb-1" for="password">
                        Password
                    </label>
                    <div class="relative">
                        <input
                            type="password"
                            id="password"
                            name="password"
                            required
                            autocomplete="new-password"
                            placeholder="••••••••"
                            class="w-full border border-gray-300 rounded px-3 py-2 pr-10 text-sm focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-green-600"
                        >
                        <button 
                            type="button" 
                            id="togglePasswordBtn"
                            aria-label="Toggle password visibility"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 focus:outline-none cursor-pointer"
                        >
                            <svg id="eyeIcon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            <svg id="eyeSlashIcon" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Confirm Password -->
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-medium mb-1" for="confirm_password">
                        Confirm Password
                    </label>
                    <input
                        type="password"
                        id="confirm_password"
                        name="confirm_password"
                        required
                        autocomplete="new-password"
                        placeholder="••••••••"
                        class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-green-600"
                    >
                </div>

                <!-- Submit Button (Solid Green, No Gradient) -->
                <button
                    type="submit"
                    class="w-full bg-green-700 text-white font-medium py-2.5 px-4 rounded hover:bg-green-800 transition cursor-pointer"
                >
                    Create Account
                </button>
            </form>

            <!-- Back to Login Link -->
            <div class="mt-6 pt-5 border-t border-gray-100 text-center">
                <p class="text-xs text-gray-600">
                    Already have an account? 
                    <a href="<?= $base ?>/login" class="text-green-700 hover:text-green-800 font-semibold hover:underline">
                        Sign In
                    </a>
                </p>
            </div>

        </div>
    </main>

    <!-- Simple Footer (Same as index.php) -->
    <footer class="bg-white border-t py-4 text-center text-xs text-gray-500">
        &copy; <?= date('Y') ?> Limpapa National High School. All rights reserved.
    </footer>

    <!-- Interactive Script for Toggle Password -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toggleBtn = document.getElementById('togglePasswordBtn');
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            const eyeSlashIcon = document.getElementById('eyeSlashIcon');

            if (toggleBtn && passwordInput) {
                toggleBtn.addEventListener('click', () => {
                    const isPassword = passwordInput.getAttribute('type') === 'password';
                    passwordInput.setAttribute('type', isPassword ? 'text' : 'password');
                    
                    if (isPassword) {
                        eyeIcon.classList.add('hidden');
                        eyeSlashIcon.classList.remove('hidden');
                    } else {
                        eyeIcon.classList.remove('hidden');
                        eyeSlashIcon.classList.add('hidden');
                    }
                    passwordInput.focus();
                });
            }
        });
    </script>

</body>
</html>
