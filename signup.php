<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>VisioEd</title>
<link rel="icon" href="../image/0c3946b8-67c6-4624-9739-6493bca6ed0c-removebg-preview.png" type="image/x-icon">
<style>
body {
  background-color: #008080;
  font-family: Arial, sans-serif;
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
input[type="text"],
input[type="password"],
input[type="email"], 
input[type="date"], 
input[type="tel"], 
select {
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


label {
  font-weight: bold;
}

.required {
  color: red;
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
<div class="container">
  <h2>Signup</h2>
  <form method="post" action="signup_process.php">
    <div class="row">
      <div class="col">
        <label for="first_name">First Name<span class="required">*</span>:</label>
        <input type="text" id="first_name" name="first_name" required>
      </div>
      <div class="col">
        <label for="last_name">Last Name<span class="required">*</span>:</label>
        <input type="text" id="last_name" name="last_name" required>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <label for="username">Username<span class="required">*</span>:</label>
        <input type="text" id="username" name="username" required>
      </div>
      <div class="col">
        <label for="password">Password<span class="required">*</span>:</label>
        <input type="password" id="password" name="password" required>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <label for="confirm_password">Confirm Password<span class="required">*</span>:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <label for="email">Email<span class="required">*</span>:</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="col">
        <label for="phone_number">Phone Number:</label>
        <input type="tel" id="phone_number" name="phone_number">
      </div>
    </div>
    <div class="row">
      <div class="col">
        <label for="accessibility_preference">Accessibility Preference:</label>
        <select id="accessibility_preference" name="accessibility_preference">
          <option value="blind">Blind</option>
          <option value="partially_blind">Partially Blind</option>
          <option value="sighted">Sighted</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <label for="date_of_birth">Date of Birth<span class="required">*</span>:</label>
        <input type="date" id="date_of_birth" name="date_of_birth" required>
      </div>
      <div class="col">
        <label for="country_of_residence">Country of Residence:</label>
        <input type="text" id="country_of_residence" name="country_of_residence">
      </div>
    </div>
    <div class="row">
      <div class="col">
        <label for="level_of_education">Level of Education:</label>
        <select id="level_of_education" name="level_of_education">
          <option value="bsc">B.Sc</option>
          <option value="masters">Masters Degree</option>
          <option value="other">Other</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <input type="submit" value="Submit">
      </div>
    </div>
  </form>
  <p>Already have an account? <a href="login.php">Login</a></p>
</div>

<script>
            // Retrieve settings from localStorage and apply them
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
