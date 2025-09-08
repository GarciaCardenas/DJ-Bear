<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<link href="../Styles/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../Styles/global.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
    <title>Administración</title>
    <style>
        body {
            background-color: black;
            background-repeat: no-repeat;
            background-size: cover;
            height: 100vh;
            background-position: center;
            color: white;
        }
		h1{
		display: flex;
		justify-content: center;
		}
        .nav-bar{
            background-color: rgba(0, 0, 0, 0.7);
            box-shadow: 0 0 40px rgba(255, 255, 255, 0.7),
                        -15rem 0rem 30px rgb(138, 36, 255),
                        20rem 0rem 30px rgb(0, 174, 255)
                        ;
            font-family: var(--bs-body-font-family);
        }
        table {
            color: white;
            border-collapse: collapse;
            width: 100%;
        }

        th,td {
            border: 3px solid white;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #212529;
        }
    </style>
</head>

<body>
    
<!--Navbar-->
    <header >
        <nav class="navbar fixed-top navbar-bg  nav-masthead navbar-expand-lg navbar-dark p-md-3">
          <div class="container">
              <a href="#" class="navbar-brand">DJ BEAR</a>
              <button
                  class="navbar-toggler"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#navbarNav"
                  aria-controls="navbarNav"
                  aria-expanded="false"
                  aria-label="Toggle navigation"
              >
              <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarNav">
                  <div class="mx-auto"></div>
                  <ul class="navbar-nav">
                      <li class="nav-item">
                          <a class="nav-link fw-bold" aria-current="page" href="../index.html">Home</a>
                      </li>
                      <li  class="nav-item">
                          <a class="nav-link fw-bold" href="../form.html">Contratación</a>
                      </li>
                      <li  class="nav-item">
                          <a class="nav-link fw-bold" href="../comprobante.html">Comprobante</a>
                      </li>
                      <li  class="nav-item">
                          <a class="nav-link fw-bold" href="../admin_login.html">Admin</a>
                      </li>

                  </ul>
              </div>
          </div>
          </nav>
    </header>
    <div class="container justify-content-center content-align-center flex" id="maintable" style="padding-top: 4rem; height: 85vh;">
        <h1 style="padding-top: 3rem; padding-bottom: 1rem;">Reservaciones</h1>
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-primary mb-2" id="agregarClienteBtn">Agregar cliente</button>
                <br>
                <table class="table text-white">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Fecha</th>
                            <th>Evento</th>
                            <th>RFC</th>
                            <th>Salon</th>
                            <th>Menu</th>
                            <th>Personas</th>
                            <th>Hora</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Aquí se mostrarán los datos de la tabla -->
                        <tr>
                            <td>1</td>
                            <td>Cliente 1</td>
                            <td>2023-05-29</td>
                            <td>Cumpleaños</td>
                            <td>ABC123456789</td>
                            <td>Salon emperadores</td>
                            <td>Adulto</td>
                            <td>200</td>
                            <td>12:00</td>
                            <td>
                                <!-- Acciones CRUD -->
                                <button class="btn btn-sm btn-info">Editar</button>
                                <button class="btn btn-sm btn-danger">Eliminar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Cliente 2</td>
                            <td>2023-05-29</td>
                            <td>Cumpleaños</td>
                            <td>ABC123456789</td>
                            <td>Salon emperadores</td>
                            <td>Adulto</td>
                            <td>200</td>
                            <td>12:00</td>
                            <td>
                                <!-- Acciones CRUD -->
                                <button class="btn btn-sm btn-info">Editar</button>
                                <button class="btn btn-sm btn-danger">Eliminar</button>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div id="Oculto" style="display: none;" >
        <span class="d-flex align-items-center justify-content-center w-100">

            <form action="procesaDatos.php" method="post" class="animated-element" onsubmit="return validarRFC() && validarEdad() && validarNombre() && validarTelefono() && validarPersonas() && validarCalle() && validarNumero() && validarColonia() && validarPostal() && validarFecha() && checkSelection('menu') && checkSelection('salon') && checkSelection('alcaldia') && checkSelection('entidad')">
                <fieldset>
                  <legend>Agrega al nuevo cliente</legend>
                  <div class="row">
                    <div class="col-12">
                      <label for="nombre">Nombre:</label>
                      <input type="text" id="nombre" name="nombre" class="animated-element" placeholder="Enrique" onchange="validarNombre()" required><br>
                    </div>
                  </div>
          
                  <div class="row">
                    <div class="col-12">
                      <label for="paterno">Apellido Paterno:</label>
                      <input type="text" id="paterno" name="paterno" class="animated-element" placeholder="Díaz" onchange="validarNombre()" required><br>
                    </div>
                  </div>
          
                  <div class="row">
                    <div class="col-12">
                      <label for="materno">Apellido Materno:</label>
                      <input type="text" id="materno" name="materno" class="animated-element" placeholder="Ortiz" onchange="validarNombre()" required><br>
                    </div>
                  </div>
          
                  <div class="row">
                    <div class="col-12">
                      <label for="telefono">Teléfono:</label>
                      <input type="tel" id="telefono" name="telefono" class="animated-element" placeholder="5544332211" onchange="validarTelefono()" required><br>
                    </div>
                  </div>
          
                  <div class="row">
                    <div class="col-12">
                      <label for="correo">Correo Electrónico:</label>
                      <input type="email" id="correo" name="correo" class="animated-element" placeholder="you@example.com" required><br>
                    </div>
                  </div>
          
                  <div class="row">
                    <div class="col-12">
                      <label for="calle">Calle:</label>
                      <input type="text" id="calle" name="calle" class="animated-element" placeholder="Nombre de la calle" onchange="validarCalle()" required><br>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-12">
                      <label for="numero">Número:</label>
                      <input type="number" id="numero" name="numero" class="animated-element" placeholder="Número de la casa" onchange="validarNumero()" required><br>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-12">
                      <label for="colonia">Colonia:</label>
                      <input type="text" id="colonia" name="colonia" class="animated-element" placeholder="Nombre de la colonia" onchange="validarColonia()" required><br>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-12">
                      <label for="codigoPostal">Código Postal:</label>
                      <input type="number" id="codigoPostal" name="codigoPostal" class="animated-element" placeholder="Código postal" onchange="validarPostal()" required><br>
                    </div>
                  </div>        
          
                  <div class="row">
                    <div class="col-12">
                      <label for="entidad">Entidad Federativa:</label>
                      <select id="entidad" name="entidad" onchange="cargarMunicipios()" required>
                        <option value="Seleccionar">Seleccionar</option>
                        <option value="Aguascalientes">Aguascalientes</option>
                        <option value="Baja California">Baja California</option>
                        <option value="Baja California Sur">Baja California Sur</option>
                        <option value="Campeche">Campeche</option>
                        <option value="Coahuila">Coahuila</option>
                        <option value="Colima">Colima</option>
                        <option value="Chiapas">Chiapas</option>
                        <option value="Chihuahua">Chihuahua</option>
                        <option value="Ciudad de México">Ciudad de México</option>
                        <option value="Durango">Durango</option>
                        <option value="Guanajuato">Guanajuato</option>
                        <option value="Guerrero">Guerrero</option>
                        <option value="Hidalgo">Hidalgo</option>
                        <option value="Jalisco">Jalisco</option>
                        <option value="México">México</option>
                        <option value="Michoacán">Michoacán</option>
                        <option value="Morelos">Morelos</option>
                        <option value="Nayarit">Nayarit</option>
                        <option value="Nuevo León">Nuevo León</option>
                        <option value="Oaxaca">Oaxaca</option>
                        <option value="Puebla">Puebla</option>
                        <option value="Querétaro">Querétaro</option>
                        <option value="Quintana Roo">Quintana Roo</option>
                        <option value="San Luis Potosí">San Luis Potosí</option>
                        <option value="Sinaloa">Sinaloa</option>
                        <option value="Sonora">Sonora</option>
                        <option value="Tabasco">Tabasco</option>
                        <option value="Tamaulipas">Tamaulipas</option>
                        <option value="Tlaxcala">Tlaxcala</option>
                        <option value="Veracruz">Veracruz</option>
                        <option value="Yucatán">Yucatán</option>
                        <option value="Zacatecas">Zacatecas</option>
                      </select><br>
                    </div>
                  </div>
          
                  <div class="row">
                    <div class="col-12">
                      <label for="municipio">Alcaldía/Municipio:</label>
                      <select id="municipio" name="municipio" required>
                        <option value="Seleccionar">Selecciona una opción</option>
                      </select><br>
                    </div>
                  </div>
          
                  <div class="row">
                    <div class="col-12">
                      <label for="fechaNacimiento">Fecha de Nacimiento:</label>
                      <input type="date" id="fechaNacimiento" name="fechaNacimiento" class="animated-element" onchange="validarEdad()" required><br>
                    </div>
                  </div>
          
                  <div class="row">
                    <div class="col-12">
                      <label for="rfc">RFC:</label>
                      <input type="text" id="rfc" name="rfc" class="animated-element" onchange="validarRFC()" placeholder="PPMN00112222HHH" required><br>
                    </div>
                  </div>
                </fieldset>
          
                <fieldset>
                  <legend>Información del Evento</legend>
                  <div class="row">
                    <div class="col-12">
                      <label for="tipo">Tipo de Evento:</label>
                      <select id="tipo" name="tipo" onchange="mostrarCampoEvento() && activarCampoOtro()" required>
                        <option value="Seleccionar">Seleccionar</option>
                        <option value="Bautizo">Bautizo</option>
                        <option value="Primera comunión">Primera comunión</option>
                        <option value="XV años">XV años</option>
                        <option value="Boda">Boda</option>
                        <option value="Cumpleaños">Cumpleaños</option>
                        <option value="Otro">Otro</option>
                      </select><br>
                    </div>
                  </div>
          
                  <div class="row" id="campoEvento" style="display: none;">
                    <div class="col-12">
                      <label for="evento">Evento (A continuación escriba el tipo de evento que desea realizar): </label>
                      <input type="text" id="evento" name="evento" class="animated-element" placeholder="Ej. Aniversario"><br>
                    </div>
                  </div>
          
                  <div class="row">
                    <div class="col-12">
                      <label for="salon">Elija el salón de su preferencia:</label>
                      <select id="salon" name="salon" onchange="checkSelection('salon')" required>
                        <option value="Seleccionar">Seleccionar</option>
                        <option value="Salón Emperador">Salón Emperador</option>
                        <option value="Salón La Cúspide">Salón La Cúspide</option>
                        <option value="Salón Las Golondrinas">Jardín Las Golondrinas</option>
                      </select><br>
                    </div>
                  </div>
          
                  <div class="row">
                    <div class="col-12">
                      <label for="menu">Elija el menú de su preferencia:</label>
                      <select id="menu" name="menu" onchange="checkSelection('menu')" required>
                        <option value="Seleccionar">Seleccionar</option>
                        <option value="Menú para niños">Menú para niños</option>
                        <option value="Menú para adultos">Menú para adultos</option>
                      </select><br>
                    </div>
                  </div>
          
                  <div class="row">
                    <div class="col-12">
                      <label for="numPersonas">Número de Personas:</label>
                      <input type="number" id="numPersonas" name="numPersonas" min="75" max="200" class="animated-element" placeholder="99" onchange="validarPersonas()" required><br>
                    </div>
                  </div>
          
                  <div class="row">
                    <div class="col-12">
                      <label for="fechaEvento">Fecha del evento:</label>
                      <input type="date" id="fechaEvento" name="fechaEvento" min="2023-05-30" class="fecha-especial" onchange="validarFecha() && cargarHorario()" required><br>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-12">
                      <label for="horaEvento">Horario del evento:</label>
                      <select id="horaEvento" name="horaEvento" required>
                        <option value="Seleccionar">Selecciona una opción</option>
                      </select><br>
                    </div>
                  </div>      
                  <br><br>
                </fieldset>
          
                    <button type="submit" class="btn btn-outline-light" id="registrar" style="font-weight: bold;">Registrar</button>
                    <button type="reset" class="btn btn-outline-warning" id="limpiar" style="font-weight: bold;">Limpiar</button>
              </form>

            <br><br>
        </span>
    </div>
    <!-- FOOTER -->
<footer class="text-white pt-5 pb-4 ">
    <div class="container text-center text-md-start">
        <div class="row text-center text-md-start">
            <div class="text-center mb-2">
                <p>
					Copyright Todos los derechos reservados.
					<br>
					<?php
					session_start();
					echo "Sesion actual: ";
					echo $_SESSION["user"];
					?>
                </p>
            </div>
        </div>
    </div>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById("agregarClienteBtn").addEventListener("click", function () {
            var ocultoDiv = document.getElementById("Oculto");
            if (ocultoDiv.style.display === "none") {
				ocultoDiv.style.display = "block";
				maintable.style.height = "45vh";
            } else {
				ocultoDiv.style.display = "none";
				maintable.style.height = "85vh";
            }
        });
    </script>
<script src="../Scripts/global.js"></script>  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>



</body>

</html>

