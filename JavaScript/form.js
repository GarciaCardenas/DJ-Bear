// Función para mostrar u ocultar el campo de evento según la selección del tipo de evento.

function mostrarCampoEvento() {
    var tipoEvento = document.getElementById("tipo").value;
    var campoEvento = document.getElementById("campoEvento");
  
    if (tipoEvento === "Otro") {
      campoEvento.style.display = "block";
      if (campoEvento.value.trim() === "") {
        alert("El campo de evento no puede quedar vacío. Por favor, ingrese un valor, o seleccione una opción predefinida.");
        campoEvento.focus();
        return false; // Evita el envío del formulario
      }
    } else if (tipoEvento === "Seleccionar") {
      alert("La opción seleccionar es inválida. Por favor, elija otra opción.");
      document.getElementById("tipo").selectedIndex = 0; // Deseleccionar la opción incorrecta
      return false;
    } else {
      campoEvento.style.display = "none";
    }
  }

  function activarCampoOtro() {
    var opcionesSelect = document.getElementById("opciones");
    var campoEvento = document.getElementById("campoEvento");
  
    if (opcionesSelect.value === "otro") {
      campoEvento.style.display = "block";
      var campoTexto = document.getElementById("evento");
      campoTexto.value = ""; // Limpiar el campo de texto
      campoTexto.focus(); // Colocar el foco en el campo de texto
    } else {
      campoEvento.style.display = "none";
      var campoTexto = document.getElementById("evento");
      campoTexto.value = opcionesSelect.value; // Establecer el valor del campo de texto como el valor seleccionado
    }
  }
  
// Función para validar el campo RFC.
function validarRFC() {
    var rfcInput = document.getElementById("rfc");
    var rfc = rfcInput.value.trim();

    if (rfc.length < 10 || rfc.length > 13) {
        alert("El RFC debe tener entre 10 y 13 caracteres");
        rfcInput.focus();
        return false;
    }

    var regexRFC = /^[A-Za-z]{4}\d{6}[A-Za-z0-9]{3}$/;
    if (!regexRFC.test(rfc)) {
        alert("El RFC ingresado no cumple con el formato válido");
        rfcInput.focus();
        return false;
    }

    return true;
}
var rfcInput = document.getElementById("rfc");
rfcInput.addEventListener("input", validarRFC);

//Función para validar que el usuario es mayor de edad (<18 años).
function validarEdad() {
    var fechaNacimientoInput = document.getElementById("fechaNacimiento");
    var fechaNacimiento = new Date(fechaNacimientoInput.value);
    var hoy = new Date();
    var edad = hoy.getFullYear() - fechaNacimiento.getFullYear();

    if (edad < 18) {
        alert("Debes ser mayor de edad para realizar la reservación/contratación");
        fechaNacimientoInput.focus();
        return false;
    }

    return true;
}
var fechaNacimientoInput = document.getElementById("fechaNacimiento");
fechaNacimientoInput.addEventListener("input", validarEdad);

// Función para validar que campo Nombre contenga unicamente letras y espacios.
function validarNombre() {
    var nombreInput = document.getElementById("nombre");
    var nombre = nombreInput.value.trim();

    var regexNombre = /^[A-Za-z\s]+$/;
    if (!regexNombre.test(nombre)) {
        alert("El nombre solo puede contener letras");
        nombreInput.focus();
        return false;
    }

    return true;
}
var nombreInput = document.getElementById("nombre");
nombreInput.addEventListener("input", validarNombre);

// Función para validar que campo Calle contenga unicamente letras y espacios.
function validarCalle() {
    var calleInput = document.getElementById("calle");
    var calle = calleInput.value.trim();

    var regexCalle = /^[A-Za-z\s]+$/;
    if (!regexCalle.test(calle)) {
        alert("La solo puede contener letras");
        calleInput.focus();
        return false;
    }

    return true;
}
var calleInput = document.getElementById("calle");
calleInput.addEventListener("input", validarCalle);

// Función para validar que campo Colonia contenga unicamente letras y espacios.
function validarColonia() {
    var coloniaInput = document.getElementById("colonia");
    var colonia = coloniaInput.value.trim();

    var regexColonia = /^[A-Za-z\s]+$/;
    if (!regexColonia.test(colonia)) {
        alert("La colonia solo puede contener letras");
        coloniaInput.focus();
        return false;
    }

    return true;
}
var coloniaInput = document.getElementById("colonia");
coloniaInput.addEventListener("input", validarColonia);

function limitarRango(valor, minimo, maximo) {
    if (valor < minimo) {
      return minimo;
    } else if (valor > maximo) {
      return maximo;
    } else {
      return valor;
    }
  }

  function validarPersonas() {
    var campoNumero = document.getElementById("numPersonas");
    var valorIngresado = parseInt(campoNumero.value);
    var valorLimitado = limitarRango(valorIngresado, 75, 200);

    if (valorIngresado !== valorLimitado) {
      alert("Por favor, ingresa un número válido entre 75 y 200.");
      campoNumero.value = "";
      campoNumero.focus();
      return false; // Detiene el envío del formulario
    }

    return true; // Permite el envío del formulario
  }
