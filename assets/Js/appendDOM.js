export function appendDOM(data, storeQuantityItem) {
    let articlesElement = document.querySelector('.cart-articles');
    let cartSectionElement = document.querySelector('.cartSection');

    let subtotal = 0;
    let articleNumber = 0;
    data.forEach(function(item, key){
        
        articleNumber++;
        if (articleNumber>=2) {
            let lineDiv = document.createElement('div');
            lineDiv.setAttribute('class', 'cartLine');
            articlesElement.appendChild(lineDiv);
        }

        let quantity = (JSON.parse(localStorage.getItem(storeQuantityItem)))[key];

        let article = document.createElement('div');
        article.setAttribute('class', 'cartModal');

        
        article.innerHTML = `<img class="cartImage" src="../assets/Img/${item['image']}">
                    <div class="cartcontent">
                        <div class="cartTitle">${item['name']}</div>
                        <div class="cartQuantity">${quantity.toFixed(2)}</div>
                    </div>
                    <div class="cartPrix">${(item['price']*quantity).toFixed(2)} €</div>
                </div>`;
        
        articlesElement.appendChild(article);

        subtotal += item['price'] * quantity;
        
    })

    if (!document.querySelector('.subtotal')) {
        let subtotalElement = document.createElement('div');
        subtotalElement.setAttribute('class', 'subtotal');
        subtotalElement.innerHTML = `<div class="subtotal-title">SubTotal</div>
                                    <div class="subtotal-price"> ${subtotal.toFixed(2)} €</div>`;
        cartSectionElement.appendChild(subtotalElement);
    }else{
        document.querySelector('.subtotal-price').innerHTML = `${subtotal.toFixed(2)} €</div>`;
    }
    
}