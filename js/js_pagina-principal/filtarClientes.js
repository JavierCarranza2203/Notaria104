const inputText = document.getElementById('txtNombre');
const lista = document.getElementById('lista');
let li = "";

inputText.addEventListener('input', function() {
  const searchText = inputText.value;
  if (searchText.length > 0) {
    lista.style.display = 'block'
  while (lista.firstChild) {
    lista.removeChild(lista.firstChild);
  }
  // Realizar una solicitud AJAX al servidor
  const xhr = new XMLHttpRequest();
  xhr.open('GET', `../../php/php_pagina-principal/auto-completar.php?query=${searchText}`, true);
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      const response = JSON.parse(xhr.responseText);
      response.forEach(objeto => {
        let nombre = objeto.nombre;
        const liElement = document.createElement('li');
        liElement.textContent = nombre;
        lista.appendChild(liElement);
      });
    }
  };
  xhr.send();} else{
    lista.style.display = 'none'
  }
});
