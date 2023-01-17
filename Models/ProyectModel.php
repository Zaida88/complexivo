<?php

include 'Config/db.php';

$name = $_POST['name'];
$description = $_POST['description'];
$logo = addslashes(file_get_contents($_FILES['logo']['tmp_name']));
$email = $_POST['email'];
$phoneNumber = $_POST['phoneNumber'];

$query = "INSERT INTO proyect(name, description, logo, email, phoneNumber) VALUES('$name', '$description', '$logo', '$email', '$phoneNumber')";
$result = $db->query($query);

if($result){
	echo "se guardo";
}else{
	echo "NOOOOOOOO"; 
}

?>