<?php 
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