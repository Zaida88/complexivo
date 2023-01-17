<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Assets/css/proyect.css">
    <title>WORLDCODES</title>
</head>
<body>

<div class='container'>
    <form action="Models/ProyectModel.php" method="post" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Nombre..."><br><br>
        <input type="text" name="description" placeholder="Descripcion..."><br><br>
        <form >
        <label for="img"> Logo: </label><br><br>
        <input type="file" name="logo" size="20">
    </form><br>
        <input type="email"  name="email" placeholder="Correo..."><br><br>
        <input type="number" name="phoneNumber" placeholder="Telefono..."><br><br>
        <br>
        <input type="submit" value="Guardar">
    </form>
    
</div>  
</body>
</html>