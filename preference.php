<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accessibility Settings</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            --contrast: 100%;
            --font-size: 16px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .option {
            margin-bottom: 15px;
        }

        .option label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .option input[type="range"] {
            width: 100%;
        }

        .btn {
            padding: 10px 20px;
            background-color: #008080;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #008080;
        }

        .next-btn {
            display: block;
            margin-top: 20px;
            text-align: center;
        }

        .next-btn a {
            color: #008080;
            text-decoration: none;
            font-weight: bold;
        }

        .next-btn a:hover {
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
    <div class="container">
        <h2>Accessibility Settings</h2>
        <h3>If you are totally blind, kindly scroll down to the end of the page and click "Next"</h3>
        <div class="option">
            <label for="contrast">Adjust Contrast:</label>
            <input type="range" id="contrast" min="0" max="200" value="100" step="1">
        </div>

        <div class="option">
            <label for="fontSize">Adjust Font Size:</label>
            <input type="range" id="fontSize" min="10" max="30" value="16" step="1">
        </div>

        <button class="btn" onclick="applySettings()">Apply Settings</button>

        <div class="next-btn">
            <a href="login.php">Next</a>
        </div>
    </div>

    <script>
        document.getElementById('contrast').addEventListener('input', function() {
            var contrastValue = this.value;
            var fontSizeValue = document.getElementById('fontSize').value;
            applySettingsLocally(contrastValue, fontSizeValue);
            saveSettings(contrastValue, fontSizeValue);
        });

        document.getElementById('fontSize').addEventListener('input', function() {
            var fontSizeValue = this.value;
            var contrastValue = document.getElementById('contrast').value;
            applySettingsLocally(contrastValue, fontSizeValue);
            saveSettings(contrastValue, fontSizeValue);
        });

        function applySettings() {
            var contrastValue = document.getElementById('contrast').value;
            var fontSizeValue = document.getElementById('fontSize').value;

            saveSettings(contrastValue, fontSizeValue);

            applySettingsLocally(contrastValue, fontSizeValue);
        }

        function saveSettings(contrastValue, fontSizeValue) {
            localStorage.setItem('contrast', contrastValue);
            localStorage.setItem('fontSize', fontSizeValue);
        }

        function applySettingsLocally(contrastValue, fontSizeValue) {
            document.body.style.filter = "contrast(" + contrastValue + "%)";
            document.body.style.setProperty('--contrast', contrastValue + "%");

            document.body.style.fontSize = fontSizeValue + "px";
            document.body.style.setProperty('--font-size', fontSizeValue + "px");
        }

        function loadSettings() {
            var contrastValue = localStorage.getItem('contrast') || 100;
            var fontSizeValue = localStorage.getItem('fontSize') || 16;

            document.getElementById('contrast').value = contrastValue;
            document.getElementById('fontSize').value = fontSizeValue;

            applySettingsLocally(contrastValue, fontSizeValue);
        }

        window.onload = loadSettings;
    </script>
</body>
</html>
