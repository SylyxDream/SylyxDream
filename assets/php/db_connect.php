<?php
$servername = "localhost";
$dbname = "dbs13022095";
$dbusername = "root";
$dbpassword = "";

// Verbindung zur Datenbank herstellen
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Verbindung überprüfen
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>