<?php
// register.php
session_start();
include 'assets/php/db_connect.php'; // Verbindungsdatei zur Datenbank

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password === $confirm_password) {
        // Überprüfen, ob der Benutzername bereits existiert
        if ($stmt = $conn->prepare("SELECT * FROM users WHERE username = ?")) {
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 0) {
                // Benutzername existiert nicht, neuen Benutzer erstellen
                if ($stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)")) {
                    $stmt->bind_param("ss", $username, $password);
                    $stmt->execute();

                    echo "Registrierung erfolgreich! Sie können sich jetzt einloggen.";
                    sleep(3);
                    header("Location: index.html");
                } else {
                    echo "Fehler beim Erstellen des Benutzers: " . $conn->error;
                }
            } else {
                echo "Der Benutzername ist bereits vergeben.";
            }
            $stmt->close();
        } else {
            echo "Fehler bei der Überprüfung des Benutzernamens: " . $conn->error;
        }
    } else {
        echo "Passwörter stimmen nicht überein.";
    }
}
$conn->close();
?>