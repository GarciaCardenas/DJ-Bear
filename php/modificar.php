<?php
require 'conexionBD.php';
$folio=$_GET["folio"];
$sql=$conexion->query("select * from Contratacion where Folio=$folio");
$datos = $sql->fetch_object();
$rfc=$datos->RFCCliente;
$sqlCliente=$conexion->query("select * from Cliente where RFC='$rfc'");
$datosCliente = $sqlCliente->fetch_object();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Actualizar datos</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kqIez27REHgP8aY6PLeiJieJx1sJGt7bOnSeaaC1qUWZh58EJtXWgmJUyvt3mAmP" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../styles/styles_form.css">
  <link rel="stylesheet" href="../Styles/global.css">
  <link rel="stylesheet" href="../Styles/style.css">
  <script src="../JavaScript/municipios.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
</head>

<body>
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
  
  <div class="container" style="margin-top: 100px;">
    <div class="row">
      <div class="col-12">
        <h1 class="display-4 fw-semibold neon n-verde ">Modificar Reservaciones y contrataciones</h1>
        <p>Por favor, ingrese los datos solicitados en el siguiente formulario, recuerde revisar muy bien los datos antes de enviar.</p>
        <br>
      </div>
    </div>

    
    <form action="./php/validacionesForm.php" method="post" class="animated-element" onsubmit="return validarRFC() && validarEdad() && validarNombre() && validarTelefono() && validarPersonas() && validarCalle() && validarNumero() && validarColonia() && validarPostal() && validarFecha() && checkSelection('menu') && checkSelection('salon') && checkSelection('alcaldia') && checkSelection('entidad')">
      <fieldset>
        <legend>Información de Contacto</legend>
            <div class="row">
                <div class="col-12">
            <label for="nombre">Nombre:</label>
            <input value="<?php echo $datosCliente->Nombre; ?>" type="text" id="nombre" name="nombre" class="animated-element" onchange="validarNombre()" required><br>
        </div>
    </div>
        
        <div class="row">
          <div class="col-12">
              <label for="paterno">Apellido Paterno:</label>
              <input value="<?php echo $datosCliente->ApellidoPaterno; ?>" type="text" id="paterno" name="paterno" class="animated-element" placeholder="Díaz" onchange="validarNombre()" required><br>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <label for="materno">Apellido Materno:</label>
                <input value="<?php echo $datosCliente->ApellidoMaterno; ?>" type="text" id="materno" name="materno" class="animated-element" placeholder="Ortiz" onchange="validarNombre()" required><br>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <label for="telefono">Teléfono:</label>
                <input value="<?php echo $datosCliente->Telefono; ?>" type="tel" id="telefono" name="telefono" class="animated-element" placeholder="5544332211" onchange="validarTelefono()" required><br>
            </div>
        </div>
        
        <div class="row">
          <div class="col-12">
              <label for="correo">Correo Electrónico:</label>
              <input value="<?php echo $datosCliente->CorreoElectronico; ?>" type="email" id="correo" name="correo" class="animated-element" placeholder="you@example.com" required><br>
            </div>
        </div>

        <div class="row">
          <div class="col-12">
              <label for="calle">Calle:</label>
              <input value="<?php echo $datosCliente->Calle; ?>" type="text" id="calle" name="calle" class="animated-element" placeholder="Nombre de la calle" onchange="validarCalle()" required><br>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <label for="numero">Número:</label>
                <input value="<?php echo $datosCliente->NumeroCasa; ?>" type="number" id="numero" name="numero" class="animated-element" placeholder="Número de la casa" onchange="validarNumero()" required><br>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <label for="colonia">Colonia:</label>
                <input value="<?php echo $datosCliente->Colonia; ?>" type="text" id="colonia" name="colonia" class="animated-element" placeholder="Nombre de la colonia" onchange="validarColonia()" required><br>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <label for="codigoPostal">Código Postal:</label>
                <input value="<?php echo $datosCliente->CodigoPostal; ?>" type="number" id="codigoPostal" name="codigoPostal" class="animated-element" placeholder="Código postal" onchange="validarPostal()" required><br>
            </div>
        </div>        
        
        <div class="row">
            <div class="col-12">
                <label for="entidad">Entidad Federativa:</label>
                <select id="entidad" name="entidad" onchange="cargarMunicipios()" required>
                    <option value="Seleccionar"><?php echo $datosCliente->EntidadFederativa; ?></option>
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
                <option value="Seleccionar"><?php echo $datosCliente->AlcaldiaMunicipio; ?></option>
            </select><br>
        </div>
    </div>
    
    <div class="row">
        <div class="col-12">
            <label for="fechaNacimiento">Fecha de Nacimiento:</label>
            <input value="<?php echo $datosCliente->FechaNacimiento; ?>" type="date" id="fechaNacimiento" name="fechaNacimiento" class="animated-element" onchange="validarEdad()" required><br>
        </div>
    </div>
    
    <div class="row">
        <div class="col-12">
            <label for="rfc">RFC:</label>
            <input value="<?php echo $datos->RFCCliente; ?>" type="text" id="rfc" name="rfc" class="animated-element" onchange="validarRFC()" placeholder="PPMN00112222HHH" required><br>
        </div>
    </div>
