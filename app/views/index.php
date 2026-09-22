<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$isLoggedIn = !empty($_SESSION['user_id']);
$base = rtrim(dirname($_SERVER['SCRIPT_NAME'] ?? ''), '/\\');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management System - Limpapa NHS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    <!-- Header Navigation -->
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

            <div>
                <?php if ($isLoggedIn): ?>
                    <a href="<?= $base ?>/dashboard" class="bg-green-700 text-white text-sm px-4 py-2 rounded hover:bg-green-800 transition">
                        Dashboard
                    </a>
                <?php else: ?>
                    <a href="<?= $base ?>/login" class="bg-green-700 text-white text-sm px-4 py-2 rounded hover:bg-green-800 transition">
                        Login
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <!-- Main Hero Card -->
    <main class="flex-1 flex items-center justify-center px-4 py-10">
        <div class="bg-white p-8 sm:p-10 rounded-lg shadow-md max-w-xl w-full text-center">
            
            <img 
                src="<?= $base ?>/images/LNHS%20logo.jpg" 
                alt="LNHS Logo" 
                class="w-24 h-24 mx-auto mb-5 object-contain"
                onerror="this.src='images/LNHS%20logo.jpg'"
            >

            <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-2">
                Inventory Management System
            </h2>

            <p class="text-gray-600 mb-6 text-sm sm:text-base">
                A simple and centralized platform for Limpapa National High School to track school equipment, manage consumable supplies, and record borrowings.
            </p>

            <div class="mb-8">
                <?php if ($isLoggedIn): ?>
                    <a href="<?= $base ?>/dashboard" class="inline-block bg-green-700 text-white font-medium px-6 py-2.5 rounded hover:bg-green-800 transition">
                        Go to Dashboard
                    </a>
                <?php else: ?>
                    <a href="<?= $base ?>/login" class="inline-block bg-green-700 text-white font-medium px-6 py-2.5 rounded hover:bg-green-800 transition">
                        Login to Portal
                    </a>
                <?php endif; ?>
            </div>

            <!-- 3 Simple Feature Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 text-left border-t pt-6">
                <div class="p-3 bg-gray-50 rounded border">
                    <h3 class="font-semibold text-gray-800 text-xs mb-1">Asset Tracking</h3>
                    <p class="text-xs text-gray-500">Track projectors, laptops, and lab tools.</p>
                </div>
                <div class="p-3 bg-gray-50 rounded border">
                    <h3 class="font-semibold text-gray-800 text-sm mb-1">Consumables</h3>
                    <p class="text-xs text-gray-500">Monitor bond paper, inks, and supplies.</p>
                </div>
                <div class="p-3 bg-gray-50 rounded border">
                    <h3 class="font-semibold text-gray-800 text-sm mb-1">Borrower Logs</h3>
                    <p class="text-xs text-gray-500">Record teacher and staff requests.</p>
                </div>
            </div>

        </div>
    </main>

    <!-- Simple Footer -->
    <footer class="bg-white border-t py-4 text-center text-xs text-gray-500">
        &copy; <?= date('Y') ?> Limpapa National High School. All rights reserved.
    </footer>

</body>
</html>