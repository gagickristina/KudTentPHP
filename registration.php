
 <?php
// prikupimo podatke sa forme
$ime = $_POST['nIme'] ?? "";
$ime = filter_var($ime,FILTER_SANITIZE_STRING);



$prezime = $_POST['nPrezime'] ?? "";
$prezime = filter_var($prezime,FILTER_SANITIZE_STRING);


$email = $_POST['nEmail'] ?? "";
$email = filter_var($email,FILTER_SANITIZE_STRING);
$email = filter_var($email,FILTER_VALIDATE_EMAIL);

if($email==false){
    die("Email nije ispravan!");
}

$pass = $_POST['nLozinka'] ?? "";
$pass = filter_var($pass,FILTER_SANITIZE_STRING);
//$pass = sha1($pass);


$rePass = $_POST['nPonLozinka'] ?? "";
$rePass = filter_var($rePass,FILTER_SANITIZE_STRING);

if(strlen($ime)<=2 || strlen($prezime)<=2 || strlen($pass)<=2)
{
    die("Morate uneti sve informacije.");
}

// kreiramo konekciju ka bazi

$servername = "localhost";
$username = "root";
$password = "";
$db = "kudtent";

// Kreiraj
$conn = new mysqli($servername, $username, $password, $db);

// Proveri konekciju
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
header("Location:form_posebno.php");



// povezemo podatke sa upitom za upis
$sql = "INSERT INTO `korisnici` 
(`idKorisnika`, `Ime`, `Prezime`, `Email`, `Sekcija`,`Lozinka`,`Clanarina`, `Prisustvo`,`Privilegije`) 
VALUES (NULL, '$ime', '$prezime','$email','SkolaFolklora', SHA1('$pass'), 'NijePlacena', 'NijePrisustvovao', 'korisnik');";



// upisemo podatke u db
if($pass===$rePass){
    if ($conn->query($sql) === TRUE) {
        header("Location:form_posebno.php");
      } else {
        echo "Error: " . $sql . "<br>No:".$conn->errno."->" . $conn->error;
      }
}


?> 