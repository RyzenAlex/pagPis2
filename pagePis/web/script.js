/*Funcion para API de Google Maps*/
function iniciarMap() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var coord = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: coord
            });

            var marker = new google.maps.Marker({
                position: coord,
                map: map,
                title: '¡Estás aquí!'
            });
        },
        function() {
            handleLocationError(true);
        });
    } else {
        handleLocationError(false);
    }
}

function handleLocationError(browserHasGeolocation) {
    var errorMessage = browserHasGeolocation ?
        'Error: Habilite la ubicacion..' :
        'Error: Habilite la ubicacion..';
    alert(errorMessage);
}

/* Funciones de accesibilidad */
function increaseFontSize() {
    document.body.style.fontSize = parseInt(getComputedStyle(document.body).fontSize) + 2 + 'px';
}

function decreaseFontSize() {
    document.body.style.fontSize = parseInt(getComputedStyle(document.body).fontSize) - 2 + 'px';
}

function toggleContrast() {
    document.body.classList.toggle('high-contrast');
}

function toggleGrayscale() {
    document.body.classList.toggle('grayscale');
}

function highlightLinks() {
    document.body.classList.toggle('highlight-links');
}

let speechSynthesis = window.speechSynthesis;
let utterance = null;

function readPage() {
    if (utterance && speechSynthesis.speaking) {
        speechSynthesis.cancel();
        utterance = null;
        document.getElementById('read-page').textContent = 'Leer página';
    } else {
        const text = document.body.innerText;
        utterance = new SpeechSynthesisUtterance(text);
        speechSynthesis.speak(utterance);
        document.getElementById('read-page').textContent = 'Detener lectura';

        utterance.onend = () => {
            utterance = null;
            document.getElementById('read-page').textContent = 'Leer página';
        };
    }
}

// Agregar event listeners para los botones de accesibilidad
document.getElementById('increase-font').addEventListener('click', increaseFontSize);
document.getElementById('decrease-font').addEventListener('click', decreaseFontSize);
document.getElementById('toggle-contrast').addEventListener('click', toggleContrast);
document.getElementById('toggle-grayscale').addEventListener('click', toggleGrayscale);
document.getElementById('highlight-links').addEventListener('click', highlightLinks);
document.getElementById('read-page').addEventListener('click', readPage);

// Mostrar/ocultar menú de accesibilidad
document.getElementById('accessibility-toggle').addEventListener('mouseover', () => {
    document.querySelector('.accessibility-options').style.display = 'flex';
});

document.getElementById('accessibility-menu').addEventListener('mouseleave', () => {
    document.querySelector('.accessibility-options').style.display = 'none';
});

// Función para cambiar entre modos claro y oscuro
function toggleMode() {
    const body = document.body;
    const button = document.getElementById('toggleMode');
    const icon = button.querySelector('i');

    body.classList.toggle('light-mode');

    if (body.classList.contains('light-mode')) {
        icon.classList.remove('fa-moon');
        icon.classList.add('fa-sun');
    } else {
        icon.classList.remove('fa-sun');
        icon.classList.add('fa-moon');
    }
}

document.getElementById('toggleMode').addEventListener('click', toggleMode);

//barra responsiva
function mostrarOcultarMenu() {
    var nav = document.getElementById("nav");
    nav.classList.toggle("responsive");
}

function seleccionar() {
    var nav = document.getElementById("nav");
    nav.classList.remove("responsive");
}