

let panels = document.querySelectorAll(".panel");
const nav = document.querySelector(".nav");
const ul = document.querySelectorAll(".ul");
const logo = document.querySelector(".logo");
const nav_a = document.querySelectorAll(".nav_a");
const panier = document.querySelector(".panier");
const li = document.querySelectorAll(".li");
const btn_menu = document.querySelector(".btn_menu");
const produit = document.querySelector(".produit");



produit.forEach(product => {
    product.addEventListener("click", function()  {
        li.classList.toggle("");
    })
} )






panels.forEach(panel => {
    panel.addEventListener("click", function()  {
        removeActiveClasses ()
        panel.classList.add("active")
    })
} )
function removeActiveClasses () {
    panels.forEach(panel => {
        panel.classList.remove("active")
    })
}
function addActiveClasses () {
    panels.forEach(panel => {
        panel.classList.add("active")
    })
}

btn_menu.addEventListener("click", () =>{
    nav.classList.toggle("nav_active");
    logo.classList.toggle("logo_active");
    panier.classList.toggle("panier_active");
    btn_menu.classList.toggle("btn_menu_active");
    ul.classList.toggle("ul_active");
} );


nav_a.forEach(navA => {
    btn_menu.addEventListener("click", function()  {
        navA.classList.toggle("nav_a_active");
    })
} )

li.forEach(li => {
    btn_menu.addEventListener("click", function()  {
        li.classList.toggle("li_active");
    })
} )


