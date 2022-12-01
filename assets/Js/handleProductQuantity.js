if (document.querySelector('.moins')) {
    let moinsElement = document.querySelector('.moins');
    let quantityElement = document.querySelector('.quantity');
    let plusElement = document.querySelector('.plus');
    
    moinsElement.onclick = function () {
        let quantity = parseInt(quantityElement.innerText);
        if (quantity > 1) {
            quantityElement.innerText = quantity - 1;
        }
    }
    plusElement.onclick = function () {
        let quantity = parseInt(quantityElement.innerText);
        quantityElement.innerText = quantity + 1;
    }  
}
