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
    <title>Forgot Password - Inventory Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    <!-- Header Navigation (Same as index.php) -->
    <nav class="bg-white shadow-sm border-b">
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
                Reset Password
            </h2>
            <p class="text-gray-500 text-xs sm:text-sm text-center mb-6">
                Enter your registered email to receive password reset instructions
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

            <form method="POST" action="<?= $base ?>/forgot-password/submit">
                
                <!-- Email Address -->
                <div class="mb-5">
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
                        placeholder="e.g. custodian@deped.gov.ph"
                        class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-green-600"
                    >
                </div>

                <!-- Info Box -->
                <div class="mb-6 p-3 bg-gray-50 rounded border border-gray-200 text-xs text-gray-600">
                    <p class="font-medium text-gray-700 mb-0.5">Need immediate assistance?</p>
                    <p>You can also contact the School Property Custodian or ICT Coordinator directly to reset your account password.</p>
                </div>

                <!-- Submit Button (Solid Green, No Gradient) -->
                <button
                    type="submit"
                    class="w-full bg-green-700 text-white font-medium py-2.5 px-4 rounded hover:bg-green-800 transition cursor-pointer"
                >
                    Send Reset Link
                </button>
            </form>

            <!-- Back to Login Link -->
            <div class="mt-6 pt-5 border-t border-gray-100 text-center">
                <p class="text-xs text-gray-600">
                    Remember your password? 
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

</body>
</html>
