var generateRandom = document.getElementById('generateRandom');
var winningNo = document.getElementById('winningNo');
var custom_winningNo = document.getElementById('custom_winningNo');
var go = document.getElementById('btn_generate');
var priceType = document.getElementById('priceType');
generateRandom.onchange = function() {
    if (generateRandom.value === "0") {

        winningNo.readOnly = true;
        go.style.display = "block";
    } else {
        winningNo.readOnly = false;
        go.style.display = "none";
    }
}