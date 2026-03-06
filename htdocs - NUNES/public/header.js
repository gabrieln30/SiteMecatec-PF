
let navBar = document.querySelector('#header')

document.addEventListener("scroll", ()=>{
    let scrollTop = window.scrollY

    if(scrollTop > 0){
        navBar.classList.add('rolar')
    }
    else{
        navBar.classList.remove('rolar')
    }
})

function alternarImagem() {
  
    var imagem = document.getElementById("minhaImagem");

    if (imagem.style.display === "none") {
        imagem.style.display = "block";  
    } else {
        imagem.style.display = "none";   
    }
}


 function abrirImagem() {
        document.getElementById("overlay").style.display = "flex";
        }

function fecharImagem() {
        document.getElementById("overlay").style.display = "none"; 
        }