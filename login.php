<?php
// login.php
session_start();
include 'assets/php/db_connect.php'; // Verbindungsdatei zur Datenbank

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Bereiten Sie die SQL-Abfrage vor, um den Benutzer zu überprüfen
    if ($stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?")) {
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            if ($user['username'] === 'admin') {
                $_SESSION['username'] = $user['username'];
                header("Location: main");
                exit();
            } else {
                header("Location: wartung");
                exit();
            }
        } else {
            echo "Ungültiger Benutzername oder Passwort";
        }
        $stmt->close();
    } else {
        echo "Fehler bei der Vorbereitung der Abfrage: " . $conn->error;
    }
}
$conn->close();
?>
