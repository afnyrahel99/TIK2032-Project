<?php
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = trim($_POST['name']);
    $pesan = trim($_POST['message']);

    $conn = new mysqli("localhost", "root", "", "tik2032_project");

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO contact (name, message) VALUES (?, ?)");
    $stmt->bind_param("ss", $nama, $pesan);

    if ($stmt->execute()) {
        $message = "Pesan berhasil dikirim untuk Toby! 🐾";
    } else {
        $message = "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Kontak</title>
</head>
<body>
    <h2>Hubungi Kami</h2>
    <form method="POST" action="contact.php">
        <label for="name">Nama:</label>
        <input type="text" id="name" name="name" required /><br /><br />

        <label for="message">Pesan:</label>
        <textarea id="message" name="message" required></textarea><br /><br />

        <button type="submit">Kirim</button>
    </form>

    <?php if (!empty($message)) echo "<p>$message</p>"; ?>
</body>
</html>
