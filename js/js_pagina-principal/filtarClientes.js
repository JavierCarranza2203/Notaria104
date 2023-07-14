const inputText = document.getElementById('txtNombre');
const lista = document.getElementById('lista');

inputText.addEventListener('input', function() {
  const searchText = inputText.value;

if (searchText.length > 0) {
    lista.style.display = 'block'

    while (lista.firstChild) {
        lista.removeChild(lista.firstChild);
    }

    const xhr = new XMLHttpRequest();
    xhr.open('GET', `../../php/php_pagina-principal/auto-completar.php?query=${searchText}`, true);

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
        const response = JSON.parse(xhr.responseText);

        let i = 0;

        response.forEach(objeto => {
            if(i > 10){
                return;
            }
 
            let nombre = objeto.nombre + " " + objeto.apellido_paterno + " " + objeto.apellido_materno;
            let id = objeto.id;
            const liElement = document.createElement('li');
            liElement.textContent = nombre;

            liElement.addEventListener("click", ()=>{
                inputText.value = nombre;

                lista.style.display = 'none';
                document.getElementById("txtId").value = id;
            });

            lista.appendChild(liElement);
            i++
        });
        }
    };
    xhr.send();
    } 
    else{
        lista.style.display = 'none'
    }
});

inputText.addEventListener("blur", ()=>{
    setTimeout(()=>{
        lista.style.display = 'none';
    }, 1000);
});

/* fileValue.addEventListener("click", ()=>{
        let pdfFile = fileUpload.files[0]
        let pdfURL = URL.createObjectURL(pdfFile)
        
        pdfViewer.setAttribute("src", pdfURL)
        setTimeout(()=>{
            popupContainer.classList.remove("hide-popup")
        }, 500)
}) */