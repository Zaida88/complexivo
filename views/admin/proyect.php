    <link rel="stylesheet" href="Assets/css/proyect.css">
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

  <?php foreach ($data["proyect"] as $dato){

    echo "<tr>";
    echo "<td>".$dato["name"]."</td>";
    echo "<td>".$dato["description"]."</td>";
    echo "<td>".$dato["logo"]."</td>";
    echo "<td>".$dato["email"]."</td>";
    echo "<td>".$dato["phone_number"]."</td>";
    echo "</tr>";
  }
  ?>
  </table>

</div>



<footer>
    <h1>footer</h1>
</footer>
</body>
</html>