</fieldset>

<fieldset>
    <legend>Información del Evento</legend>
    <div class="row">
        <div class="col-12">
            <label for="tipo">Tipo de Evento:</label>
            <select id="tipo" name="tipo" onchange="mostrarCampoEvento() && activarCampoOtro()" required>
                <option value="Seleccionar"><?php echo $datos->TipoEvento; ?></option>
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
            <input value="" type="text" id="evento" name="evento" class="animated-element" placeholder="Ej. Aniversario"><br>
          </div>
        </div>
        
        <div class="row">
          <div class="col-12">
              <label for="salon">Elija el salón de su preferencia:</label>
              <select id="salon" name="salon" onchange="checkSelection('salon')" required>
                <option value="Seleccionar"><?php echo $datos->SalonSeleccionado; ?></option>
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
                <option value="Seleccionar"><?php echo $datos->MenuSeleccionado; ?></option>
                <option value="Menú para niños">Menú para niños</option>
                <option value="Menú para adultos">Menú para adultos</option>
            </select><br>
        </div>
    </div>
    
        <div class="row">
            <div class="col-12">
                <label for="numPersonas">Número de Personas:</label>
                <input value="<?php echo $datos->NumeroPersonas; ?>" type="number" id="numPersonas" name="numPersonas" min="75" max="200" class="animated-element"  onchange="validarPersonas()" required><br>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <label for="fechaEvento">Fecha del evento:</label>
                <input value="<?php echo $datos->FechaEvento; ?>" type="date" id="fechaEvento" name="fechaEvento" min="2023-05-30" class="fecha-especial" onchange="validarFecha() && cargarHorario()" required><br>
            </div>
        </div>
        
        <div class="row">
          <div class="col-12">
              <label for="horaEvento">Horario del evento:</label>
              <select value="<?php echo $datos->Horario; ?>" id="horaEvento" name="horaEvento" required>
                  <option value="Seleccionar"><?php echo $datos->Horario; ?></option>
                  <option value="Seleccionar">Primer hora disponible</option>
                </select><br>
            </div>
        </div>      
    </fieldset>
    
    <button type="submit" class="btn btn-outline-light" id="registrar" style="font-weight: bold;">Registrar</button>
    <button type="reset" class="btn btn-outline-warning" id="limpiar" style="font-weight: bold;">Limpiar</button>
</form>
<br><br>
</div>
<!-- FOOTER -->
  <footer class="text-white pt-5 pb-4 ">
    <div class="container text-center text-md-start">
        <div class="row text-center text-md-start">
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
          <h5 class="text-uppercase mb-4 font-weight-bold">Nosotros</h5>

          <hr class="mb-4">
          <p>Somos una empresa de eventos sociales que ofrece servicios de DJ, salas de eventos y banquetes. Creamos experiencias memorables, reflejando la personalidad de nuestros clientes. Valoramos la ética, la excelencia y estamos orgullosos de formar parte de momentos especiales en la vida de las personas.</p>
        </div>
        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3 ">
            <h5 class="text-uppercase mb-4 font-weight-bold">Dejanos ayudarte</h5>
            <hr class="mb-4">
            <p>
                <a href="#">Home</a>
            </p>
            <p>
                <a href="#">Contratación</a>
            </p>
            <p>
                <a href="#">Tu comprobante</a>
            </p>
            <p>
                <a href="#">Administrador</a>
              </p>
            </div>
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
              <h5 class="text-uppercase mb-4 font-weight-bold">Contactanos</h5>
              <hr class="mb-4">
              <p><li class="fas fa-home me-3"></li>Lindavista,G.A.M.,CDMX, México</p>
              <p><li class="fas fa-envelope me-3"></li>djlu2@gmail.com</p>
              <p><li class="fas fa-phone me-3"></li>+55 55 555 555</p>
              
            </div>
            <hr class="mb-4">
            <div class="text-center mb-2">
              <p>
                Copyright Todos los derechos reservados
              </p>
            </div>
          </div>
        </div>
</footer>
<script src="../Scripts/global.js"></script>  
<script src="../JavaScript/form.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>
