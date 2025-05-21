<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Contact - TIK2032 Project</title>
    <link rel="stylesheet" href="stylecontact.css">
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
        <h2>Does anyone want to send Toby a message? ૮₍ 𝁽ܫ𝁽 ₎ა</h2>
        <p>Email: afnyrewur09@gmail.com</p>
        <p>Instagram: afnyrwr</p>

        <form method="POST" action="contact.php">
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" required><br><br>

            <label for="message">Pesan:</label>
            <textarea id="message" name="message" required></textarea><br><br>

            <button type="submit">Kirim</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            include 'koneksi.php';

            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $message = mysqli_real_escape_string($conn, $_POST['message']);

            $sql = "INSERT INTO contact_messages (nama, pesan) VALUES ('$name', '$message')";

            if (mysqli_query($conn, $sql)) {
                echo "<p>Pesan berhasil dikirim!</p>";
            } else {
                echo "<p>Gagal mengirim pesan.</p>";
            }

            mysqli_close($conn);
        }
        ?>
    </section>

    <footer>
        <p style="text-align:center;">&copy; My Happy Doggo ૮₍ • ᴥ • ₎ა</p>
    </footer>

    <script src="contact.js"></script>
</body>
</html>
