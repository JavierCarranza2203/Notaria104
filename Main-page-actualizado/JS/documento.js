// Obtiene todos los elementos del tipo input con dicha clase
const arrFileUpload = document.querySelectorAll('.fileUpload')
const popupContainer = document.getElementById('popupContainer')
const modal = document.getElementById('modal');
const pdfViewer = document.getElementById('pdfViewer')
const btnClosePopup = document.getElementById('btnCloseModal');


btnClosePopup.addEventListener('click', ()=>{
    popupContainer.classList.add("hide-popup");
});

// Para cada uno de los inputs realiza la siguiente rutina
arrFileUpload.forEach(fileUpload => {
    // Se obtienen los elementos anterior y posterior a la etiqueta del tipo input,
    // que, por la estructura del HTML, son un span y un label, respectivamente
    let fileValue = fileUpload.previousElementSibling 
    let label = fileUpload.nextElementSibling
    // Establece el valor predeterminado de la etiqueta
    let labelValue = 'No se ha seleccionado ningún archivo'
    // Cada que se seleccione un nuevo archivo:
    fileUpload.addEventListener('change', (e) => {
        let fileName = ''
        // En caso de que se seleccione mas de uno:
        if (this.files && this.files.length > 1) {
            fileName = ( this.getAttribute('data-multiple-caption') || '').replace( '{count}', this.files.length )
        }
        // Recorta la ruta obtenida, dejando solo el nombre del archivo
        else {
            fileName = e.target.value.split('\\').pop()
        }
        // De obtenerse un archivo, se agrega el nombre a la etiqueta
        if (fileName) {
            fileValue.innerHTML = fileName
            fileValue.classList.add('valid')
        }
        // Si no se obtiene un archivo, restablece la etiqueta a su estado inicial
        else {
            fileValue.innerHTML = labelValue
            fileValue.classList.remove('valid')
        }
    })

    fileValue.addEventListener("click", ()=>{
        let pdfFile = fileUpload.files[0]
        let pdfURL = URL.createObjectURL(pdfFile)
        
        pdfViewer.setAttribute("src", pdfURL)
        setTimeout(()=>{
            popupContainer.classList.remove("hide-popup")
        }, 500)
    })
})

/*  Al hacer clic en el boton para cancelar 
el formulario, no se restablecen las etiquetas 
que ya se habian modificado.
*/
// El siguiente codigo restablece las etiquetas a su estado inicial
document.getElementById('cancelar').addEventListener('click', () => {
    arrFileUpload.forEach(fileUpload => {
        let fileValue = fileUpload.previousElementSibling
        fileValue.innerHTML = 'No se ha seleccionado ningún archivo'
        fileValue.classList.remove('valid')
    })
})