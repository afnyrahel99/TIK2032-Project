<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Blog - TIK2032 Project</title>
    <link rel="stylesheet" href="styleblog.css">
</head>
<body>
    <h1>Blog</h1>
    <nav>
        <a href="index.html">Home</a> | 
        <a href="gallery.html">Gallery</a> | 
        <a href="blog.php">Blog</a> | 
        <a href="contact.php">Contact</a>
    </nav>

    <?php
    include 'koneksi.php';

    $query = "SELECT * FROM blog_posts ORDER BY id DESC";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<article>";
        echo "<h3>" . htmlspecialchars($row['judul']) . "</h3>";
        echo "<p>" . nl2br(htmlspecialchars($row['konten'])) . "</p>";
        echo "</article>";
    }

    mysqli_close($conn);
    ?>

    <script src="blog.js"></script>
</body>
</html>
