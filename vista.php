<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <form action="">
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label"></label>
                        <input type="date" name="fecha1" class="form-control" id="exampleFormControlInput1" placeholder="seleccionar fecha" required>
                    </div>

                </div>
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label"></label>
                    <input type="date" name="fecha2" class="form-control" id="exampleFormControlInput1" placeholder="seleccionar fecha" required>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label"></label>
                        <select class="form-select" name="cliente" aria-label="Default select example" required>
                            <option selected>Abra la seleccion de menu</option>
                            <?php
                            require 'conexion.php';
                            $resp = mysqli_query($conex, 'select* from cliente');
                            while ($fila = $resp->fetch_assoc()) {
                                echo "<option value = '{$fila['Idcliente']}'>{$fila['nombres']} {$fila['apellidos']}</option>";
                            }
                            ?>

                        </select>

                    </div>
                </div>

                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label"></label>
                    <?php
                    require 'index.php';
                    echo '<input type="submit" class="form-control btn btn-danger" id="exampleFormControlInput1" value="GENERAR REPORTE XML">';
                    $fecha1=$_GET['fecha1'];
                    $fecha2=$_GET['fecha2'];
                    $cliente=$_GET['cliente'];
                    getventas($fecha1, $fecha2, $cliente);
                    ?>
                </div>
            </div>
        </form>



    </div>


</body>

</html>