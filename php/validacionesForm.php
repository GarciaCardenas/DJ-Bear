<?php
session_start(); // Iniciar la sesión

// Inicializar variables de errores
$errores = [];

// Comprobar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los valores enviados por el formulario
    $nombre = validarEntrada($_POST['nombre']);
    $paterno = validarEntrada($_POST['paterno']);
    $materno = validarEntrada($_POST['materno']);
    $telefono = validarEntrada($_POST['telefono']);
    $correo = validarEntrada($_POST['correo']);
    $fechaNacimiento = validarEntrada($_POST['fechaNacimiento']);
    $rfc = validarEntrada($_POST['rfc']);
    $calle = validarEntrada($_POST['calle']);
    $numero = validarEntrada($_POST['numero']);
    $colonia = validarEntrada($_POST['colonia']);
    $codigoPostal = validarEntrada($_POST['codigoPostal']);
    $municipio = validarEntrada($_POST['municipio']);
    $entidad = validarEntrada($_POST['entidad']);    
    $tipo = validarEntrada($_POST['tipo']);
    $salon = validarEntrada($_POST['salon']);
    $menu = validarEntrada($_POST['menu']);
    $evento = validarEntrada($_POST['evento']);
    $numPersonas = validarEntrada($_POST['numPersonas']);
    $fechaEvento = validarEntrada($_POST['fechaEvento']);
    $horaEvento = validarEntrada($_POST['horaEvento']);

    // Validar nombre
    if (empty($nombre)) {
        $errores[] = "El nombre es obligatorio.";
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $nombre)) {
        $errores[] = "El nombre solo puede contener letras y espacios.";
    }

    // Validar teléfono
    if (empty($telefono)) {
        $errores[] = "El teléfono es obligatorio.";
    } elseif (!preg_match("/^\d{10}$/", $telefono)) {
        $errores[] = "El teléfono debe tener 10 dígitos.";
    }

    // Validar fecha de nacimiento
    if (empty($fechaNacimiento)) {
        $errores[] = "La fecha de nacimiento es obligatoria.";
    } else {
        $hoy = new DateTime();
        $fechaNacimientoObj = DateTime::createFromFormat('Y-m-d', $fechaNacimiento);
        $edad = $fechaNacimientoObj->diff($hoy)->y;

        if ($edad < 18) {
            $errores[] = "Debes ser mayor de 18 años para realizar la reserva.";
        }
    }

    // Validar RFC
    if (empty($rfc)) {
        $errores[] = "El RFC es obligatorio.";
    } elseif (strlen($rfc) < 10 || strlen($rfc) > 13) {
        $errores[] = "El RFC debe tener entre 10 y 13 caracteres.";
    } else {
        // Validar formato del RFC (primeros 4 caracteres letras, siguientes 6 números, últimos 3 caracteres números, letras o combinación)
        if (!preg_match("/^[a-zA-Z]{4}\d{6}[\w\d]{1,3}$/", $rfc)) {
            $errores[] = "El RFC tiene un formato inválido.";
        }
    }

    // Validar calle
    if (empty($calle)) {
        $errores[] = "La calle es obligatoria.";
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $calle)) {
        $errores[] = "La calle solo puede contener letras y espacios.";
    }

    // Validar número
    if (empty($numero)) {
        $errores[] = "El número es obligatorio.";
    } elseif (!is_numeric($numero) || $numero <= 0 || $numero != round($numero)) {
        $errores[] = "El número debe ser un valor numérico entero positivo.";
    }

    // Validar colonia
    if (empty($colonia)) {
        $errores[] = "La colonia es obligatoria.";
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $colonia)) {
        $errores[] = "La colonia solo puede contener letras y espacios.";
    }

    // Validar código postal
    if (empty($codigoPostal)) {
        $errores[] = "El código postal es obligatorio.";
    } elseif (!preg_match("/^\d{5}$/", $codigoPostal)) {
        $errores[] = "El código postal debe tener 5 dígitos.";
    }

    // Validar número de personas
    if (empty($numPersonas)) {
        $errores[] = "El número de personas es obligatorio.";
    } elseif (!is_numeric($numPersonas) || $numPersonas <= 0 || $numPersonas != round($numPersonas)) {
        $errores[] = "El número de personas debe ser un valor numérico positivo.";
    }

    // Validar fecha del evento (viernes, sábado o domingo)
    if (empty($fechaEvento)) {
        $errores[] = "La fecha del evento es obligatoria.";
    } else {
        $diaSemana = date('N', strtotime($fechaEvento));
        if ($diaSemana < 5 || $diaSemana > 7) {
            $errores[] = "El evento solo puede realizarse los días viernes, sábado o domingo.";
        }
    }

    // Comprobar si no hay errores
    if (empty($errores)) {
        // Procesar y guardar los datos
        // Aquí puedes agregar el código para guardar los datos en una base de datos o realizar alguna otra acción

        // Guardar los datos en variables de sesión
        $_SESSION['nombre'] = $nombre;
        $_SESSION['paterno'] = $paterno;
        $_SESSION['materno'] = $materno;
        $_SESSION['telefono'] = $telefono;
        $_SESSION['correo'] = $correo;
        $_SESSION['fechaNacimiento'] = $fechaNacimiento;
        $_SESSION['rfc'] = $rfc;
        $_SESSION['calle'] = $calle;
        $_SESSION['numero'] = $numero;
        $_SESSION['colonia'] = $colonia;
        $_SESSION['codigoPostal'] = $codigoPostal;
        $_SESSION['municipio'] = $municipio;
        $_SESSION['entidad'] = $entidad;        
        $_SESSION['tipo'] = $tipo;
        $_SESSION['salon'] = $salon;
        $_SESSION['menu'] = $menu;
        $_SESSION['evento'] = $evento;
        $_SESSION['numPersonas'] = $numPersonas;
        $_SESSION['fechaEvento'] = $fechaEvento;
        $_SESSION['horaEvento'] = $horaEvento;

        // Redirigir a la página de éxito
        header("Location: procesaDatos.php");
        exit();
    }
}

/**
 * Función para validar y limpiar una entrada de datos.
 *
 * @param string $dato El dato a validar y limpiar.
 * @return string El dato validado y limpio.
 */
function validarEntrada($dato) {
    // Eliminar espacios en blanco al inicio y al final
    $dato = trim($dato);
    // Convertir caracteres especiales en entidades HTML
    $dato = htmlspecialchars($dato);
    // Eliminar barras invertidas escapadas
    $dato = stripslashes($dato);
    return $dato;
}
?>
