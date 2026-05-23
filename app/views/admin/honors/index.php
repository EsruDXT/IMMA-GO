<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Honors</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="bg-[#2D5DA1] font-[Arial] overflow-hidden">

    <div class="flex h-screen w-full overflow-hidden">

        <!-- SIDEBAR -->
        <?php require_once '../app/views/layouts/partials/sidebar.php'; ?>

        <!-- RIGHT -->
        <div class="flex-1 rounded-tl-[50px] rounded-bl-[50px] bg-[#F3F1EC] overflow-y-auto">

            <div class="px-[60px] py-[45px]">

                <!-- TOP -->
                <div class="flex items-center justify-between mb-[50px]">

                    <h1 class="text-[56px] font-bold text-black">
                        Honors
                    </h1>

                    <?php if ($_SESSION['user']['role'] === 'admin'): ?>

                        <a href="/admin/honors/create"
                            class="bg-[#6489BF] hover:bg-[#4E73A5] transition text-white px-[35px] py-[14px] rounded-[10px] flex items-center gap-[15px] text-[20px] font-semibold">

                            Add

                            <i class="fa fa-plus"></i>
                        </a>

                    <?php endif; ?>

                </div>

                <!-- HONORS -->
                <div class="grid grid-cols-3 gap-x-[45px] gap-y-[55px]">

                    <?php foreach ($honors as $honor): ?>

                        <div class="group">

                            <!-- IMAGE -->
                            <div class="relative rounded-[8px] overflow-hidden">

                                <img src="/uploads/honors/<?= htmlspecialchars($honor['image']); ?>"
                                    class="w-full h-[245px] object-cover">

                                <!-- HOVER OVERLAY -->
                                <?php if ($_SESSION['user']['role'] === 'admin'): ?>

                                    <div
                                        class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center gap-[18px]">

                                        <!-- DELETE -->
                                        <a href="/admin/honors/delete/<?= $honor['id']; ?>"
                                            onclick="openDeleteModal(<?= $honor['id']; ?>); return false;"
                                            class="w-[55px] h-[55px] rounded-full bg-white text-[#2D5DA1] flex items-center justify-center text-[24px] hover:scale-110 transition">

                                            <i class="fa fa-trash"></i>
                                        </a>

                                        <!-- EDIT -->
                                        <a href="/admin/honors/edit/<?= $honor['id']; ?>"
                                            class="w-[55px] h-[55px] rounded-full bg-white text-[#2D5DA1] flex items-center justify-center text-[24px] hover:scale-110 transition">

                                            <i class="fa fa-pen"></i>
                                        </a>

                                    </div>

                                <?php endif; ?>

                            </div>

                            <!-- TITLE -->
                            <h2 class="mt-[18px] text-[20px] font-bold text-[#2D5DA1] leading-[1.3]">

                                <?= htmlspecialchars($honor['title']); ?>

                            </h2>

                            <!-- FOOTER -->
                            <div class="flex items-center justify-between mt-[18px] text-[#555]">

                                
<!-- LIKES -->
<form action="/honors/like/<?= $honor['id']; ?>"
    method="POST">

    <button type="submit"
        class="flex items-center gap-[8px] hover:scale-110 transition">

        <i class="fa fa-thumbs-up text-[#2D5DA1]"></i>

        <span class="text-[16px]">

            <?= $honor['likes']; ?>

        </span>

    </button>

</form>

                                <!-- DATE -->
                                <div class="flex items-center gap-[8px]">

                                    <i class="fa fa-calendar text-[#2D5DA1]"></i>

                                    <span class="text-[16px] font-semibold">

                                        <?= date('F j, Y', strtotime($honor['honor_date'])); ?>

                                    </span>
                                </div>
                            </div>

                        </div>

                    <?php endforeach; ?>

                </div>

                <!-- EMPTY -->
                <?php if (empty($honors)): ?>

                    <div class="flex flex-col items-center justify-center h-[500px]">

                        <i class="fa fa-trophy text-[90px] text-[#6489BF] mb-[25px]"></i>

                        <h2 class="text-[36px] font-bold mb-[10px]">
                            No Honors Yet
                        </h2>

                        <p class="text-gray-500 text-[20px]">
                            Add the first student achievement
                        </p>

                    </div>

                <?php endif; ?>

            </div>
        </div>
    </div>

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
                    Are you sure you want to delete this honor?
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

    <script>
        function openDeleteModal(id) {
            document
                .getElementById("deleteModal")
                .classList.remove("hidden");

            document
                .getElementById("deleteLink")
                .href = `/admin/honors/delete/${id}`;
        }

        function closeDeleteModal() {
            document
                .getElementById("deleteModal")
                .classList.add("hidden");
        }
    </script>
</body>

</html>