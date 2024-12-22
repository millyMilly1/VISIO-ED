function applySettings() {
    var contrastValue = document.getElementById('contrast').value;
    var fontSizeValue = document.getElementById('fontSize').value;

    
    document.body.style.filter = "contrast(" + contrastValue + "%)";
    document.body.style.setProperty('--contrast', contrastValue + "%");

    
    document.body.style.fontSize = fontSizeValue + "px";
    document.body.style.setProperty('--font-size', fontSizeValue + "px");
}
