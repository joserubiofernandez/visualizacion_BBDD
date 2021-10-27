<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">  <title>Document</title>
    <style>
     :root{
            --colorGris: rgba(111,124,138, 0.5);
            --colorAzul: rgba(86, 97, 244, 0.3);
            --fuentePrincipal: 'Roboto Slab', serif;
            }
       table {
            border-collapse: collapse;
            border-spacing:40px;
            border: 1px solid black;
            width: 50%;
            margin: 0 auto;
            font-family: var(--fuentePrincipal);
        }
        th, td {
            border-collapse: collapse;
            border-spacing:40px;
            border: 1px solid black;
            padding: 5px;
        }
    
        th{
            background-color: var(--colorGris) ;
            font-weight: bolder;
        }
        .colorear{
            background-color:  var(--colorAzul);
        }

        </style>
</head>
<body>
    
<?php
     //Creamos la conexión a la base de datos
     //Estaba vez realizo la conexión con POO
     try{
        $conexion=new PDO('mysql:host=', '', '');
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conexion->exec("SET CHARACTER SET utf8");
    }catch(Exception $e){
        echo "Error: " . $e->getMessage();
    }


    //Realizamos la consulta SQL
    $sql = "select * from peliculas";
    //Ejecutamos la instruccion SQL
    $con = $conexion->query($sql);
    //Creo un array de objetos
    $resultado = $con->fetchAll(PDO::FETCH_OBJ);

?>

    <table>
        <tr>
           
            <th>Titulo</th>
            <th>Director</th>
            <th>Año</th>
            <th>País</th>
        </tr>
        <?php
            foreach($resultado as $datosPelículas) :?>
            <tr>
                <td><?php echo $datosPelículas->titulo   ?></td>
                <td><?php echo $datosPelículas->director      ?></td>
                <td><?php echo $datosPelículas->anio   ?></td>
                <td><?php echo $datosPelículas->pais   ?></td>
             </tr>
            
        <?php
            endforeach;

        ?>
       
        <script>
           var tr = document.getElementsByTagName('tr');
                for(var i=1; i< tr.length; i++){
                    if(i % 2 == 0){
                        tr[i].classList.add("colorear");
                    }
                }
            
        </script>


</body>
</html>
