<?php

function getventas($f1,$f2,$c){
    require 'conexion.php';
    $response = mysqli_query($conex, "SELECT * from cliente c JOIN venta v ON (c.Idcliente = v.Idcliente) JOIN detalle d ON (v.Idventa = d.Idventa) JOIN producto p ON (p.Idproducto = d.Idproducto) WHERE v.fecha BETWEEN '$f1' AND '$f2' AND c.Idcliente = $c ;");
    if ($response) {
        $xml = new DOMDocument("1.0");
        $xml->formatOutput = true;
        $fitness = $xml->createElement("venta");
        $xml -> appendChild($fitness);
        while ($row = $response->fetch_assoc()) {
            $venta=$xml->createElement("venta");
            $fitness->appendChild($venta);

            $idventa = $xml->createElement("Idventa", $row['Idventa']);
            $venta->appendChild($idventa);

            $nombres = $xml->createElement("Nombres", $row['nombres']);
            $venta->appendChild($nombres);

            $apellidos = $xml->createElement("Apellidos", $row['apellidos']);
            $venta->appendChild($apellidos);

            $fecha = $xml->createElement("Fecha", $row['fecha']);
            $venta->appendChild($fecha);
            
            $nomprod = $xml->createElement("NomProducto", $row['nomprod']);
            $venta->appendChild($nomprod);

            $precio = $xml->createElement("Precio", $row['precio']);
            $venta->appendChild($precio);
            
            $cantidad = $xml->createElement("Cantidad", $row['cantidad']);
            $venta->appendChild($cantidad);
        }
    
        $xml->save("report.xml");
    } else {
        echo "<script>console.log('error!')</script>";
    }
}
?>