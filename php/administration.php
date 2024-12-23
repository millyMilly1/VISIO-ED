<?php
session_start();

$successMessage = isset($_GET['success']) && $_GET['success'] == 1 ? "Content added successfully!" : "";
$errorMessages = isset($_SESSION['errorMessages']) ? $_SESSION['errorMessages'] : [];
unset($_SESSION['errorMessages']);

include 'db_connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: #008080;
            color: #fff;
            padding: 1rem;
            text-align: center;
        }
        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            background-color: #007070;
            display: flex;
            justify-content: center;
        }
        nav ul li {
            margin: 0 1rem;
        }
        nav ul li a {
            color: #fff;
            text-decoration: none;
            padding: 0.5rem;
        }
        nav ul li a:hover {
            background-color: #006060;
        }
        main {
            padding: 1rem;
        }
        section {
            background-color: #fff;
            margin: 1rem 0;
            padding: 1rem;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        form label {
            display: block;
            margin: 0.5rem 0 0.2rem;
        }
        form input[type="text"],
        form textarea,
        form input[type="file"] {
            width: 80%;
            padding: 0.5rem;
            margin: 0.5rem 0 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        form input[type="submit"] {
            background-color: #006060;
            color: #fff;
            border: none;
            padding: 0.5rem 1rem;
            cursor: pointer;
            border-radius: 5px;
        }
        form input[type="submit"]:hover {
            background-color: #007070;
        }
        footer {
            text-align: center;
            padding: 1rem;
            background-color: #008080;
            color: #fff;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
    </header>
    <main>
        <section id="upload-content">
            <h2>Upload Course Content</h2>
            <?php if (!empty($successMessage)) : ?>
                <p style="color: green;"><?php echo $successMessage; ?></p>
            <?php endif; ?>
            <?php if (!empty($errorMessages)) : ?>
                <ul style="color: red;">
                    <?php foreach ($errorMessages as $errorMessage) : ?>
                        <li><?php echo $errorMessage; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <form action="add_content.php" method="post" enctype="multipart/form-data">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" placeholder="Title" required><br>

                <label for="description">Description</label>
                <textarea id="description" name="description" placeholder="Description" required></textarea><br>

                <label for="document">Upload Document</label>
                <input type="file" id="document" name="document" accept=".pdf, .doc, .docx"><br>

                <label for="video">Upload Video</label>
                <input type="file" id="video" name="video" accept="video/*"><br>

                <input type="submit" value="Add Content">
            </form>
        </section>

        <section id="uploaded-documents">
            <h2>Uploaded Documents</h2>
            <?php
            $sql = "SELECT title, description, document_path FROM contents WHERE document_type = 'document'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='content-item'>";
                    echo "<h3>" . htmlspecialchars($row['title']) . "</h3>";
                    echo "<p>" . nl2br(htmlspecialchars($row['description'])) . "</p>";
                    echo "<a href='" . htmlspecialchars($row['document_path']) . "' download>Download Document</a>";
                    echo "</div>";
                }
            } else {
                echo "No documents available.";
            }
            ?>
        </section>

        <section id="uploaded-videos">
            <h2>Uploaded Videos</h2>
            <?php
            $sql = "SELECT title, description, document_path FROM contents WHERE document_type = 'video'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $fileExtension = strtolower(pathinfo($row['document_path'], PATHINFO_EXTENSION));
                    echo "<div class='content-item'>";
                    echo "<h3>" . htmlspecialchars($row['title']) . "</h3>";
                    echo "<p>" . nl2br(htmlspecialchars($row['description'])) . "</p>";
                    echo "<video width='320' height='240' controls>
                            <source src='" . htmlspecialchars($row['document_path']) . "' type='video/$fileExtension'>
                            Your browser does not support the video tag.
                          </video>";
                    echo "</div>";
                }
            } else {
                echo "No videos available.";
            }
            ?>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 VisioEd E-Learning Platform</p>
    </footer>
</body>
</html>

<?php
$conn->close();
?>
