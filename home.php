<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="./pagePis/img/UNL3.ico" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
      integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <title>Brazo Robótico</title>
    <link rel="stylesheet" href="./pagePis/web/style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body>
    <button id="toggleMode" class="toggle-mode">
      <i class="fas fa-moon"></i>
    </button>

    <div id="accessibility-menu">
      <button id="accessibility-toggle">
        <i class="fas fa-universal-access"></i>
      </button>
      <div class="accessibility-options">
        <button id="increase-font">Zoom +</button>
        <button id="decrease-font">Zoom -</button>
        <button id="toggle-contrast">Contraste</button>
        <button id="toggle-grayscale">Escala de grises</button>
        <button id="highlight-links">Resaltar enlaces</button>
        <button id="read-page">Leer página</button>
      </div>
    </div>

    <!-- MENU ENCABEZADO -->
    <div class="contenedor-header">
      <header>
          <div class="logo">
              <a href="#">Brazo Robótico</a>
          </div>
          <nav id="nav">
              <ul>
                  <li><a href="#inicio" onclick="seleccionar()">INICIO</a></li>
                  <li><a href="#sobremi" onclick="seleccionar()">SOBRE NOSOTROS</a></li>
                  <li><a href="#curriculum" onclick="seleccionar()">HISTORIAL DE USUARIO</a></li>
                  <li><a href="#portfolio" onclick="seleccionar()">MATERIALES</a></li>
                  <li><a href="#requerimientos" onclick="seleccionar()">REQUERIMIENTOS</a></li>
              </ul>
          </nav>
          <div class="nav-responsive" onclick="mostrarOcultarMenu()">
              <i class="fa-solid fa-bars"></i>
          </div>
      </header>
  </div>

    <script>
      function mostrarOcultarMenu() {
        var nav = document.getElementById("nav");
        nav.classList.toggle("mostrar");
      }
      function seleccionar() {
        var nav = document.getElementById("nav");
        nav.classList.remove("mostrar");
      }

      document
        .querySelector(".nav-responsive")
        .addEventListener("click", function () {
          document
            .querySelector(".contenedor-header header nav ul")
            .classList.toggle("show");
        });
    </script>


    <!-- SECCION INICIO -->
    <section id="inicio" class="inicio">
      <div class="contenido-banner">
        <div>
          <div class="contenedor-img">
            <img src="./pagePis/img/brazopri.jpg" alt="brazo" />
          </div>
          <div>
            <h1>Proyecto Integrador de Saberes</h1>
            <h2>PIS</h2>
          </div>
        </div>
      </div>
    </section>

    <!-- SECCION SOBRE MI -->
    <section id="sobremi" class="sobremi">
      <div class="contenido-seccion">
        <h2>Sobre Nosotros</h2>
        <h3>
          <span>Hola, somos el grupo 8</span> y vamos a presentar el proyecto
          Integrador de Saberes (PIS)
        </h3>
        <div class="fila">
          <div class="col">
            <h3>INTEGRANTES</h3>
            <ul>
              <li><strong>- Jose Francisco Riofrio Maldonado</strong></li>
              <li><strong>- Jorge Luis Luzuriaga Betancourt</strong></li>
              <li><strong>- Ariel Ismael Gonzales Astudillo</strong></li>
              <li><strong>- Ivan Alexander Fernandez Cañar</strong></li>
              <li><strong>- Richard Vicente Cajas</strong></li>
              <li><strong>Rol</strong> <span>Estudiantes</span></li>
            </ul>
          </div>
        </div>
        <a href="./pagePis/web/Evaluacion3 - Grupo7.pdf" download="InformePis2-Grupo7.pdf">
          <button>
            Descargar Informe <i class="fa-solid fa-download"></i>
          </button>
        </a>
      </div>
    </section>

    <!-- SECCION CURRICULUM -->
    <section id="curriculum" class="curriculum">
      <div class="contenido-seccion">
        <h2>HISTORIAL DE USUARIO</h2>
        <div class="fila">
          <div class="col izquierda">
            <h3>ROL</h3>
            <div class="item izq">
              <span class="fecha">Supervisor de Gestión de Residuos</span>
              <p>
                Se encarga de supervisar la clasificación de residuos
                reciclables como no reciclables para aumentar la eficiencia de
                la recolección y reducir la contaminación.
              </p>
              <div class="conectori"><div class="circuloi"></div></div>
            </div>
            <h3>BENEFICIO</h3>
            <div class="item izq">
              <span class="fecha">Nuestro Brazo Robótico Busca</span>
              <p>
                Mejorar la tasa de reciclaje y reducir la contaminación del
                medio ambiente.
              </p>
              <div class="conectori"><div class="circuloi"></div></div>
            </div>
          </div>
          <div class="col derecha">
            <h3>ACCION</h3>
            <div class="item der">
              <span class="fecha">Implementación del Brazo Robótico para</span>
              <p>La clasificación de residuos a nuestros alrededores.</p>
              <div class="conectord"><div class="circulod"></div></div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- SECCION PORTFOLIO -->
    <section id="portfolio" class="portfolio">
      <div class="contenido-seccion">
        <h2>MATERIALES</h2>
        <div class="galeria">
          <div class="proyecto">
            <img src="./pagePis/img/arduino.png" alt="Proyecto 1" />
            <div class="overlay">
              <h3>Arduino</h3>
            </div>
          </div>
          <div class="proyecto">
            <img src="./pagePis/img/modulo.jpeg" alt="Proyecto 2" />
            <div class="overlay">
              <h3>Módulo Bluetooth</h3>
            </div>
          </div>
          <div class="proyecto">
            <img src="./pagePis/img/servos.jpeg" alt="Proyecto 3" />
            <div class="overlay">
              <h3>Servomotores</h3>
            </div>
          </div>
          <div class="proyecto">
            <img src="./pagePis/img/sensor.jpeg" alt="Proyecto 4" />
            <div class="overlay">
              <h3>Sensores</h3>
            </div>
          </div>
          <div class="proyecto">
            <img src="./pagePis/img/filamento.jpeg" alt="Proyecto 5" />
            <div class="overlay">
              <h3>Filamento para impresión 3D</h3>
            </div>
          </div>
          <div class="proyecto">
            <img src="./pagePis/img/jumpers.jpg" alt="Proyecto 6" />
            <div class="overlay">
              <h3>Jumpers para conexiones</h3>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- SECCION REQUERIMIENTOS POR MATERIA -->
    <section id="requerimientos" class="requerimientos">
      <div class="contenido-seccion">
        <h2>Requerimientos del sistema por materias</h2>
        <p>
          El siguiente proyecto Integrador de Saberes (PIS) en el cual estamos
          implementando los conocimientos de todas las materias del 2do Ciclo de
          la carrera de computación nos va a permitir realizar lo siguiente de
          acuerdo a cada materia.
        </p>
        <ol>
          <li>
            <h3>1. Análisis Matemático</h3>
            <p>
              Aplicar las fórmulas necesarias para controlar el posicionamiento
              y corrección de las partes del brazo.
            </p>
            <p>
              Aplicar funciones logarítmicas para controlar la velocidad del
              brazo robótico a medida que se acerca al objetivo para que permita
              realizar movimientos suaves y precisos:
            </p>
            <pre>FORMULA: V = Vmax⋅ln(d max/d + 1)</pre>
          </li>
          <li>
            <h3>2. Emprendimiento e Innovación Tecnológica</h3>
            <p>
              Generar un plan de negocios el cual nos permite tener un buen
              marketing y financiamiento para controlar los costos y gastos que
              se obtuvieron al momento de desarrollar el brazo e implementar lo
              necesario para intentar obtener ingresos con el mismo.
            </p>
            <p>
              Intentar innovar el brazo para buscar nuevas funcionalidades las
              cuales llamen la atención de los usuarios.
            </p>
          </li>
          <li>
            <h3>3. Teoría de la Distribución y Probabilidad</h3>
            <p>
              Aplicar los cálculos para tener un promedio de porcentajes de las
              funcionalidades del brazo, como obtener un promedio de peso que se
              ha cargado.
            </p>
            <p>
              Aplicar cálculos los cuales nos permiten conocer la probabilidad
              de que el brazo pueda o no agarrar algún objeto, dependiendo el
              tamaño y el peso.
            </p>
          </li>
          <li>
            <h3>4. Programación Orientada a Objetos</h3>
            <p>
              Implementar los temas adquiridos en POO, mediante una aplicación
              web la cual nos permitirá el manejo de un brazo robótico, donde
              coordinaremos de manera eficiente la conexión entre software y
              hardware.
            </p>
            <p>
              Mediante principios y conceptos de POO, daremos al usuario una
              mejor experiencia en el manejo del brazo robótico.
            </p>
          </li>
          <li>
            <h3>5. Diseño de circuitos</h3>
            <p>
              Implementar circuitos que controlan los sensores, servomotores y
              demás componentes, para el manejo del brazo robótico.
            </p>
            <p>
              Aplicar conceptos de la materia para el uso eficiente de
              componentes, los cuales deben ser acoplados eficientemente para
              evitar daños a los materiales y con esto evitar daños en nuestro
              brazo robótico.
            </p>
          </li>
        </ol>
      </div>
    </section>

    <!-- SECCION MAPA -->

    <div class="map-section">
      <div class="contenido-seccion">
        <h2>Localización</h2>
        <p>Tu ubicacion actual.</p>
        <div id="map-container">
          <div id="map"></div>
        </div>
      </div>
    </div>
    <script src="./pagePis/web/script.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKj9P-J7qZTfbYoRef4l4UbzUZA-k9iFo&callback=iniciarMap"></script>

    <!-- SECCION CONTROLES -->

    <div class="contenedor-boton">
      <a
        href="./pagePis/controles/principal.html"
        id="ir-controles"
        class="boton-controles"
        >Ir a los controles</a
      >
    </div>

    <!-- footer -->
    <footer>
      <div class="footer">

        <a href="php/logout.php"> 
        <i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesion
        </a>

        <a href="https://github.com/IvanFernandez02/CodigoBackendPis"target="_blank">
          <i class="fab fa-github"></i> Repositorio de Github / Código Backend
        </a>

      </div>
      <a href="#inicio" class="arriba"><i class="fas fa-arrow-up"></i></a>
      <p>&copy; 2024 Grupo 8. Todos los derechos reservados.</p>
    </footer>
  </body>
</html>
