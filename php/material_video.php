<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

include 'db_connection.php'; 

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - Videos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }
        .welcome {
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .content {
            margin-top: 20px;
        }
        .content-item {
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        #google_translate_element {
            display: inline-block;
            margin-left: 20px;
        }
        .goog-te-banner-frame.skiptranslate {
            display: none !important;
        }
        body {
            top: 0 !important;
        }
        .goog-te-gadget {
            font-family: 'Lora', serif;
            font-size: 14px;
            color: #008080;
        }
        .goog-te-gadget-simple {
            border: none;
            background-color: transparent;
            padding: 0;
            margin: 0;
            font-size: 14px;
            line-height: 1.5;
            color: #008080;
            font-family: 'Lora', serif;
        }
        .goog-te-gadget-simple .goog-te-menu-value {
            color: #008080;
        }
        .goog-te-gadget-simple .goog-te-menu-value span {
            color: #008080;
        }
        .goog-te-gadget-simple .goog-te-menu-value span:hover {
            text-decoration: underline;
        }
        .goog-te-gadget-icon {
            display: none;
        }
        .goog-te-menu-value:before {
            content: '\f0ac';
            font-family: 'FontAwesome';
            margin-right: 5px;
            color: #008080;
        }
    </style>
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
                includedLanguages: 'ar,es,fr,de,it,pt,zh-CN',
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE
            }, 'google_translate_element');
        }

        function applyStoredLanguage() {
            let lang = getCookie("googtrans");
            if (lang) {
                let translateSelect = document.querySelector("select.goog-te-combo");
                if (translateSelect) {
                    translateSelect.value = lang;
                    translateSelect.dispatchEvent(new Event('change'));
                }
            }
        }

        document.addEventListener("DOMContentLoaded", function () {
            googleTranslateElementInit();
            applyStoredLanguage();
        });

        document.addEventListener("click", function (event) {
            if (event.target.matches(".goog-te-menu-value span")) {
                setTimeout(() => {
                    let lang = getCookie("googtrans");
                    if (lang) {
                        setCookie("googtrans", lang, 365);
                    }
                }, 100);
            }
        });
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</head>
<body>
    <div class="container">
        <div class="welcome">
            <h1>Uploaded Videos</h1>
        </div>
        <div class="content">
            <?php
            $sql = "SELECT title, description, document_path FROM contents WHERE document_type = 'video'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $fileExtension = strtolower(pathinfo($row['document_path'], PATHINFO_EXTENSION));
                    echo "<div class='content-item'>";
                    echo "<h2>" . htmlspecialchars($row['title']) . "</h2>";
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

            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>
