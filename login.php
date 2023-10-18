<?php

//sesija
session_start();


$email = $_POST['nEmail'] ?? "";
$email = filter_var($email,FILTER_SANITIZE_STRING);
$email = filter_var($email,FILTER_VALIDATE_EMAIL);

$pass = $_POST['nLozinka']??"";
$pass = filter_var($pass,FILTER_SANITIZE_STRING);



if(strlen($email)<=2 || strlen($pass)<=2){
	die("Email i lozinka moraju imati bar 3 karaktera");
}

// konekcija sa bazom ucitavanjem fajla konekcija.php 
require_once('konekcija.php');

// sql za citanje podataka iz baze
$sql = "SELECT * FROM `korisnici` 
WHERE `Email` = '$email' and `Lozinka` = sha1('$pass')";

$result = $conn->query($sql);
if(!$result)
{
	echo "Nije dobro napisan upit";
	die($sql->error);
}

//var_dump($result);

if ($result->num_rows > 0) {
  // output data of each row
	while($row = $result->fetch_assoc()) {
		$_SESSION['user'] = $row['Email'];
		$_SESSION['userID']= $row['idKorisnika'];
		$_SESSION['userI'] = $row['Ime'];
		$_SESSION['userP'] = $row['Prezime'];
		$_SESSION['privilegije'] = $row['Privilegije'];
		$_SESSION['sekcija'] = $row['Sekcija'];
    //echo "user: ".$row['ime']. " privilegija: ".$row['privilegija'];
		header('Location:logedin.php');
	}
} else {
	echo "Takav korisnik ne postoji!";
}
$conn->close();