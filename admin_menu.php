<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<link href="Styles/style.css" rel="stylesheet">
    <link rel="stylesheet" href="./Styles/global.css">
    <link rel="stylesheet" href="./Styles/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
    <title>Administración</title>
    <script src="./JavaScript/code.jquery.com_jquery-3.7.0.js"></script>
    <script src="./JavaScript/form.js"></script>
  <script src="./JavaScript/municipios.js"></script>
    <style>

  .wrapper {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
  }

  main {
    flex: 1;
  }

  footer {
    padding: 20px;
  }
</style>
</head>

<body>
  <script>
    function eliminar() {
      var respuesta=confirm("¿Estas seguro que quieres eliminar?");
      return respuesta;
    }
  </script>
<div class="wrapper">

    <!--Navbar-->
    <header >
        <nav class="navbar fixed-top navbar-bg  nav-masthead navbar-expand-lg navbar-dark p-md-3">
          <div class="container">
              <a href="#" class="navbar-brand">LU 2</a>
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
                        <a class="nav-link fw-bold" aria-current="page" href="index.html">Home</a>
                    </li>
                    <li  class="nav-item">
                        <a class="nav-link fw-bold" href="form.html">Contratación</a>
                    </li>
                      <li  class="nav-item">
                          <a class="nav-link fw-bold" href="comprobante.html">Comprobante</a>
                        </li>
                        <li  class="nav-item">
                            <a class="nav-link fw-bold" href="admin_login.html">Admin</a>
                        </li>
                        
                    </ul>
                </div>
            </div>
          </nav>
    </header>
    <main class="container justify-content-center content-align-center flex" style="padding-top: 4rem;">
        <h1 style="padding-top: 3rem; padding-bottom: 1rem;">Reservaciones</h1>
        <div class="row">
            <div class="col-md-12">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#crearModal">
            Agregar
            </button>
                <br>
                      <?php
                      require "php/conexionBD.php";
                      if (!empty($_GET["folio"])) {
                        $folio=$_GET["folio"];
                        $sql=$conexion->query("delete from Contratacion where Folio='$folio'");
                        if ($sql==1) {
                            echo "<div> class='alert alert-succes'> Contratacion eliminada correctamente</div>";
                        } else {
                            echo "<div> class='alert alert-danger'> Contratacion eliminada correctamente</div>";            
                        }
                    }
                      ?>
                <table class="table text-white">
                    <thead>
                        <tr>
                            <th>Folio</th>
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
                      <?php
                      require 'php/conexionBD.php';
                      
                      // Consulta a la base de datos
                      $sql = "SELECT * FROM Contratacion";
                      $result = $conexion->query($sql);
                      
                      // Recorre cada fila de resultados y muestra los datos en la tabla
                      while ($datos = $result->fetch_object()) {
                          ?>
                          <tr>
                              <td><?=$datos->Folio; ?></td>
                              <td><?=$datos->Nombre; ?></td>
                              <td><?=$datos->FechaEvento; ?></td>
                              <td><?=$datos->TipoEvento; ?></td>
                              <td><?=$datos->RFCCliente; ?></td>
                              <td><?=$datos->SalonSeleccionado; ?></td>
                              <td><?=$datos->MenuSeleccionado; ?></td>
                              <td><?=$datos->NumeroPersonas; ?></td>
                              <td><?=$datos->Horario; ?></td>
                              <td>
                                  <!-- Acciones CRUD -->
                                  <a href="php/modificar.php?folio=<?=$datos->Folio; ?>" class="btn btn-sm btn-info">Editar</a>
                                  <a onclick="return eliminar()" href="admin_menu.php?folio=<?=$datos->Folio; ?>" class="btn btn-sm btn-danger">Eliminar</a>
                              </td>
                          </tr>
                          <?php
                      }
                      
                      // Cierra la conexión
                      $conexion->close();
                      ?>
                      
                    </tbody>
                </table>
            </div>
        </div>
    </main>
