
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