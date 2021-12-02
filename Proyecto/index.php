<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title></title> 
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Tabla de Registros</h2>
                         </div>
                    <?php
                   
                    require_once "config.php";
                    
                  
                    $sql = "SELECT * FROM estudiante";
                    if($result = $pdo->query($sql)){
                        if($result->rowCount() > 0){
                            echo '<table class="table table-bordered table-striped">';
                            
                            "</thead>";
                                "<thead>";
                                echo   "<tr>";
                                echo   "<th>Id</th>";
                                echo  "<th>Nombre</th>";
                                echo    "<th>Apellido</th>";
                                echo    "<th>Detalles</th>";
                                     "</tr>";
                                "</thead>";
                                "<tbody>";
                                while($row = $result->fetch()){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['nombre'] . "</td>";
                                        echo "<td>" . $row['apellido'] . "</td>";
                                        echo "<td>";
                                           echo '<a href="detalles.php?id='. $row['id'] .'" class="mr-3" title="Ver registro">Ver Registro</a>';
                                
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            
                            unset($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No se encontraron registros.</em></div>';
                        }
                    } else{
                        echo "Lo sentimos! Algo anduvo mal. Por Favor intenta nuevamente.";
                    }
                    
                   
                    unset($pdo);
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>