<?php
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = trim($_POST['name']);
    $pesan = trim($_POST['message']);

    // Koneksi ke database
    $conn = new mysqli("localhost", "root", "", "tik2032_project");
    
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Prepared statement untuk insert
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
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Contact - TIK2032 Project</title>
    <link rel="stylesheet" href="stylecontact.css" />
</head>
<body>
    <h1>Contact</h1>
    <nav>
        <a href="index.html">Home</a> | 
        <a href="gallery.html">Gallery</a> | 
        <a href="blog.php">Blog</a> | 
        <a href="contact.php">Contact</a>
    </nav>

    <section id="contact">
        <h2>Does anyone want to send toby a message? ૮₍ 𝁽ܫ𝁽 ₎ა</h2>
        <p>Email: afnyrewur09@gmail.com</p>
        <p>Instagram: afnyrwr</p>

        <?php if($message): ?>
            <p style="color: green; font-weight: bold;"><?php echo htmlspecialchars($message); ?></p>
        <?php endif; ?>

        <form method="POST" action="contact.php">
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" required /><br /><br />

            <label for="message">Pesan:</label>
            <textarea id="message" name="message" required></textarea><br /><br />

            <button type="submit">Kirim</button>
        </form>
    </section>

    <footer>
        <p style="text-align:center;">&copy; My Happy Doggo ૮₍ • ᴥ • ₎ა</p>
    </footer>

    <script src="contact.js"></script>
</body>
</html>
