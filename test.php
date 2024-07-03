<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/mainstyle.css"> <!-- Ensure the correct path to your CSS file -->
</head>
<body>
    <div class="topbar">
        <div class="logo">Logo</div>
        <div class="username">
            Username
            <div class="dropdown">
                <span onclick="toggleDropdown()">▼</span>
                <div id="dropdown-menu" class="dropdown-menu">
                    <a href="#profile">Profile</a>
                    <a href="#settings">Settings</a>
                    <a href="#logout">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Other content of your page -->

    <script>
        function toggleDropdown() {
            document.getElementById("dropdown-menu").classList.toggle("show");
        }

        window.onclick = function(event) {
            if (!event.target.matches('.username span')) {
                var dropdowns = document.getElementsByClassName("dropdown-menu");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>
</body>
</html>
