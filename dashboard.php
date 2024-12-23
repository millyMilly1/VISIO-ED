<?php
session_start();

if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: #f3f3f3;
            color: #fff;
        }

        .logo img {
            width: 150px;
            height: auto;
        }

        .navbar-left {
            flex: 1;
        }

        .navbar-right {
            flex: 1;
            display: flex;
            justify-content: flex-end;
        }

        .navbar-right a {
            color: #008080;
            margin-left: 20px;
            text-decoration: none;
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
        .content-item h2 {
            margin-top: 0;

        }
        .content-item a {
            display: block;
            margin-top: 10px;
            color: inherit;
            text-decoration: none;

        }
        .content-item a:hover {
            text-decoration: underline;
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


<!--stop here -->
<body>
<header>
        <nav class="navbar">
            <div class="navbar-left">
                <a href="#" class="logo">
                    <img src="../image/logo (3).png" alt="VisioEd Logo">
                </a>
            </div>
            <div class="navbar-right">
                <a href="../index.html">Home</a>
                <a href="about.html">About Us</a>
                <a href="feature.html">Contact Us</a>
               
            </div>
            <div id="google_translate_element"></div>
        </nav>
    </header>
    <div class="container">
        <div class="welcome">
            <h1>Welcome to the User Dashboard, <?php echo $username; ?>!</h1>
            <p>Here you can access various contents uploaded by lecturers.</p>
        </div>
        <div class="content">
        <div class="content-item">
                <h2>Library</h2>
                <a href="library.php">Go to Library</a>
            </div>

            <div class="content-item">
                <h2>Materials Uploads</h2>
                <a href="users_materials.php">Go to Materials Uploads</a>
            </div>
            <div class="content-item">
                <h2>Videos</h2>
                <a href="material_video.php">Go to Videos</a>
            </div>
           
        </div>
    </div>
</body>
<script>
    var contrastValue = localStorage.getItem('contrast') || 100;
    var fontSizeValue = localStorage.getItem('fontSize') || 16;
    applySettingsLocally(contrastValue, fontSizeValue);

    function applySettingsLocally(contrastValue, fontSizeValue) {
      document.body.style.filter = "contrast(" + contrastValue + "%)";
      document.body.style.setProperty('--contrast', contrastValue + "%");

      document.body.style.fontSize = fontSizeValue + "px";
      document.body.style.setProperty('--font-size', fontSizeValue + "px");
    }
  </script>
</html>
