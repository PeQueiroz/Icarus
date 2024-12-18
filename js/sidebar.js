var btnExp = document.querySelector('#btn-exp')
var menuSide = document.querySelector('#sidebar')
var perfil = document.querySelector('#perfil')

btnExp.addEventListener('click', function(){
    perfil.classList.toggle('hidden')
    menuSide.classList.toggle('expandir')
})