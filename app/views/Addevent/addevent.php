<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Event - SMK Kristen Immanuel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="flex min-h-screen bg-[#315E9E]">

    <!-- SIDEBAR -->
    <?php require_once '../app/views/layouts/partials/sidebar.php'; ?>

    <div class="flex-1 rounded-l-[40px] bg-[#F8F4E9] ml-0 p-10 shadow-2xl relative ml-[10px]">

        <div class="flex items-center space-x-4 mb-8">
            <button class="bg-[#7495C6] text-white p-2 rounded-lg w-10 h-10 flex items-center justify-center">
                <i class="fa-solid fa-chevron-left"></i>
            </button>
            <span class="text-2xl font-semibold text-gray-800">Back</span>
        </div>

        <form action="#" method="POST" enctype="multipart/form-data">
            <div class="grid grid-cols-12 gap-10">

                <div class="col-span-5 flex flex-col items-center">
                    <h2 class="text-2xl font-bold mb-0 text-gray-800 uppercase tracking-wide">Thumbnail Photo</h2>
                    <div
                        class="w-[70%] aspect-square bg-white border-2 border-dashed border-gray-300 rounded-3xl flex flex-col items-center justify-center relative overflow-hidden shadow-sm">
                        <div class="absolute inset-0 opacity-10"
                            style="background-image: radial-gradient(#000 1px, transparent 1px); background-size: 20px 20px;">
                        </div>

                        <label
                            class="cursor-pointer bg-[#7495C6] text-white px-6 py-2 rounded-xl flex items-center space-x-2 z-10 hover:bg-blue-600 transition">
                            <span>Upload Photo</span>
                            <i class="fa-solid fa-camera"></i>
                            <input type="file" name="thumbnail" class="hidden">
                        </label>
                    </div>
                </div>

                <div class="col-span-7 space-y-4">
                    <div>
                        <label class="block text-lg font-bold text-gray-800 mb-1">Title</label>
                        <input type="text" name="title" placeholder="Title..."
                            class="bg-[#F3F1EB] border border-[#A1A1A1] rounded-lg p-[10px] w-full">
                    </div>

                    <div>
                        <label class="block text-lg font-bold text-gray-800 mb-1">Description</label>
                        <textarea name="description" rows="4" placeholder="Description..."
                            class="bg-[#F3F1EB] border border-[#A1A1A1] rounded-lg p-[10px] w-full resize-none"></textarea>
                    </div>

                    <div class="col-span-7 space-y-4">
                        <div>
                            <label class="block text-lg font-bold text-gray-800 mb-1">Organizer</label>
                            <input type="text" name="organizer" placeholder="Name..."
                                class="bg-[#F3F1EB] border border-[#A1A1A1] rounded-lg p-[10px] w-full">
                        </div>
                        <div>
                            <label class="block text-lg font-bold text-gray-800 mb-1">Location</label>
                            <input type="text" name="location" placeholder="Location..."
                                class="bg-[#F3F1EB] border border-[#A1A1A1] rounded-lg p-[10px] w-full">
                        </div>
                        <div>
                            <label class="block text-lg font-bold text-gray-800 mb-1">Participants</label>
                            <input type="text" name="participants" placeholder="Participants.."
                                class="bg-[#F3F1EB] border border-[#A1A1A1] rounded-lg p-[10px] w-full">
                        </div>
                        <div>
                            <label class="block text-lg font-bold text-gray-800 mb-1">Date</label>
                            <input type="date"
                                class="bg-[#F3F1EB] border border-[#A1A1A1] rounded-lg p-[10px] w-full">
                        </div>
                    </div>
                    <div>
        
              
                </div>
            </div>
    </div>

    <div class="grid grid-cols-2 gap-4">
        

        <div class="absolute bottom-10 right-10">
            <button type="submit"
                class="bg-[#7495C6] text-white px-16 py-3 rounded-xl text-xl font-bold shadow-lg hover:bg-blue-600 transition">
                Add
            </button>
        </div>
        </form>
    </div>

</body>

</html>