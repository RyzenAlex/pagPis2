document.addEventListener("DOMContentLoaded", () => {
    const video = document.getElementById("video");
    const connectButton = document.getElementById("connectButton");
    const disconnectButton = document.getElementById("disconnectButton");
    const baseSlider = document.getElementById("baseSlider");
    const antebrazoSlider = document.getElementById("antebrazoSlider");
    const brazoSlider = document.getElementById("brazoSlider");
    const pinzaSlider = document.getElementById("pinzaSlider");

    const apiUrl = "https://mocki.io/v1/2f1131be-5960-4f3a-be47-0730a72630b1";

    async function fetchData() {
        try {
            const response = await fetch(apiUrl);
            const data = await response.json();
            populateTable(data);
            createChart(data);
        } catch (error) {
            console.error("Error al obtener los datos de la API:", error);
        }
    }

    function populateTable(data) {
        const tbody = document.getElementById('data-table').querySelector('tbody');
        tbody.innerHTML = ''; // Limpiar tabla antes de llenarla
        data.forEach(item => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${item.fecha}</td>
                <td>${item.cantidad}</td>
                <td>${item.peso}</td>
            `;
            tbody.appendChild(row);
        });
    }

    function createChart(data) {
        const labels = data.map(item => item.fecha);
        const cantidadData = data.map(item => item.cantidad);
        const pesoData = data.map(item => item.peso);

        const ctx = document.getElementById('data-chart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Cantidad',
                        data: cantidadData,
                        borderColor: 'blue',
                        fill: false
                    },
                    {
                        label: 'Peso (kg)',
                        data: pesoData,
                        borderColor: 'green',
                        fill: false
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Fecha'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Cantidad/Peso'
                        }
                    }
                }
            }
        });
    }

    // Llamar a fetchData para obtener y mostrar los datos
    fetchData();

    // Resto del código para controlar el brazo robótico y accesibilidad...

    let device;
        let characteristic;

        document.getElementById('connect').addEventListener('click', async () => {
            try {
                device = await navigator.bluetooth.requestDevice({
                    acceptAllDevices: true,
                    optionalServices: ['0000ffe0-0000-1000-8000-00805f9b34fb']
                });
                const server = await device.gatt.connect();
                const service = await server.getPrimaryService('0000ffe0-0000-1000-8000-00805f9b34fb');
                characteristic = await service.getCharacteristic('0000ffe1-0000-1000-8000-00805f9b34fb');
                alert('Conectado a ' + device.name);
            } catch (error) {
                alert('Error al conectar: ' + error);
            }
        });

        const sliders = ['pinza', 'antebrazo', 'brazo', 'base'];

        sliders.forEach(slider => {
            const rangeInput = document.getElementById(slider);
            const valueSpan = document.getElementById(slider + '-value');
            const sendButton = document.getElementById(slider + '-send');

            rangeInput.addEventListener('input', () => {
                valueSpan.textContent = rangeInput.value;
            });

            sendButton.addEventListener('click', async () => {
                const value = rangeInput.value;
                let command;
                switch (slider) {
                    case 'pinza':
                        command = `a${value}x`;
                        break;
                    case 'antebrazo':
                        command = `b${value}x`;
                        break;
                    case 'brazo':
                        command = `c${value}x`;
                        break;
                    case 'base':
                        command = `d${value}x`;
                        break;
                }
                if (characteristic) {
                    const encoder = new TextEncoder();
                    await characteristic.writeValue(encoder.encode(command));
                    alert('Comando enviado: ' + command);
                } else {
                    alert('No conectado al dispositivo');
                }
            });
        });

        document.getElementById('Iniciar').addEventListener('click', function() {
            const video = document.getElementById('video');
            const esp32CamIp = 'http://192.168.1.14'; // Reemplaza con la IP de tu ESP32-CAM
            video.src = esp32CamIp + ':81/stream';
        });

        document.getElementById('Detener').addEventListener('click', function() {
            const video = document.getElementById('video');
            video.src = '';
        });

    const accessibilityToggle = document.getElementById("accessibility-toggle");
    const accessibilityMenu = document.getElementById("accessibility-menu");
    const increaseFontButton = document.getElementById("increase-font");
    const decreaseFontButton = document.getElementById("decrease-font");
    const toggleContrastButton = document.getElementById("toggle-contrast");
    const toggleGrayscaleButton = document.getElementById("toggle-grayscale");
    const highlightLinksButton = document.getElementById("highlight-links");
    const readPageButton = document.getElementById("read-page");

    let fontSize = 100;
    let isHighContrast = false;
    let isGrayscale = false;
    let areLinksHighlighted = false;

    increaseFontButton.addEventListener("click", () => {
        fontSize += 10;
        document.body.style.fontSize = fontSize + "%";
    });

    decreaseFontButton.addEventListener("click", () => {
        fontSize -= 10;
        document.body.style.fontSize = fontSize + "%";
    });

    toggleContrastButton.addEventListener("click", () => {
        isHighContrast = !isHighContrast;
        document.body.classList.toggle("high-contrast", isHighContrast);
    });

    toggleGrayscaleButton.addEventListener("click", () => {
        isGrayscale = !isGrayscale;
        document.body.classList.toggle("grayscale", isGrayscale);
    });

    highlightLinksButton.addEventListener("click", () => {
        areLinksHighlighted = !areLinksHighlighted;
        document.body.classList.toggle("highlight-links", areLinksHighlighted);
    });

    readPageButton.addEventListener("click", () => {
        if (window.speechSynthesis.speaking) {
            window.speechSynthesis.cancel();
        } else {
            const text = document.body.innerText;
            const utterance = new SpeechSynthesisUtterance(text);
            window.speechSynthesis.speak(utterance);
        }
    });

    const themeToggleButton = document.getElementById("theme-toggle");
    themeToggleButton.addEventListener("click", () => {
        document.body.classList.toggle("light-mode");
        const icon = themeToggleButton.querySelector("i");
        if (document.body.classList.contains("light-mode")) {
            icon.classList.remove("fa-moon");
            icon.classList.add("fa-sun");
        } else {
            icon.classList.remove("fa-sun");
            icon.classList.add("fa-moon");
        }
    });
});