var numPersonasInput = document.getElementById("numPersonas");
numPersonasInput.addEventListener("input", validarPersonas);

// Función para validar que el campo telefono lleve 10 digito y todos numeros.
function validarTelefono() {
    var telefonoInput = document.getElementById("telefono");
    var telefono = telefonoInput.value.trim();

    var regexTelefono = /^\d{10}$/;
    if (!regexTelefono.test(telefono)) {
        alert("El teléfono debe tener 10 dígitos");
        telefonoInput.focus();
        return false;
    }

    return true;
}
var telefonoInput = document.getElementById("telefono");
telefonoInput.addEventListener("input", validarTelefono);

// Función para validar que el campo número lleve 4 digito y todos numeros.
function validarNumero() {
    var numeroInput = document.getElementById("numero");
    var numero = numeroInput.value.trim();

    var regexnumero = /^\d{1,4}$/;
    if (!regexnumero.test(numero)) {
        alert("El número de domicilio debe tener máximo 4 dígitos");
        numeroInput.focus();
        return false;
    }

    return true;
}
var numeroInput = document.getElementById("numero");
numeroInput.addEventListener("input", validarNumero);

// Función para validar que el campo CP lleve 5 digito y todos numeros.
function validarPostal() {
    var postalInput = document.getElementById("codigoPostal");
    var cPostal = postalInput.value.trim();

    var regexPostal = /^\d{5}$/;
    if (!regexPostal.test(cPostal)) {
        alert("El Cógigo Postal debe tener 5 dígitos");
        postalInput.focus();
        return false;
    }

    return true;
}
var postalInput = document.getElementById("codigoPostal");
postalInput.addEventListener("input", validarPostal);

//Función para NO aceptar la opción seleccionar
function checkSelection(elementId) {
    var selectElement = document.getElementById(elementId);
    var selectedOption = selectElement.value;
    
    if (selectedOption === "Seleccionar") {
      alert("La opción seleccionar es invalida. Por favor, elija otra opción.");
      selectElement.selectedIndex = 0; // Deseleccionar la opción incorrecta
      return false;

    }
    return true;
  }

  function validarFecha() {
    var inputFecha = document.getElementById("fechaEvento");
    var fechaSeleccionada = new Date(inputFecha.value);
    var diaSeleccionado = fechaSeleccionada.getDay();

    // Obtener la fecha actual
    var fechaActual = new Date();
    fechaActual.setHours(0, 0, 0, 0); // Establecer la hora actual a las 00:00:00

    // Verificar si la fecha seleccionada es anterior a la fecha actual
    if (fechaSeleccionada < fechaActual) {
        alert("No se puede seleccionar una fecha pasada o del día actual. Por favor, elija una fecha futura.");
        inputFecha.value = ""; // Limpiar el valor del campo
        inputFecha.classList.add("disabled"); // Agregar clase para desactivar y mostrar en gris
        return false; // Impedir el envío del formulario
    } else {
        inputFecha.classList.remove("disabled"); // Quitar clase de desactivación
    }

    // Verificar si el día seleccionado no es jueves (4), viernes (5) o sábado (6)
    if (diaSeleccionado !== 4 && diaSeleccionado !== 5 && diaSeleccionado !== 6) {
        alert("No se ofrece servicio en el día seleccionado. Por favor, elija un viernes, sábado o domingo.");
        inputFecha.value = ""; // Limpiar el valor del campo
        inputFecha.classList.add("disabled"); // Agregar clase para desactivar y mostrar en gris
        return false; // Impedir el envío del formulario
    }

    return true;

  }

  function cargarHorario(){
    var inputFecha = document.getElementById("fechaEvento");
    var fechaSeleccionada = new Date(inputFecha.value);
    var diaSeleccionado = fechaSeleccionada.getDay();
    var horaSelect = document.getElementById("horaEvento");

    horaSelect.innerHTML = "<option value=''>Seleccione un horario</option>";

    switch (diaSeleccionado) {
        case 4:
            horaSelect.innerHTML += "<option value='12:00 hrs - 17:00 hrs'>12:00 pm</option>";
            horaSelect.innerHTML += "<option value='19:00 hrs - 24:00 hrs'>7:00 pm</option>";
            break;
        case 5:
            horaSelect.innerHTML += "<option value='14:00 hrs - 19:00 hrs'>2:00 pm</option>";
            horaSelect.innerHTML += "<option value='21:00 hrs - 2:00 hrs'>9:00 pm</option>";
            break;
        case 6:
            horaSelect.innerHTML += "<option value='9:00 hrs - 14:00 hrs'>9:00 am</option>";
            break;
        default:
            break;
    }
}
