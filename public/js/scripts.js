// alert("Está funcionando");

const menuMobile = document.querySelector(".menu-mobile");
const body = document.querySelector("body");

menuMobile.addEventListener("click", () => {
    //alert('teste');
    menuMobile.classList.contains("fa-bars") 
        ? menuMobile.classList.replace("fa-bars", "fa-xmark") 
        : menuMobile.classList.replace("fa-xmark", "fa-bars");

    body.classList.toggle('menu-active')
});

// $(document).ready(()=>{
//     $('.form-select').select2();
// })
