try{
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
    let btnPresionado = btnActas;

    //Contenedores de la sección "new document"
    const contenedorContratos = document.getElementById("contenedorContratos");
    const contenedorEscritos = document.getElementById("contenedorEscritos");
    const contenedorProtocolizaciones = document.getElementById("contenedorProtocolizaciones");
    const contenedorActas = document.getElementById("contenedorActas");
    const contenedorDonaciones = document.getElementById("contenedorDonaciones");
    const contenedorOtros = document.getElementById("contenedorOtros");
    let contenedorMostrado = contenedorActas;

    /*    ***********************************************************
    *    **    FIN DE LA DECLARACIÓN DE CONSTANTES Y VARIABLES    **
    *    ***********************************************************
    */
    /*    ****************************************************************
    *    **    FUNCIONAMIENTO DEL MENU DE LA SECCIÓN "NEW DOCUMENT"    **
    *    ****************************************************************
    */
    function MostrarContenedores(container, button){
        contenedorMostrado.classList.add("new-document__wrapper--hidden");
        container.classList.remove("new-document__wrapper--hidden");
        btnPresionado.classList.remove("section__li--active");
        button.classList.add("section__li--active");
        btnPresionado = button;
        contenedorMostrado = container;
    }

    btnActas.addEventListener("click", ()=>{
        MostrarContenedores(contenedorActas, btnActas);
    });

    btnContratos.addEventListener("click", ()=>{
        MostrarContenedores(contenedorContratos, btnContratos);
    });

    btnEscritos.addEventListener("click", ()=>{
        MostrarContenedores(contenedorEscritos, btnEscritos);
    });

    btnDonaciones.addEventListener("click", ()=>{
        MostrarContenedores(contenedorDonaciones, btnDonaciones);
    });

    btnProtocolizaciones.addEventListener("click", ()=>{
        MostrarContenedores(contenedorProtocolizaciones, btnProtocolizaciones);
    });

    btnOtros.addEventListener("click", ()=>{
        MostrarContenedores(contenedorOtros, btnOtros);
    });
/*    ************************************************************************
 *    **    FIN DEL FUNCIONAMIENTO DEL MENU DE LA SECCIÓN "NEW DOCUMENT"    **
 *    ************************************************************************
 */
}
catch(exception){
    alert(exception);
}