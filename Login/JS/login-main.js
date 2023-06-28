document.getElementById("btnAyuda").addEventListener("click", function(){
    document.getElementById("help-container").classList.add("mostrar");
});

document.getElementById("help-container__close-btn").addEventListener("click", function(){
    document.getElementById("help-container").classList.remove("mostrar");
});