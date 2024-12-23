<?php
include 'db_connection.php'; // Include your database connection script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

   
    if ($password !== $confirm_password) {
        $error = "Passwords do not match.";
    } else {
        
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

       
        $sql = "INSERT INTO admins (username, password) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $hashed_password);

        if ($stmt->execute()) {
           
            header("Location: admin_login.php?signup_success=1");
            exit();
        } else {
            $error = "Error: " . $sql . "<br>" . $conn->error;
        }

        $stmt->close();
    }
}

mysqli_close($conn); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Signup</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .signup-container {
            background-color: #fff;
            padding: 2rem;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        .signup-container h2 {
            margin-bottom: 1rem;
            text-align: center;
        }
        .signup-container form label {
            display: block;
            margin: 0.5rem 0 0.2rem;
        }
        .signup-container form input[type="text"],
        .signup-container form input[type="password"] {
            width: 100%;
            padding: 0.5rem;
            margin: 0.5rem 0 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .signup-container form input[type="submit"] {
            background-color: #008080;
            color: #fff;
            border: none;
            padding: 0.5rem 1rem;
            cursor: pointer;
            border-radius: 5px;
            width: 100%;
        }
        .signup-container form input[type="submit"]:hover {
            background-color: #007070;
        }
        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 1rem;
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
    <div class="signup-container">
        <h2>Admin Signup</h2>
        <?php if (isset($error)) : ?>
            <p class="error-message"><?php echo $error; ?></p>
        <?php endif; ?>
        <form action="admin_signup.php" method="post">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Username" required>
            
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Password" required>
            
            <label for="confirm_password">Confirm Password</label>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
            
            <input type="submit" value="Sign Up">
        </form>
    </div>
</body>
</html>
