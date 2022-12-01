let selectElement = document.querySelector('#filter');

if (selectElement) {
    selectElement.onchange = function(e){
        window.location.href = "/?filter=" + e.target.value;
    }
}