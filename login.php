<?php
    session_start();
    if (isset($_SESSION['error'])) {
      echo "<p style='color: red;'>" . $_SESSION['error'] . "</p>";
      unset($_SESSION['error']);
    }
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;700&display=swap" rel="stylesheet">
<title>VisioEd</title>
  <link rel="icon" href="../image/0c3946b8-67c6-4624-9739-6493bca6ed0c-removebg-preview.png" type="image/x-icon">
<style>
  body {
    background-color: #008080;
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
    width: 300px;
    margin: 0 auto;
    margin-top: 100px;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  }
  input[type="text"], input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
    box-sizing: border-box;
  }
  input[type="submit"] {
    width: 100%;
    padding: 10px;
    border: none;
    background-color: #008080;
    color: #fff;
    cursor: pointer;
    border-radius: 3px;
  }


 /*start from this css and end at where i said you should stop ...copy and paste it on all pages*/
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
                <a href="php/about_us.php">About Us</a>
                <a href="feature.html">Contact Us</a>
            </div>
          
        </nav>
    </header>
  
  <div class="container">
    <h2>Login</h2>
  
    <form action="login_process.php" method="post">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <input type="submit" value="Login">
    </form>
    <p>Don't have an account? <a href="signup.php">Signup</a></p>
  </div>
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
</body>
</html>
