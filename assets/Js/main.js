import {appendDOM} from './appendDOM.js';
import './handleProductQuantity.js';
import './showCart.js';
import './getFilter.js';

let cartProductElement = document.querySelector('.cart-products');
let articleIdElement = document.querySelector('.article-id');
let userIdElement = document.querySelector('.user-id');
let articlesElement = document.querySelector('.cart-articles');
let quantityElement = document.querySelector('.quantity');
let storeKey, storeQuantityItem, storeCart;

if (userIdElement.innerText) {
    storeKey = 'userId'+userIdElement.innerText;
    storeQuantityItem = 'quantity'+'userId'+userIdElement.innerText;
    storeCart = 'cartQuantity'+'userId'+userIdElement.innerText;

    localStorage.setItem('stockUserID', storeKey);
    if (localStorage.getItem('guestCart') && !localStorage.getItem(storeKey)) {
        localStorage.setItem(storeKey, localStorage.getItem('quantity'));
        localStorage.setItem(storeQuantityItem, localStorage.getItem('quantity'));
        localStorage.setItem(storeCart, localStorage.getItem('cartQuantity'));
    }

}else{
    storeKey = 'guestCart';
    storeQuantityItem = 'quantity';
    storeCart = 'cartQuantity';
}

document.querySelector('.cart-products').innerText = (localStorage.getItem(storeCart)!=undefined)?localStorage.getItem(storeCart):'';

if (localStorage.getItem('cart')){
    let cartStockData = JSON.parse(localStorage.getItem('cart'));
    appendDOM(cartStockData, storeQuantityItem);
}else{
    articlesElement.innerHTML = '<div style="font-size:1.5rem; padding:40px 0; text-align:center;"> YOUR CART IS EMPTY </div>';
}

if (document.querySelector('.moins')) {

    let add_cart = document.querySelector('.add-cart');
    add_cart.onclick = function() {
        console.log(storeKey)
        let cartQuantity = localStorage.getItem(storeCart)??0;
        let cartItem = localStorage.getItem(storeKey)?JSON.parse(localStorage.getItem(storeKey)):[];
        let cartItemQuantity = localStorage.getItem(storeQuantityItem)?JSON.parse(localStorage.getItem(storeQuantityItem)):[];
        
        let checkItem = cartItem.some(function(item){
            return item == articleIdElement.innerText;
        })
        
        if (!checkItem) {
            cartItem.push(parseInt(articleIdElement.innerText));
            localStorage.setItem(storeKey, JSON.stringify(cartItem));

            cartItemQuantity.push(parseInt(quantityElement.innerText));
            localStorage.setItem(storeQuantityItem, JSON.stringify(cartItemQuantity));

            cartQuantity = parseInt(cartQuantity) + 1;
            localStorage.setItem(storeCart, cartQuantity);
            cartProductElement.innerText = cartQuantity;

            articlesElement.innerHTML='';

            fetch('http://projetphpindividu.test/panier', {
                    method: 'POST',
                    body: localStorage.getItem(storeKey),
                    headers: {
                        'Content-Type': 'application/json',
                    }
            })
            .then((response)=>{
                return response.json();
            })
            .then((returndata)=>{
                if (returndata !='Error 404') {
                    localStorage.setItem('cart', JSON.stringify(returndata));
                    console.log(returndata);
                    appendDOM(returndata, storeQuantityItem);
                }
            })
        } 

    }
}

if (document.querySelector('.logout')) {
    
    document.querySelector('.logout').onclick = ()=>{
        localStorage.removeItem(storeKey);
        localStorage.removeItem(storeQuantityItem);
        localStorage.removeItem(storeCart);
    }
}

