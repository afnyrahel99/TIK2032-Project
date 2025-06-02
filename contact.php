<?php
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = trim($_POST['name']);
    $pesan = trim($_POST['message']);

    $conn = new mysqli("localhost", "root", "", "projectweb");

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
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <style>
        body {
            background-color: #fffbea;
            font-family: 'Comic Sans MS', cursive, sans-serif;
            margin: 0;
            padding: 0;
            color: #5c4200;
            text-align: center;
        }

        .container {
            padding: 20px;
        }

        nav {
            background-color: #ffefba;
            padding: 10px 0;
            margin-bottom: 30px;
        }

        nav a {
            margin: 0 15px;
            color: #8b5e00;
            text-decoration: none;
            font-weight: bold;
        }

        h1 {
            font-size: 2em;
            margin-bottom: 10px;
        }

        .form-box {
            background-color: #fff1a8;
            display: inline-block;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 10px #f7e28a;
            text-align: left;
        }

        .form-box p {
            margin: 5px 0;
        }

        .subtitle {
            font-size: 1.2em;
            font-weight: bold;
            text-align: center;
            margin-bottom: 15px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #d8c46c;
            border-radius: 5px;
            font-family: inherit;
        }

        button {
            background-color: #fcd200;
            border: none;
            padding: 10px 20px;
            color: #5c4200;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover {
            background-color: #ffdb4d;
        }

        .message {
            margin-top: 15px;
            color: green;
            font-weight: bold;
            text-align: center;
        }

        footer {
            margin-top: 40px;
            color: #8c7300;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Contact</h1>
        <nav>
            <a href="index.html">Home</a> |
            <a href="gallery.html">Gallery</a> |
            <a href="blog.php">Blog</a> |
            <a href="contact.php">Contact</a>
        </nav>

        <div class="form-box">
            <p class="subtitle">Does anyone want to send toby a message? ૮₍ ˶ᵔ ᵕ ᵔ˶ ₎ა</p>
            <p>Email: afnyrewur09@gmail.com</p>
            <p>Instagram: afnyrwrr</p>

            <form method="POST" action="contact.php">
                <label for="name">Nama:</label><br>
                <input type="text" id="name" name="name" required><br><br>

                <label for="message">Pesan:</label><br>
                <textarea id="message" name="message" required></textarea><br><br>

                <button type="submit">Kirim</button>
            </form>

            <?php if (!empty($message)): ?>
                <p class="message"><?= htmlspecialchars($message) ?></p>
            <?php endif; ?>
        </div>

        <footer>© MY HAPPY DOGGO ૮₍ • ᴥ • ₎ა</footer>
    </div>
</body>
</html>
