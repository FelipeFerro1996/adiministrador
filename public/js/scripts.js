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

$(document).ready(function(){
    $('.cpf').mask('000.000.000-00');
    $('.phone').mask('(00) 00000-0000');
    $('.money').mask('#0.00', {reverse: true});
    
    $('.excluirForm').click(function(){
        if(confirm('Deseja realmente excluir?')){
            $(this).closest('form').submit();
        }
    });
});

// $(document).ready(()=>{
//     $('.form-select').select2();
// })
