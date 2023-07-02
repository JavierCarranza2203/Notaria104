window.addEventListener("load", function()
{
    document.getElementById("Actas").classList.add("active");
    document.getElementById("Contenedor-Actas").classList.add("show-container");
    
    document.getElementById("my-documents-container").classList.add("hide-menu-container");


    CambiarMenu();
    FiltrarElementos();document.getElementById("Actas").classList.add("active");
    document.getElementById("Contenedor-Actas").classList.add("show-container");

    FiltrarElementos();
})


function CambiarMenu()
{
    const content = document.getElementById("menu-container");
    content.addEventListener("click", (e) =>
    {
        if(e.target && e.target.classList.contains("menu-container__button"))
        {
            var idbtn = document.getElementById(e.target.id).id;

            document.getElementById("my-documents").classList.remove("active");
            document.getElementById("new-document").classList.remove("active");

            document.getElementById(e.target.id).classList.add("active");

            document.getElementById("my-documents-container").classList.add("hide-menu-container");
            document.getElementById("new-document-container").classList.add("hide-menu-container");

            document.getElementById(idbtn+"-container").classList.remove("hide-menu-container");
        }
    });
}

function FiltrarElementos()
{
    const content = document.getElementById("new-document-container");
    content.addEventListener("click", (e) =>
    {
        if(e.target && e.target.classList.contains("new-document-container__filter-list-item")){
            var idbtn = document.getElementById(e.target.id).id;
            
            document.getElementById("Contenedor-Contratos").classList.remove("show-container");
            document.getElementById("Contenedor-Actas").classList.remove("show-container");
            document.getElementById("Contenedor-Cartas").classList.remove("show-container");
            document.getElementById("Contenedor-Donaciones").classList.remove("show-container");
            document.getElementById("Contenedor-Protocolizaciones").classList.remove("show-container");
            document.getElementById("Contenedor-Otros").classList.remove("show-container");

            document.getElementById("Contenedor-"+idbtn).classList.add("show-container");


            document.getElementById("Contratos").classList.remove("active");
            document.getElementById("Actas").classList.remove("active");
            document.getElementById("Cartas").classList.remove("active");
            document.getElementById("Donaciones").classList.remove("active");
            document.getElementById("Protocolizaciones").classList.remove("active");
            document.getElementById("Otros").classList.remove("active");

            document.getElementById(e.target.id).classList.add("active");
        }
    })
}

// Efectos para inputs en formulario cliente
const arrLabels = document.querySelectorAll('.client-form-container__row__group__controls__control label')
arrLabels.forEach((label) => {
    label.innerHTML = label.innerText.split("").map((letter, index) => `<span style="transition-delay: ${index * 35}ms">${letter}</span>`).join("")
})