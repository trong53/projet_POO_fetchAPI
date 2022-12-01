let cartElement = document.querySelector('.cart');
let cartSectionElement = document.querySelector('.cartSection');

cartElement.addEventListener('mouseover', ()=>{
    cartSectionElement.classList.add('cartSection-show');
})

cartSectionElement.addEventListener('mouseleave', ()=>{
    cartSectionElement.classList.remove('cartSection-show');
})