<<<<<<< HEAD:Views/proyect/proyect.php
<?php

include '../layout/header.php';

?>

=======
>>>>>>> 70042c06d99d63172c7fdcb6211cc33cb10183b9:views/admin/proyect.php
    <link rel="stylesheet" href="Assets/css/proyect.css">
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">

  <div class="header">
			<ul class="nav">
				<li><a href="">Informacion Pagina</a></li>
				<li><a href="">Lenguajes</a></li>
			</ul>
  </div>

<div class="container">
  <table class="table table-sm table-striped">
    <thead class="table-dark">
      <tr>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>logo</th>
        <th>Correo</th>
        <th>Numero de telefono</th>
      </tr>
    </thead>
 <tbody>
    
  </tbody> 

  <?php 
  foreach($data["proyect"] as $dato){
    $name=$dato['name'];
    $description=$dato['description'];
    $logo=$dato['logo'];
    $email=$dato['email'];
    $phone_number=$dato['phone_number'];
    $category=$dato['category'];

    $valor="";
    if($category == 'jpg' || $category == 'png'){
      $valor="<img width='50' src='data:image/jpg;base64,".base64_encode($logo)."'>";
    }

    ?>
<tr>
  <td><?php echo $name; ?></td>
  <td><?php echo $description; ?></td>
  <td><?php echo $valor; ?></td>
  <td><?php echo $email; ?></td>
  <td><?php echo $phone_number; ?></td>
  </tr>

  <?php
  }
  ?>
  </table>

</div>



<footer>
    <h1>footer</h1>
</footer>
</body>
</html>