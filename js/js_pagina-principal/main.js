/*    ************************************************
 *    **    DECLARACIÓN DE CONSTANTES Y VARIABLES   **
 *    ************************************************
 */

//Botones del menu de "new document"
const btnActas = document.getElementById("btnActas");
const btnEscritos = document.getElementById("btnEscritos");
const btnContratos = document.getElementById("btnContratos");
const btnDonaciones = document.getElementById("btnDonaciones");
const btnProtocolizaciones = document.getElementById("btnProtocolizaciones");
const btnOtros = document.getElementById("btnOtros");

//Contenedores de la sección "new document"
const todosLosContenedores = document.getElementsByClassName("new-document__wrapper");
const contenedorContratos = document.getElementById("contenedorContratos");
const contenedorEscritos = document.getElementById("contenedorEscritos");
const contenedorProtocolizaciones = document.getElementById("contenedorProtocolizaciones");
const contenedorActas = document.getElementById("contenedorActas");
const contenedorDonaciones = document.getElementById("contenedorDonaciones");

/*    ***********************************************************
 *    **    FIN DE LA DECLARACIÓN DE CONSTANTES Y VARIABLES    **
 *    ***********************************************************
 */
/*    ****************************************************************
 *    **    FUNCIONAMIENTO DEL MENU DE LA SECCIÓN "NEW DOCUMENT"    **
 *    ****************************************************************
 */

function OcultarContenedores(){
    todosLosContenedores.forEach(contenedor => ()=>{
        this.classList.add("new-document__wrapper--hidden");
    });
}

OcultarContenedores();
/*    ************************************************************************
 *    **    FIN DEL FUNCIONAMIENTO DEL MENU DE LA SECCIÓN "NEW DOCUMENT"    **
 *    ************************************************************************
 */