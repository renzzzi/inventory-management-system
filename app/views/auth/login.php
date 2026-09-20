<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">

        <h1 class="text-2xl font-bold mb-6">
            Inventory Management System
        </h1>

        <?php if (!empty($error)): ?>
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="/login/submit">

            <div class="mb-4">
                <label class="block mb-1">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    required
                    class="w-full border rounded px-3 py-2"
                >
            </div>

            <div class="mb-6">
                <label class="block mb-1">
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    required
                    class="w-full border rounded px-3 py-2"
                >
            </div>

            <button
                type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700"
            >
                Login
            </button>

        </form>

    </div>

</body>
</html>