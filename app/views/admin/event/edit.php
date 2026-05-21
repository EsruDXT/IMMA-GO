<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="bg-[#2D5DA1] font-[Arial] overflow-hidden">

    <div class="flex h-screen">

        <!-- SIDEBAR -->
        <?php require_once '../app/views/layouts/partials/sidebar.php'; ?>

        <!-- MAIN -->
        <div class="flex-1 bg-[#F3F1EC] rounded-l-[50px] px-[50px] py-[35px] overflow-y-auto">

            <!-- BACK -->
            <div class="flex items-center gap-[20px] mb-[40px]">

                <button onclick="history.back()"
                    class="w-[45px] h-[45px] rounded-[10px] bg-[#6489BF] text-white text-[20px] hover:bg-[#4E73A5]">

                    <i class="fa fa-chevron-left"></i>

                </button>

                <h1 class="text-[32px] font-bold">
                    Edit Event
                </h1>

            </div>

            <form action="/admin/events/update"
                method="POST"
                enctype="multipart/form-data">

                <!-- ID EVENT -->
                <input
                    type="hidden"
                    name="id"
                    value="<?= $event['id'] ?>">

                <div class="flex gap-[40px]">

                    <!-- simpan gambar lama -->
                    <input
                        type="hidden"
                        name="old_image"
                        value="<?= $event['image'] ?>">

                    <!-- LEFT -->
                    <div class="w-[42%]">

                        <h2 class="text-[28px] font-bold text-center mb-[20px]">
                            Thumbnail Photo
                        </h2>

                        <div class="relative bg-[#E5E5E5] rounded-[25px] h-[500px] overflow-hidden shadow-md flex items-center justify-center">

                            <img
                                id="previewImage"
                                src="/uploads/<?= htmlspecialchars($event['image'] ?? 'default.jpg') ?>"
                                class="w-full h-full object-cover">

                            <label
                                class="absolute bottom-[40px] bg-[#6489BF] hover:bg-[#4E73A5] text-white px-[30px] py-[14px] rounded-[15px] cursor-pointer flex items-center gap-[15px] text-[20px] font-semibold">

                                Upload Photo
                                <i class="fa fa-camera"></i>

                                <input
                                    type="file"
                                    name="image"
                                    class="hidden"
                                    accept="image/*"
                                    onchange="previewFile(event)">

                            </label>

                        </div>

                    </div>

                    <!-- RIGHT -->
                    <div class="flex-1">

                        <!-- TITLE -->
                        <div class="mb-[25px]">

                            <label class="block text-[20px] font-bold mb-[10px]">
                                Title
                            </label>

                            <input
                                type="text"
                                name="title"
                                value="<?= htmlspecialchars($event['title']) ?>"
                                required
                                class="w-full border border-black rounded-[12px] px-[20px] py-[16px] bg-transparent">

                        </div>

                        <!-- DESCRIPTION -->
                        <div class="mb-[25px]">

                            <label class="block text-[20px] font-bold mb-[10px]">
                                Description
                            </label>

                            <textarea
                                name="description"
                                required
                                class="w-full h-[140px] border border-black rounded-[12px] px-[20px] py-[14px] bg-transparent resize-none"><?= htmlspecialchars($event['description']) ?></textarea>

                        </div>

                        <div class="flex gap-[30px]">

                            <!-- CALENDAR -->
                            <div class="w-[320px]">

                                <label class="block text-[20px] font-bold mb-[15px]">
                                    Date
                                </label>

                                <input
                                    type="hidden"
                                    id="selectedDate"
                                    name="event_date"
                                    value="<?= $event['event_date'] ?>">

                                <div class="bg-[#DCDDE4] rounded-[20px] overflow-hidden">

                                    <div class="bg-[#3A6CB5] px-[20px] py-[18px] flex justify-between text-white">

                                        <div class="flex items-center gap-[12px]">

                                            <i class="fa fa-calendar"></i>

                                            <h2 id="monthYear"></h2>

                                        </div>

                                        <div class="flex gap-[15px]">

                                            <button type="button" id="prev">
                                                <i class="fa fa-chevron-left"></i>
                                            </button>

                                            <button type="button" id="next">
                                                <i class="fa fa-chevron-right"></i>
                                            </button>

                                        </div>

                                    </div>

                                    <div class="p-[18px] bg-white">

                                        <div class="grid grid-cols-7 text-center mb-[15px]">
                                            <span>Sun</span>
                                            <span>Mon</span>
                                            <span>Tue</span>
                                            <span>Wed</span>
                                            <span>Thu</span>
                                            <span>Fri</span>
                                            <span>Sat</span>
                                        </div>

                                        <div
                                            id="calendar"
                                            class="grid grid-cols-7 gap-y-[10px] text-center">
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <!-- RIGHT SIDE -->
                            <div class="flex-1">

                                <!-- ORGANIZER -->
                                <div class="mb-[18px]">

                                    <label class="block text-[20px] font-bold mb-[10px]">
                                        Organizer
                                    </label>

                                    <input
                                        type="text"
                                        name="organizer"
                                        value="<?= htmlspecialchars($event['organizer']) ?>"
                                        required
                                        class="w-full border border-black rounded-[12px] px-[18px] py-[12px] bg-transparent">

                                </div>

                                <!-- LOCATION -->
                                <div class="mb-[18px]">

                                    <label class="block text-[20px] font-bold mb-[10px]">
                                        Location
                                    </label>

                                    <input
                                        type="text"
                                        name="location"
                                        value="<?= htmlspecialchars($event['location']) ?>"
                                        required
                                        class="w-full border border-black rounded-[12px] px-[18px] py-[12px] bg-transparent">

                                </div>

                                <!-- CATEGORY -->
                                <div class="mb-[18px]">

                                    <label class="block text-[20px] font-bold mb-[10px]">
                                        Category
                                    </label>

                                    <select
                                        name="category"
                                        class="w-full border border-black rounded-[12px] px-[18px] py-[12px]">

                                        <option value="event" <?= $event['category'] == 'event' ? 'selected' : '' ?>>Event</option>

                                        <option value="competition" <?= $event['category'] == 'competition' ? 'selected' : '' ?>>Competition</option>

                                        <option value="workshop" <?= $event['category'] == 'workshop' ? 'selected' : '' ?>>Workshop</option>

                                    </select>

                                </div>

                                <!-- CLASS -->
                                <div class="mb-[18px]">

                                    <label class="block text-[20px] font-bold mb-[10px]">
                                        Class Target
                                    </label>

                                    <select
                                        name="class_target"
                                        class="w-full border border-black rounded-[12px] px-[18px] py-[12px]">

                                        <option value="all" <?= $event['class_target'] == 'all' ? 'selected' : '' ?>>All</option>

                                        <option value="10" <?= $event['class_target'] == '10' ? 'selected' : '' ?>>Class 10</option>

                                        <option value="11" <?= $event['class_target'] == '11' ? 'selected' : '' ?>>Class 11</option>

                                        <option value="12" <?= $event['class_target'] == '12' ? 'selected' : '' ?>>Class 12</option>

                                    </select>

                                </div>

                                <!-- REQUIREMENT -->
                                <div class="mb-[18px]">

                                    <label class="block text-[20px] font-bold mb-[10px]">
                                        Requirement
                                    </label>

                                    <select
                                        name="requirement"
                                        class="w-full border border-black rounded-[12px] px-[18px] py-[12px]">

                                        <option value="free" <?= $event['requirement'] == 'free' ? 'selected' : '' ?>>Free</option>

                                        <option value="paid" <?= $event['requirement'] == 'paid' ? 'selected' : '' ?>>Paid</option>

                                    </select>

                                </div>

                            </div>

                        </div>

                        <!-- BUTTON -->
                        <div class="flex justify-end mt-[40px]">

                            <button
                                type="submit"
                                class="bg-[#6489BF] hover:bg-[#4E73A5] text-white font-bold text-[22px] px-[60px] py-[16px] rounded-[14px]">

                                Update

                            </button>

                        </div>

                    </div>

                </div>

            </form>

        </div>

    </div>

    <script src="/js/admin/event/create.js"></script>

</body>

</html>