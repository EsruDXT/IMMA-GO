<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// SUCCESS dari register
if (isset($_SESSION['success'])) {
    echo "<div class='bg-green-100 text-green-700 p-2 mb-3 rounded'>
            {$_SESSION['success']}
          </div>";
    unset($_SESSION['success']);
}

// ERROR login
if (isset($_SESSION['error'])) {
    echo "<div class='bg-red-100 text-red-700 p-2 mb-3 rounded'>
            {$_SESSION['error']}
          </div>";
    unset($_SESSION['error']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>IMMAGO - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#f5f5f5] font-[Arial]">

    <!-- NOTIF -->
    <?php if (isset($_SESSION['error'])): ?>
        <div class="bg-red-100 text-red-700 p-2 mb-3 text-center">
            <?= $_SESSION['error']; ?>
        </div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['success'])): ?>
        <div class="bg-green-100 text-green-700 p-2 mb-3 text-center">
            <?= $_SESSION['success']; ?>
        </div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <div class="flex h-screen">

        <!-- LEFT (LOGIN) -->
        <div class="flex-1 flex items-center justify-center px-[60px]">

            <div class="w-full max-w-[700px]">

                <!-- TITLE -->
                <h1 class="text-[28px] font-bold text-gray-800 leading-snug">
                    The stage is set. The competitions await.
                </h1>

                <p class="text-gray-500 mt-[8px] mb-[30px]">
                    Log in to join the action!
                </p>

                <!-- FORM -->
                <form class="space-y-[18px]" method="POST" action="/login">

                    <!-- EMAIL -->
                    <div>
                        <label class="text-[14px] text-gray-600">Email</label>
                        <input type="email" name="email" required
                            placeholder="Enter your email"
                            class="w-full mt-[6px] px-[12px] py-[10px] border rounded-[8px] outline-none focus:ring-2 focus:ring-blue-400">
                    </div>

                    <!-- PASSWORD -->
                    <div>
                        <label class="text-[14px] text-gray-600">Password</label>

                        <div class="relative mt-[6px]">

                            <input
                                type="password"
                                name="password"
                                id="password"
                                required
                                placeholder="Enter your password"
                                class="w-full px-[12px] py-[10px] pr-[42px] border rounded-[8px] outline-none focus:ring-2 focus:ring-blue-400">

                            <!-- ICON -->
                            <span onclick="togglePassword()" class="absolute right-[10px] top-1/2 -translate-y-1/2 text-gray-400 cursor-pointer transition duration-300 hover:text-gray-700 hover:scale-110"> <!-- Mata Buka --> <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg> 
                                <!-- Mata Tutup --> 
                                <svg id="eyeClose" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 hidden">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.477 10.482a3 3 0 004.243 4.243" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.88 5.09A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.542 7a9.97 9.97 0 01-1.563 3.029M6.228 6.228A9.965 9.965 0 002.458 12c1.274 4.057 5.064 7 9.542 7a9.95 9.95 0 003.366-.584" />
                                </svg> 
                            </span>

                        </div>
                    </div>

                    <!-- OPTIONS -->
                    <div class="flex items-center justify-between text-[14px]">
                        <label class="flex items-center gap-[6px] text-gray-600">
                            <input type="checkbox">
                            Keep me logged in
                        </label>

                        <a href="#" class="text-gray-500 hover:underline">
                            Forgot password?
                        </a>
                    </div>

                    <!-- BUTTON -->
                    <button class="w-full bg-[#5D7FAF] text-white py-[10px] rounded-[8px] font-semibold hover:bg-[#4c6d9b] transition">
                        Log in
                    </button>

                </form>

                <!-- DIVIDER -->
                <div class="flex items-center gap-[10px] my-[20px]">
                    <div class="flex-1 h-[1px] bg-gray-300"></div>
                    <span class="text-gray-400 text-[14px]">OR</span>
                    <div class="flex-1 h-[1px] bg-gray-300"></div>
                </div>

                <!-- REGISTER -->
                <p class="text-[14px] text-gray-600 text-center">
                    New here?
                    <a href="/register" class="font-semibold text-black hover:underline">
                        Create an account!
                    </a>
                </p>

                <?php require_once '../app/views/layouts/partials/footer.php'; ?>

            </div>
        </div>

        <!-- RIGHT -->
        <div class="flex-1 hidden md:flex items-center justify-center">
            <div class="w-[80%] h-[95%] bg-gray-300 rounded-[20px] relative overflow-hidden">
                <iframe
                    src="https://davvcdn.lon1.cdn.digitaloceanspaces.com/a2134daa08207457981fd9b3e4719b2e/c6df29e345bb51e37f28.html"
                    class="absolute inset-0 w-full h-full">
                </iframe>
            </div>
        </div>

    </div>

    <script src="../js/auth/login.js"></script>
</body>

</html>