let menu = document.querySelector("#menu-icon");
let navbar = document.querySelector(".navbar");
let header = document.querySelector(".header-action");

menu.addEventListener("click", function () {
    navbar.classList.toggle("active");
    header.classList.toggle("active");
});

window.onscroll = () => {
    navbar.classList.remove("active");
    header.classList.remove("active");
}