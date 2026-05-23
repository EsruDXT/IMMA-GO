# IMMA-GO

IMMA-GO is a school dashboard and event management web application built using native PHP with MVC architecture.  
This project provides features for managing events, honors/achievements, users, and also event register (in development).

---

# Features

- Authentication (Login & Register)
- Admin Dashboard
- Event Management
- Honors / Achievement Management
- Soft Delete System
- Like System for Honors
- Responsive UI with TailwindCSS

---

# Tech Stack

<div align="center">

<div style="display:flex; justify-content:center; gap:20px; margin-bottom:20px;">

<img src="https://skillicons.dev/icons?i=php" width="60" />
<img src="https://skillicons.dev/icons?i=mysql" width="60" />
<img src="https://skillicons.dev/icons?i=tailwind" width="60" />

</div>

<div style="display:flex; justify-content:center; gap:20px;">

<img src="https://skillicons.dev/icons?i=js" width="60" />

<img src="https://cdn.simpleicons.org/laragon/0E83CD" width="60" height="60"/>

</div>

</div>

---

# Design App

![Figma](https://img.shields.io/badge/Figma-F24E1E?style=for-the-badge&logo=figma&logoColor=white)


---

# Installation

## 1. Clone Repository

```bash
git clone https://github.com/EsruDXT/imma-go.git
```

---

## 2. Move Project

Move the project folder into:

```bash
C:/laragon/www/
```

---

## 3. Import Database

Import the provided SQL file into phpMyAdmin.

Database name example:

```bash
imma_go
```

---

## 4. Run Laragon

Start:

- Apache
- MySQL

---

## 5. Open Project

```bash
http://localhost/imma-go/public/home
```

---

# Default Account

## Admin

```bash
Email: marvin@ski.sch.id
Password: admin123
```

---

# Folder Structure

```bash
app/
│
├── config/
│   │
│   ├── app.php
├── controllers/
│   │
│   ├── admin/
│   │   │
│   │   ├── EventsController.php
│   │   ├── HonorController.php
│   │   ├── ManageController.php
│   │   ├── UserController.php
│   ├── AuthController.php
│   ├── CompetitionController.php
│   ├── EventsController.php
│   ├── HomeController.php
│   ├── ProfileController.php
├── core/
│   │
│   ├── Controller.php
│   ├── Database.php
│   ├── Router.php
├── models/
│   │
│   ├── Event.php
│   ├── Honor.php
│   ├── Manage.php
│   ├── Profile.php
│   ├── Registration.php
│   ├── StudentActivity.php
│   ├── User.php
├── resources/
│   ├── css/
│   │   ├── input.php
├── views/
│   ├── admin
│   │   ├── event/
│   │   │   ├── create.php
│   │   │   ├── edit.php
│   │   │   ├── index.php
│   │   ├── honors/
│   │   │   ├── create.php
│   │   │   ├── edit.php
│   │   │   ├── index.php
│   │   ├── user/
│   │   │   ├── create.php
│   │   │   ├── edit.php
│   │   │   ├── index.php
│   │   ├── manage.php
│   ├── auth
│   │   ├── login.php
│   │   ├── register.php
│   ├── event
│   │   ├── competition-detail.php
│   │   ├── event-detail.php
│   │   ├── events.php
│   │   ├── register.php
│   │   ├── registration-detail.php
│   ├── layouts
│   │   ├── partials/
│   │   │   ├── footer.
│   │   │   ├── heeader
│   │   │   ├── sidebar
│   ├── profile
│   │   ├── profile.php
│   │   ├── student-activities.php
│   ├── home.php
│   
public/
│
├── assets/
│   ├── images
├── css/
├── js/
├── uploads/
├── index.php
```

---

# Main Features

## Honors System

- Create honors
- Edit honors
- Soft delete honors
- Upload images
- Like system

## Events System

- Create events
- Event details
- Registration system (Still on Development)

## User Management

- Add user
- Edit user
- Delete user

---

# UI Preview

## Dashboard
- Dynamic honors section
- Event slider
- Responsive layout

## Admin Panel
- CRUD management (Honors, Events, Users)
- Modal confirmation
- Image preview upload

---

# Author

Developed by:

```bash
Marvin Arif Pratama as Fullstack Web Developer
William Tjandera as Frontend Web Developer
Clevio Qeeyra Endrova as UI/UX Designer
Forensya Hani as UI/UX Designer
```

---

# License

This project is for educational purposes.
