<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="bg-[#2D5DA1] font-[Arial] overflow-hidden">

<div class="flex h-screen">

    <!-- SIDEBAR -->
    <?php require_once '../app/views/layouts/partials/sidebar.php'; ?>

    <!-- MAIN -->
    <div class="flex-1 bg-[#F3F1EC] rounded-l-[50px] px-[80px] py-[40px] overflow-y-auto relative">

        <!-- BACK -->
        <div class="flex items-center gap-5 mb-[30px]">

            <button
                onclick="history.back()"
                class="w-[45px] h-[45px] bg-[#6489BF] rounded-[10px]
                text-white text-[22px]
                hover:bg-[#5377AC]
                transition">

                <i class="fa-solid fa-chevron-left"></i>

            </button>

            <h1 class="text-[28px] font-medium">
                Back
            </h1>

        </div>

        <!-- TITLE -->
        <h1 class="text-[56px] font-bold mb-[30px]">
            Add User
        </h1>

        <!-- FORM -->
        <form
            action="/admin/users/store"
            method="POST">

            <!-- NAME -->
            <div class="mb-[30px]">

                <label
                    class="block text-[18px] font-bold mb-[10px]">

                    Name

                </label>

                <input
                    type="text"
                    name="name"
                    placeholder="Nama Lengkap"
                    required
                    class="w-[460px]
                    h-[52px]
                    px-[20px]
                    rounded-[10px]
                    border border-black
                    bg-transparent
                    outline-none">

            </div>


            <!-- ROLE -->
            <div class="mb-[30px]">

                <label
                    class="block text-[18px] font-bold mb-[10px]">

                    Role

                </label>

                <div class="relative w-[200px]">

                    <select
                        name="role"
                        class="w-full
                        h-[50px]
                        px-[20px]
                        rounded-[10px]
                        bg-[#6489BF]
                        text-white
                        appearance-none
                        outline-none">

                        <option value="student">
                            Student
                        </option>

                        <option value="teacher">
                            Teacher
                        </option>

                        <option value="admin">
                            Admin
                        </option>



                    </select>

                    <i class="fa-solid fa-chevron-down
                    absolute
                    right-[20px]
                    top-1/2
                    -translate-y-1/2
                    text-white"></i>

                </div>

            </div>


            <!-- EMAIL -->
            <div class="mb-[30px]">

                <label
                    class="block text-[18px] font-bold mb-[10px]">

                    Email

                </label>

                <input
                    type="email"
                    name="email"
                    placeholder="nama.xxx@ski.sch.id"
                    required
                    class="w-[460px]
                    h-[52px]
                    px-[20px]
                    rounded-[10px]
                    border border-black
                    bg-transparent
                    outline-none">

            </div>


            <!-- PASSWORD -->
            <div>

                <label
                    class="block text-[18px] font-bold mb-[10px]">

                    Password

                </label>

                <input
                    type="password"
                    name="password"
                    placeholder="********"
                    required
                    class="w-[460px]
                    h-[52px]
                    px-[20px]
                    rounded-[10px]
                    border border-black
                    bg-transparent
                    outline-none">

            </div>


            <!-- BUTTON -->
            <div class="absolute bottom-[35px] right-[60px]">

                <button
                    type="submit"
                    class="bg-[#6489BF]
                    hover:bg-[#5377AC]
                    text-white
                    text-[18px]
                    font-bold
                    px-[70px]
                    py-[14px]
                    rounded-[12px]
                    transition">

                    Create

                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>