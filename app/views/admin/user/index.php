<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>User Data</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>

<body class="bg-[#2D5DA1] overflow-hidden">

    <div class="flex h-screen">

        <?php require_once '../app/views/layouts/partials/sidebar.php'; ?>


        <div class="flex-1 bg-[#F3F1EC] rounded-l-[50px] px-[80px] py-[40px] overflow-y-auto">

            <!-- BACK -->

            <div class="flex items-center gap-5">

                <button
                    onclick="window.location.href='/home'"
                    class="bg-[#6489BF] text-white w-[40px] h-[40px] rounded">

                    <i class="fa-solid fa-chevron-left"></i>

                </button>

                <h1 class="text-[28px] font-bold">
                    Back
                </h1>

            </div>


            <h1 class="text-[35px] font-bold mt-[30px]">
                User Data
            </h1>



            <div class="flex justify-between mt-[30px] mb-[30px]">

                <div class="flex gap-5">

                    <button
                        class="bg-white w-[50px] h-[50px] rounded-full shadow">

                        <i class="fa fa-search text-[#2D5DA1] text-[18px]"></i>

                    </button>

                </div>

                <!-- SORT AND ADD BUTTONS -->
                <div class="flex gap-5">

                    <div class="relative">

                        <button
                            id="sortBtn"
                            class="bg-[#6489BF] text-white rounded w-2.50 h-10 flex items-center gap-2 px-[15px]">

                            Sort
                            <i class="fa-solid fa-arrow-up-wide-short"></i>

                        </button>

                        <!-- Dropdown -->
                        <div
                            id="sortMenu"
                            class="hidden absolute top-[60px] right-0 bg-[#6489BF] w-[180px] rounded-[10px] text-white p-[15px] shadow-lg z-50">

                            <?php
$currentSort = $_GET['sort'] ?? 'date';
$currentOrder = $_GET['order'] ?? 'DESC';
?>

    <ul class="space-y-[12px]">

        <li>
            <a
                href="?sort=name&order=<?= $currentOrder ?>"
                class="flex items-center gap-[8px] hover:text-gray-200">

                <span class="w-[10px]">
                    <?= $currentSort=='name' ? '•' : '' ?>
                </span>

                Name
            </a>
        </li>

        <li>
            <a
                href="?sort=date&order=<?= $currentOrder ?>"
                class="flex items-center gap-[8px] hover:text-gray-200">

                <span class="w-[10px]">
                    <?= $currentSort=='date' ? '•' : '' ?>
                </span>

                Date
            </a>
        </li>

        <hr>

        <li>
            <a
                href="?sort=<?= $currentSort ?>&order=ASC"
                class="flex items-center gap-[8px] hover:text-gray-200">

                <span class="w-[10px]">
                    <?= $currentOrder=='ASC' ? '•' : '' ?>
                </span>

                Ascending
            </a>
        </li>

        <li>
            <a
                href="?sort=<?= $currentSort ?>&order=DESC"
                class="flex items-center gap-[8px] hover:text-gray-200">

                <span class="w-[10px]">
                    <?= $currentOrder=='DESC' ? '•' : '' ?>
                </span>

                Descending
            </a>
        </li>

    </ul>


                        </div>

                    </div>

                    <button
                        class="bg-[#6489BF] text-white rounded w-2.50 h-10 flex items-center gap-2 px-[15px]" onclick="window.location.href='/admin/users/create'">

                        Add
                        <i class="fa fa-plus"></i>

                    </button>

                </div>

            </div>



            <table class="w-full">

                <thead>

                    <tr class="bg-[#2D5DA1] text-white h-[55px]">

                        <th>ID</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Created At</th>
                        <th>Action</th>

                    </tr>

                </thead>


                <tbody>

                    <?php foreach ($users as $user): ?>

                        <tr
                            class="bg-[#C9D0DA] h-[60px] text-center border-b">

                            <td>
                                <?= $user['id'] ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($user['name']) ?>
                            </td>

                            <td>
                                <?= ucfirst($user['role']) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($user['email']) ?>
                            </td>

                            <td>
                                ********
                            </td>

                            <td>

                                <?= date(
                                    'd/m/Y',
                                    strtotime($user['created_at'])
                                ) ?>

                            </td>

                            <td>

                                <div class="flex justify-center gap-5">

                                    <a
                                        href="/admin/users/edit/<?= $user['id'] ?>"
                                        class="text-green-600 font-bold">

                                        Edit
                                        <i class="fa fa-pen"></i>

                                    </a>

                                    <a
                                        onclick="openDeleteModal(<?= $user['id'] ?>)"
                                        class="text-red-500 font-bold">

                                        Delete
                                        <i class="fa fa-trash"></i>

                                    </a>

                                </div>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>
    </div>

    <!-- Delete Popup -->
    <div id="deleteModal"
        class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">

        <div class="bg-[#3A66A8] w-[500px] rounded-[20px] px-[35px] py-[25px] relative text-white">

            <!-- Close -->
            <button
                onclick="closeDeleteModal()"
                class="absolute top-[20px] right-[20px] text-[35px] leading-none">
                &times;
            </button>

            <!-- Title -->
            <div class="flex justify-center items-center gap-[10px]">

                <h2 class="text-[28px] font-bold">
                    Peringatan
                </h2>

                <i class="fa-solid fa-triangle-exclamation text-red-500 text-[30px]"></i>

            </div>

            <hr class="my-[15px] border-white">

            <!-- Text -->
            <div class="text-center">

                <h3 class="text-[18px] font-bold mb-[10px]">
                    Are you sure you want to delete this user?
                </h3>

                <p class="text-[14px] text-gray-200">
                    Just making sure—this can't be undone.
                </p>

            </div>

            <!-- Buttons -->
            <div class="flex justify-center gap-[20px] mt-[30px]">

                <a id="deleteLink"
                    href="#"
                    class="border-2 border-white px-[30px] py-[10px] rounded-[10px] text-[22px] font-semibold hover:bg-white hover:text-[#3A66A8] transition">

                    Continue

                </a>

                <button
                    onclick="closeDeleteModal()"
                    class="bg-[#6C8DC1] px-[30px] py-[10px] rounded-[10px] text-[22px] font-semibold hover:bg-[#86A1CC] transition">

                    Cancel

                </button>

            </div>

        </div>

    </div>
</body>
<script src="/js/admin/user/index.js"></script>

</html>