<?php

if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    require_once "config.php";

    $sql = "SELECT * FROM estudiante WHERE id = :id";
    
    if($stmt = $pdo->prepare($sql)){
        $stmt->bindParam(":id", $param_id);
        
        $param_id = trim($_GET["id"]);
        
        if($stmt->execute()){
            if($stmt->rowCount() == 1){
               
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                $name = $row["dni"];
                $address = $row["nombre"];
                $salary = $row["apellido"];
            } else{
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Lo sentimos! Algo anduvo mal. Por Favor intenta nuevamente.";
        }
    }
     
 
    unset($stmt);
    
  
    unset($pdo);
} else{
  
    header("location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ver registro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
                    <h1>Registro</h1>
                    <div >
                        <h3>DNI</h3>
                        <p><?php echo $row["dni"]; ?></p>
                    </div>
                    <div>
                        <h3>Nombre</h3>
                        <p><?php echo $row["nombre"]; ?></p>
                    </div>
                    <div>
                        <h3>Apellido</h3>
                        <p><?php echo $row["apellido"]; ?></p>
                    </div>
                    <p><a href="index.php" class="btn btn-primary">Volver al inicio</a></p>
                </div>
    </div>
</body>
</html>