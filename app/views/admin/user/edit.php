<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Edit User</title>

<script src="https://cdn.tailwindcss.com"></script>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>

<body class="bg-[#2D5DA1] font-[Arial] overflow-hidden">

<div class="flex h-screen">

<?php require_once '../app/views/layouts/partials/sidebar.php'; ?>

<div class="flex-1 bg-[#F3F1EC] rounded-l-[50px] px-[80px] py-[40px] overflow-y-auto relative">

<div class="flex items-center gap-5 mb-[30px]">

<button
onclick="history.back()"
class="w-[45px] h-[45px] bg-[#6489BF] rounded-[10px] text-white">

<i class="fa-solid fa-chevron-left"></i>

</button>

<h1 class="text-[28px] font-medium">
Back
</h1>

</div>

<h1 class="text-[56px] font-bold mb-[30px]">
Edit User
</h1>

<form
action="/admin/users/update"
method="POST">

<input
type="hidden"
name="id"
value="<?= $user['id'] ?>"
>

<div class="mb-[30px]">

<label class="block text-[18px] font-bold mb-[10px]">
Name
</label>

<input
type="text"
name="name"
value="<?= htmlspecialchars($user['name']) ?>"
required
class="w-[460px] h-[52px] px-[20px]
rounded-[10px]
border border-black
bg-transparent
outline-none">

</div>


<div class="mb-[30px]">

<label class="block text-[18px] font-bold mb-[10px]">
Role
</label>

<div class="relative w-[200px]">

<select
name="role"
class="w-full h-[50px]
px-[20px]
rounded-[10px]
bg-[#6489BF]
text-white
appearance-none
outline-none">

<option
value="student"
<?= $user['role']=="student" ? "selected" : "" ?>>

Student

</option>

<option
value="teacher"
<?= $user['role']=="teacher" ? "selected" : "" ?>>

Teacher

</option>

<option
value="admin"
<?= $user['role']=="admin" ? "selected" : "" ?>>

Admin

</option>

</select>

</div>

</div>


<div class="mb-[30px]">

<label class="block text-[18px] font-bold mb-[10px]">

Email

</label>

<input
type="email"
name="email"
value="<?= htmlspecialchars($user['email']) ?>"
required
class="w-[460px] h-[52px] px-[20px]
rounded-[10px]
border border-black
bg-transparent
outline-none">

</div>


<div>

<label class="block text-[18px] font-bold mb-[10px]">

New Password

</label>

<input
type="password"
name="password"
placeholder="Kosongkan jika tidak diubah"
class="w-[460px] h-[52px] px-[20px]
rounded-[10px]
border border-black
bg-transparent
outline-none">

</div>

<div class="absolute bottom-[35px] right-[60px]">

<button
type="submit"
class="bg-[#6489BF]
text-white
px-[70px]
py-[14px]
rounded-[12px]
font-bold">

Save

</button>

</div>

</form>

</div>
</div>

</body>
</html>