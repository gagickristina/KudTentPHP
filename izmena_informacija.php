<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>KUD "TENT"</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

  <!-- Font Awesome icons (free version)-->
  <script src="https://kit.fontawesome.com/d68735e6c0.js" crossorigin="anonymous"></script>
  <!-- Google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="css/styles.css" rel="stylesheet" />
  <style>
  .container{
      /*  background-image: url("assets/img/header-bg.jpg");*/
      background-color: #fff;
  }
  
  
</style>


</head>
<body id="page-top">




    <?php

    session_start();

    if (empty($_SESSION['user']) || $_SESSION['privilegije'] != 'Admin') {?>
       <br><a href='form_posebno.php' class='btn btn-secondary'>Link za logovanje </a><br>
       <?php 

       die("Niste ulogovani, ili niste ulogovani kao administrator!");
   }




   ?>
   <section class="page-section bg-dark">
     <div class="container">

        <div class="row">

            <div class="card">
              <div class="card-body">

                <form action="<?php $_SERVER['PHP_SELF'] ?>">

                   <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">ID Korisnika</label>
                    <input type="text" class="form-control" name="nId" readonly value="<?php echo filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING); ?>">
                </div>


                <div class="mb-3">
                 <label for="exampleInputEmail1" class="form-label">Podesite privilegije:</label>
                 <select name="nPrivilegija" class="form-select" id="" >
                     <option value="Korisnik">Korisnik</option>
                     <option value="Admin">Admin</option>

                 </select>

             </div>

             <div class="mb-3">
                 <label for="exampleInputEmail1" class="form-label">Izaberite sekciju:</label>
                 <select name="nSekcija" class="form-select" id="" >
                    <option value="SkolaFolklora">SkolaFolklora</option>
                    <option value="IzvodjackiAnsambl">IzvodjackiAnsambl</option>
                    <option value="Orkestar">Orkestar</option>
                    <option value="PevackaGrupa">PevackaGrupa</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Izaberite da li je članarina plaćena ili nije plaćena:</label>
                <select name="nClanarina" class="form-select"  id="" >
                    <option value="NijePlacena">NijePlacena</option>
                    <option value="Placena">Placena</option>

                </select>

            </div>

            <div class="mb-3">
             <label for="exampleInputEmail1" class="form-label">Izaberite da li je član prisustvovao probi:</label>
             <select name="nPrisustvo" class="form-select" id="" >
                <option value="NijePrisustvovao">NijePrisustvovao</option>
                <option value="Prisustvovao">Prisustvovao</option>

            </select>
        </div>


        <input type="submit" class='btn btn-success' name="bPotvrdi" value="Potvrdi izmene"  >
        <input type="submit" class='btn btn-danger' name="bObrisi" value="Obriši korisnika" >
        <input type="submit" class='btn btn-info' name="bVrati" value="Vrati se">


    </form>
</div>
</div></div></div></section>


<?php
// sql za update
$privilegija = $_GET['nPrivilegija'] ?? "";
$id = $_GET['nId'] ?? "";

$sekcija = $_GET['nSekcija'] ?? "";
$clanarina = $_GET['nClanarina'] ?? "";
$prisustvo = $_GET['nPrisustvo'] ?? "";


// upit za update
$sql = "UPDATE `korisnici` SET `Privilegije` = '$privilegija',
`Sekcija` = '$sekcija',
`Clanarina` = '$clanarina',
`Prisustvo` = '$prisustvo'
WHERE `korisnici`.`idKorisnika` = $id";

$sql2="DELETE from `korisnici` where `korisnici`.`idKorisnika`=$id";

// konekcija sa bazom
require_once "konekcija.php";

if (isset($_GET['bPotvrdi'])) {
    if ($conn->query($sql) === TRUE) {
        echo "Podaci su promenjeni";
        header('Location:logedin.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
elseif(isset($_GET['bObrisi'])) {
   if ($conn->query($sql2) === TRUE) {
    echo "Korisnik je izbrisan";
    header('Location:logedin.php');
} else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
}
$conn->close();
}
elseif(isset($_GET['bVrati'])) {

    header('Location:logedin.php');
    
}


?>


<footer class="footer py-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 text-lg-start">Copyright &copy; Gagić Kristina 2022</div>

        </div>
    </div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js">



</script>

</body>
</html>

