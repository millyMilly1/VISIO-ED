<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VisioEd</title>
  <link rel="icon" href="../image/0c3946b8-67c6-4624-9739-6493bca6ed0c-removebg-preview.png" type="image/x-icon">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form {
            background-color: #fff;
            padding: 2rem;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        form label {
            display: block;
            margin: 0.5rem 0;
        }
        form input[type="text"],
        form input[type="password"] {
            width: 100%;
            padding: 0.5rem;
            margin: 0.5rem 0 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        form input[type="submit"] {
            background-color: #008080;
            color: #fff;
            border: none;
            padding: 0.5rem 1rem;
            cursor: pointer;
            border-radius: 5px;
        }
        form input[type="submit"]:hover {
            background-color: #007070;
        }
    </style>
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
    <form action="admin_login_process.php" method="post">
        <h2>Admin Login</h2>
        <?php if (isset($_GET['error']) && $_GET['error'] == 'invalid'): ?>
            <p style="color: red;">Invalid username or password.</p>
        <?php endif; ?>
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="Login">
        <a href="admin_signup.php">signup</a>
    </form>
    
</body>
</html>
