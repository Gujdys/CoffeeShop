let navbar = document.querySelector('.navbar');
produkty = {};

//Get all products


async function init_website() {
    //Get all products
    produkty = await GetProdukty('/coffeeShop/php/apiHandler.php?doGetAllCoffee'); //API calls take time, we have to wait for a while
    generateProducts(product, produkty);
}

window.onload = init_website();




// this.loadItems();
// this.distributeItems();
// loadItems = function() {
//     this.products = $.parseJSON($.ajax({
//         url: "php/api.php",
//         dataType: "json",
//         async: false
//     }).responseText);
// };
// distributeItems = function() {
//     //priradi itemy do divu
//     const product = document.querySelectorAll(".content h3");

//         product.setAttribute("nazev", this.products.nazev);

//         //smazat
//         this.products.splice(this.products.indexOf(this.products));
//         console.log(this.products);
//     }
document.querySelector('#menu-btn').onclick = () =>{
    navbar.classList.toggle('active');
    searchForm.classList.remove('active');
    cartItem.classList.remove('active');
}

let searchForm = document.querySelector('.search-form');

document.querySelector('#search-btn').onclick = () =>{
    searchForm.classList.toggle('active');
    navbar.classList.remove('active');
    cartItem.classList.remove('active');
}
 

let cartItem = document.querySelector('.cart-items-container');

document.querySelector('#cart-btn').onclick = () =>{
    cartItem.classList.toggle('active');
    navbar.classList.remove('active');
    searchForm.classList.remove('active');
    
}

window.onscroll = () =>{
    navbar.classList.remove('active');
    searchForm.classList.remove('active');
    cartItem.classList.remove('active');
}




