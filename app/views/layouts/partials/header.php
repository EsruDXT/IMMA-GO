<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$user = $_SESSION['user'] ?? null;
?>

<div class="flex-1 bg-[#F7F4ED] rounded-tl-[50px] flex flex-col overflow-hidden">
    <div class="flex items-center p-[30px] flex-shrink-0">
        <div class="bg-[#6489BF] w-[50px] h-[50px] flex items-center justify-center rounded-[10px] cursor-pointer hover:bg-[#4E73A5] transition">
            <i class="fa fa-bell text-white text-[22px]"></i>
        </div>

        <div class="bg-[#6489BF] px-[15px] py-[10px] rounded-[10px] w-[550px] h-[50px] flex items-center mx-[30px]">
            <i class="fa fa-search text-white text-[22px]"></i>
            <input class="ml-[10px] bg-transparent outline-none border-none placeholder-white text-white w-full" placeholder="Search...">
        </div>
        <!-- Profile -->
        <?php if (isset($_SESSION['user'])): ?>
            <div class="flex items-center gap-[10px] ml-auto">

                <div class="relative ml-auto">

                    <!-- Profile -->
                    <div onclick="window.location.href='/profile'" class="cursor-pointer flex items-center gap-[10px]">

                        <div class="mr-[10px] text-right">
                            <b class="text-[20px] text-gray-800">
                                <?= htmlspecialchars($_SESSION['user']['name']); ?>
                            </b><br>
                            <span class="text-[#2D5DA1] font-bold"><?= strtoupper(htmlspecialchars($_SESSION['user']['role'])); ?></span>
                        </div>

                        <img src="/assets/images/profile.png"
                            class="w-[75px] h-[75px] rounded-full bg-gray-300 object-cover">

                    </div>


                </div>

            </div>
    </div>
<?php else: ?>
    <div class="ml-auto">
        <a href="/login" class="text-[#2D5DA1] font-bold hover:underline">
            Log in
        </a>
    </div>
<?php endif; ?>