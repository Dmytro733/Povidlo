let burgerIcon = document.querySelector('.burger');
let listMenu = document.querySelector('.header_menu-items');
let cart = document.querySelector('.cart');
let cartMenu = document.querySelector('.cart-menu');
let b = document.querySelector('body');

burgerIcon.addEventListener('click', () =>{
    listMenu.classList.toggle('burger-active');
    cart.classList.toggle('opacity-style');
    cartMenu.classList.toggle('hide');
})