<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

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
    <title>IMMAGO - Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#f5f5f5] font-[Arial]">

<div class="flex min-h-screen">
        <!-- LEFT -->
    <div class="flex-1 hidden md:flex items-center justify-center">
        <div class="w-[80%] h-[95%] bg-gray-300 rounded-[20px] relative overflow-hidden">

            <iframe 
                src="https://davvcdn.lon1.cdn.digitaloceanspaces.com/a2134daa08207457981fd9b3e4719b2e/cbd24b0be5ca5af5563e.html"
                class="absolute inset-0 w-full h-full"
            ></iframe>

        </div>
    </div>

    <!-- RIGHT -->
    <div class="flex-1 flex items-center justify-center px-[60px]">

        <div class="w-full max-w-[700px]">

            <h1 class="text-[28px] font-bold text-gray-800">
                Ready to compete and stand out?
            </h1>

            <p class="text-gray-500 mt-[8px] mb-[30px]">
                Sign up and be part of them!
            </p>

            <!-- FORM -->
            <form method="POST" action="/register" class="space-y-[18px]">

                <!-- NAME -->
                <div>
                    <label class="text-[14px] text-gray-600">Name</label>
                    <input type="text" name="name" placeholder="Enter your name"
                        class="w-full mt-[6px] px-[12px] py-[10px] border rounded-[8px] focus:ring-2 focus:ring-blue-400" required>
                </div>

                <!-- EMAIL -->
                <div>
                    <label class="text-[14px] text-gray-600">Email</label>
                    <input type="email" name="email" placeholder="Enter your email"
                        class="w-full mt-[6px] px-[12px] py-[10px] border rounded-[8px] focus:ring-2 focus:ring-blue-400" required>
                </div>

                <!-- PASSWORD -->
                <div>
                    <label class="text-[14px] text-gray-600">Password</label>
                    <input type="password" name="password" placeholder="Enter your password"
                        class="w-full mt-[6px] px-[12px] py-[10px] border rounded-[8px] focus:ring-2 focus:ring-blue-400" required>
                </div>

                <!-- CONFIRM PASSWORD -->
                <div>
                    <label class="text-[14px] text-gray-600">Password Confirmation</label>
                    <input type="password" name="confirm_password" placeholder="Confirm your password"
                        class="w-full mt-[6px] px-[12px] py-[10px] border rounded-[8px] focus:ring-2 focus:ring-blue-400" required>
                </div>

            <!-- DIVIDER -->
            <div class="flex items-center gap-[10px] my-[20px]">
                <div class="flex-1 h-[1px] bg-gray-300"></div>
                <span class="text-gray-400 text-[14px]">OR</span>
                <div class="flex-1 h-[1px] bg-gray-300"></div>
            </div>

            <!-- LOGIN -->
            <p class="text-[14px] text-gray-600 text-center">
                Already have an account?
                <a href="/login" class="font-semibold text-black hover:underline">
                    Log in now
                </a>
            </p>
                            <!-- BUTTON -->
                <button class="w-full bg-[#5D7FAF] text-white py-[10px] rounded-[8px] font-semibold hover:bg-[#4c6d9b] mt-[20px] transition-colors duration-300" type="submit">
                    Register
                </button>
            </form>

        <?php require_once '../app/views/layouts/partials/footer.php'; ?>
        </div>
        
    </div>
     
</div>

</body>
</html>