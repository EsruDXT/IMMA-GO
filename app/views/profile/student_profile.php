<?php
$studentData = [
    'first_name' => 'Forensya',
    'last_name'  => 'Hani',
    'class'      => 'XI TKJ 3',
    'gender'     => 'Female',
    'nis'        => '7821',
    'nisn'       => '000976544578',
    'email'      => 'forensya.001@ski.sch.id',
    'address'    => 'Jl. Gusti Mahmud Gg. Nasi goreng, no.19',
    'phone'      => '(+62) 893-9855-7621',
    'dob'        => '10 - 02 - 2009',
];
$fullName = trim($studentData['first_name'] . ' ' . $studentData['last_name']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile – SMK Kristen Immanuel</title>
    <link rel="stylesheet" href="/css/profile.css">
</head>
<body>

<!-- SIDEBAR -->
<aside class="sidebar">
    <div class="logo-wrap">
        <svg viewBox="0 0 80 90" fill="none">
            <path d="M40 2 L76 16 L76 52 C76 70 40 88 40 88 C40 88 4 70 4 52 L4 16 Z" fill="#1e3a6e"/>
            <path d="M40 9 L69 21 L69 52 C69 67 40 82 40 82 C40 82 11 67 11 52 L11 21 Z" fill="#2a5298"/>
            <rect x="35" y="26" width="10" height="32" fill="white" rx="2"/>
            <rect x="24" y="37" width="32" height="10" fill="white" rx="2"/>
            <path d="M40 9 L69 21 L69 26 L11 26 L11 21 Z" fill="#1e3a6e"/>
            <text x="40" y="22" fill="white" font-size="7" font-weight="bold" text-anchor="middle" font-family="Arial">SMK KRISTEN</text>
            <path d="M18 68 C25 78 40 82 40 82 C40 82 55 78 62 68 Z" fill="#1e3a6e"/>
            <text x="40" y="77" fill="white" font-size="6" font-weight="bold" text-anchor="middle" font-family="Arial">IMMANUEL</text>
        </svg>
    </div>

    <nav class="nav-items">
        <a href="/home" class="nav-item">
            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
            </svg>
            <span>Home</span>
        </a>
        <a href="/events" class="nav-item">
            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <rect x="3" y="4" width="18" height="18" rx="2"/>
                <line x1="16" y1="2" x2="16" y2="6"/>
                <line x1="8" y1="2" x2="8" y2="6"/>
                <line x1="3" y1="10" x2="21" y2="10"/>
            </svg>
            <span>Events</span>
        </a>
        <a href="#" class="nav-item">
            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <circle cx="12" cy="5" r="3"/>
                <path d="M12 8l-2.5 6h5L12 8z"/>
                <path d="M7.5 22l1.5-8h6l1.5 8"/>
            </svg>
            <span>Honors</span>
        </a>
        <a href="#" class="nav-item">
            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <rect x="3" y="3" width="7" height="7" rx="1"/>
                <rect x="14" y="3" width="7" height="7" rx="1"/>
                <rect x="3" y="14" width="7" height="7" rx="1"/>
                <rect x="14" y="14" width="7" height="7" rx="1"/>
            </svg>
            <span>Overview</span>
        </a>
        <a href="/profile" class="nav-item active">
            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <circle cx="12" cy="8" r="4"/>
                <path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/>
            </svg>
            <span>Profile</span>
        </a>
    </nav>
</aside>

<!-- MAIN -->
<main class="page-main">
    <div class="page-card">

        <div class="top-section">

            <!-- Avatar -->
            <div class="avatar-section">
                <div class="avatar-wrap">
                    <div class="avatar">
                        <img src="/assets/images/Profile.png" alt="">
                    </div>
                    <div class="avatar-edit">
                        <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </div>
                </div>
                <p class="student-name"><?= $fullName ?></p>
                <p class="student-role">Student</p>
            </div>

            <!-- Fields -->
            <div class="fields-section">
                <h1 class="page-title">Student Profile</h1>
                <div class="fields-grid">

                    <div class="field-group">
                        <span class="field-label">First Name</span>
                        <div class="field-value"><?= $studentData['first_name'] ?></div>
                    </div>
                    <div class="field-group">
                        <span class="field-label">Last Name</span>
                        <div class="field-value"><?= $studentData['last_name'] ?></div>
                    </div>
                    <div class="field-group">
                        <span class="field-label">Class</span>
                        <div class="field-value"><?= $studentData['class'] ?></div>
                    </div>
                    <div class="field-group">
                        <span class="field-label">Gender</span>
                        <div class="field-value"><?= $studentData['gender'] ?></div>
                    </div>
                    <div class="field-group">
                        <span class="field-label">NIS</span>
                        <div class="field-value"><?= $studentData['nis'] ?></div>
                    </div>
                    <div class="field-group">
                        <span class="field-label">NISN</span>
                        <div class="field-value"><?= $studentData['nisn'] ?></div>
                    </div>
                    <div class="field-group full">
                        <span class="field-label">Email</span>
                        <div class="field-value"><?= $studentData['email'] ?></div>
                    </div>
                    <div class="field-group full">
                        <span class="field-label">Address</span>
                        <div class="field-value"><?= $studentData['address'] ?></div>
                    </div>
                    <div class="field-group">
                        <span class="field-label">Phone Number</span>
                        <div class="field-value"><?= $studentData['phone'] ?></div>
                    </div>
                    <div class="field-group">
                        <span class="field-label">Date of Birth</span>
                        <div class="field-value"><?= $studentData['dob'] ?></div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Logout -->
        <div class="logout-wrap">
            <a href="#" class="btn-logout">
                <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                </svg>
                Log Out
            </a>
        </div>

    </div>
</main>

</body>
</html>