<!-- Modal para crear o editar elemento -->
<div class="modal fade " id="crearModal" tabindex="-1" aria-labelledby="crearModalLabel" aria-hidden="true">
    <div class="modal-dialog bg-dark" >
        <div class="modal-content bg-dark">
            <div class="modal-header ">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Información del Contacto</h1>
              <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body ">
                <form id="formularioModal" action="./php/validacionesForm.php" method="post" class="animated-element bg-dark" onsubmit="return validarRFC() && validarEdad() && validarNombre() && validarTelefono() && validarPersonas() && validarCalle() && validarNumero() && validarColonia() && validarPostal() && validarFecha() && checkSelection('menu') && checkSelection('salon') && checkSelection('alcaldia') && checkSelection('entidad')">
                        
          <div class="mb-3">
            <label class="form-label" for="nombre">Nombre:</label>
            <input class="form-control" type="text" id="nombre" name="nombre" class="animated-element" placeholder="Enrique" onchange="validarNombre()" required>
          </div>

          <div class="mb-3">
            <label class="form-label" for="paterno">Apellido Paterno:</label>
            <input class="form-control" type="text" id="paterno" name="paterno" class="animated-element" placeholder="Díaz" onchange="validarNombre()" required>
          </div>

          <div class="mb-3">
            <label class="form-label" for="materno">Apellido Materno:</label>
            <input class="form-control" type="text" id="materno" name="materno" class="animated-element" placeholder="Ortiz" onchange="validarNombre()" required>
          </div>

          <div class="mb-3">
            <label class="form-label" for="telefono">Teléfono:</label>
            <input class="form-control" type="tel" id="telefono" name="telefono" class="animated-element" placeholder="5544332211" onchange="validarTelefono()" required>
          </div>

          <div class="mb-3">
            <label class="form-label" for="correo">Correo Electrónico:</label>
            <input class="form-control" type="email" id="correo" name="correo" class="animated-element" placeholder="you@example.com" required>
          </div>

          <div class="mb-3">
            <label class="form-label" for="calle">Calle:</label>
            <input class="form-control" type="text" id="calle" name="calle" class="animated-element" placeholder="Nombre de la calle" onchange="validarCalle()" required>
          </div>
        
          <div class="mb-3">
            <label class="form-label" for="numero">Número:</label>
            <input class="form-control" type="number" id="numero" name="numero" class="animated-element" placeholder="Número de la casa" onchange="validarNumero()" required>
          </div>
        
          <div class="mb-3">
            <label class="form-label" for="colonia">Colonia:</label>
            <input class="form-control" type="text" id="colonia" name="colonia" class="animated-element" placeholder="Nombre de la colonia" onchange="validarColonia()" required>
          </div>
        
          <div class="mb-3">
            <label class="form-label" for="codigoPostal">Código Postal:</label>
            <input class="form-control" type="number" id="codigoPostal" name="codigoPostal" class="animated-element" placeholder="Código postal" onchange="validarPostal()" required>
          </div>

          <div class="mb-3">
            <label class="form-label" for="entidad">Entidad Federativa:</label>
            <select class="form-select"  id="entidad" name="entidad" onchange="cargarMunicipios()" required>
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
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label" for="municipio">Alcaldía/Municipio:</label>
            <select class="form-select"  id="municipio" name="municipio" required>
              <option value="Seleccionar">Selecciona una opción</option>
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label" for="fechaNacimiento">Fecha de Nacimiento:</label>
            <input class="form-control" type="date" id="fechaNacimiento" name="fechaNacimiento" class="animated-element" onchange="validarEdad()" required>
          </div>

          <div class="mb-3">
            <label class="form-label" for="rfc">RFC:</label>
            <input class="form-control" type="text" id="rfc" name="rfc" class="animated-element" onchange="validarRFC()" placeholder="PPMN00112222HHH" required>
          </div>

              </div>
            <div class="modal-header ">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Información del Evento</h1>
              <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body ">
                        
                <div class="mb-3">
                    <label class="form-label" for="tipo">Tipo de Evento:</label>
                    <select class="form-select"class="form-select" id="tipo" name="tipo" onchange="mostrarCampoEvento() && activarCampoOtro()" required>
                      <option selected>Seleccionar</option>
                      <option value="Bautizo">Bautizo</option>
                      <option value="Primera comunión">Primera comunión</option>
                      <option value="XV años">XV años</option>
                      <option value="Boda">Boda</option>
                      <option value="Cumpleaños">Cumpleaños</option>
                      <option value="Otro">Otro</option>
                    </select>
                </div>


                <div class="mb-3" id="campoEvento" style="display: none;">
                    <label class="form-label" for="evento">Evento (A continuación escriba el tipo de evento que desea realizar): </label>
                    <input type="text" id="evento" name="evento" class="animated-element form-control" placeholder="Ej. Aniversario">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="salon">Elija el salón de su preferencia:</label>
                    <select class="form-select" id="salon" name="salon" onchange="checkSelection('salon')" required>
                      <option selected>Seleccionar</option>
                      <option value="Salón Emperador">Salón Emperador</option>
                      <option value="Salón La Cúspide">Salón La Cúspide</option>
                      <option value="Salón Las Golondrinas">Jardín Las Golondrinas</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="menu">Elija el menú de su preferencia:</label>
                    <select class="form-select" id="menu" name="menu" onchange="checkSelection('menu')" required>
                      <option selected>Seleccionar</option>
                      <option value="Menú para niños">Menú para niños</option>
                      <option value="Menú para adultos">Menú para adultos</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="numPersonas">Número de Personas:</label>
                    <input type="number" id="numPersonas" name="numPersonas" min="75" max="200" class="animated-element form-control" placeholder="99" onchange="validarPersonas()" required>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="fechaEvento">Fecha del evento:</label>
                    <input type="date" id="fechaEvento" name="fechaEvento" min="2023-05-30" class="fecha-especial form-control" onchange="validarFecha() && cargarHorario()" required>
                  
                </div>

                <div class="mb-3">
                    <label class="form-label" for="horaEvento">Horario del evento:</label>
                    <select class="form-select" id="horaEvento" name="horaEvento" required>
                      <option value="Seleccionar">Selecciona una opción</option>
        			  <option value="Seleccionar">Primer hora disponible</option>
                    </select>
                </div>      

              </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="sumbmit" class="btn btn-primary" id="guardarCambios">Guardar</button>
            </div>
        </div>
    </div>
</div>
  </div>
    
    <!-- FOOTER -->
    <footer class="text-white pt-5 pb-4 footer">
        <div class="container text-center text-md-start">
            <div class="row text-center text-md-start">
                <div class="text-center mb-2">
                    <p>
                        Copyright Todos los derechos reservados
                    </p>
                </div>
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
            } else {
                ocultoDiv.style.display = "none";
            }
        });
    </script>
<script src="Scripts/global.js"></script>  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>


<!-- Agregar los enlaces a los archivos JavaScript de Bootstrap y jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
