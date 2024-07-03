<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['username'] !== 'admin') {
    header("Location: index.html");
    exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Midnight Club - Hub</title>
    <link rel="stylesheet" href="assets/css/mainstyle.css">
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon" />
</head>
<body>
<div class="topbar">
<button class="openbtn" onclick="openNav()">☰ Midnight</button>
    <div class="username"><?php echo htmlspecialchars($username); ?>
    <span onclick="toggleDropdown()">▼</span>
                <div id="dropdown-menu" class="dropdown-menu">
                    <a href="#profile">Profile</a>
                    <a href="#settings">Settings</a>
                    <a href="#logout">Logout</a>
    </div>
    
</div>

<div id="mySidebar" class="sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href="main">Home</a>
    <a href="#">Services</a>
    <a href="#">Clients</a>
    <a href="#">Contact</a>
</div>

<div class="main-content">
    <h1>Welcome to the Dashboard</h1>
</div>

<script src="assets/js/script.js"></script>
</body>
<footer>
    <p>&copy; 2024 Sylyx - made with ❤️</p>
</footer>
</html>
