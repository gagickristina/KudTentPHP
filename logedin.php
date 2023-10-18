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
  <section class="page-section bg-dark">
    <div class="text-center">
      <h2 class="section-heading text-muted">Infomacije o korisnicima.</h2>

    </div>
    <div class="container">


      <?php

      session_start();

      if(empty($_SESSION['user'])){ 
        echo "<a href='form_posebno.php'>Link za logovanje</a><br>";

        die("Niste ulogovani!");

      }



      echo "Vi ste ulogovani kao: ".$_SESSION['userI']." ".$_SESSION['userP']."<br>"; ?>

      <br><a href='logout.php' class='btn btn-secondary'>Logout <i class="fa-solid fa-right-from-bracket"></i></a><br>

      

      <?php 
//konekcija
      require_once "konekcija.php";


      $id = $_SESSION['userID'] ?? "";


      $sql = "SELECT * FROM `korisnici`";
      $sql2 ="SELECT * FROM `korisnici` where `korisnici`.`idKorisnika`=$id";



      $result = $conn->query($sql);
      $result2 = $conn->query($sql2);
      


//ako je admin
      if($_SESSION['privilegije'] == 'Admin')
        {?>
          <form action="<?php $_SERVER['PHP_SELF'] ?>">
           <label for="exampleInputEmail1" class="form-label">Izaberite sekciju:</label>
           <select name="nSekcija" class="form-select" id="" >
            <option value="SkolaFolklora">SkolaFolklora</option>
            <option value="IzvodjackiAnsambl">IzvodjackiAnsambl</option>
            <option value="Orkestar">Orkestar</option>
            <option value="PevackaGrupa">PevackaGrupa</option>
          </select>
          <br>
          <input type="submit" class='btn btn-info' name="bPretrazi" value="Pretrazi"  >
          <input type="submit" class='btn btn-info' name="bPrikazi" value="Prikazi sve"  >
        </form>
        <br><a href='dodaj_korisnika.php' class='btn btn-success'>Dodaj korisnika <i class="fa-solid fa-plus"></i></a><br><br>
        <?php 
        $sekcija = $_GET['nSekcija'] ?? "";
        $sql3 ="SELECT * FROM `korisnici` where `korisnici`.`Sekcija`='$sekcija'";
        $result3 = $conn->query($sql3);
        ?> 
        <?php 
        if (isset($_GET['bPretrazi'])) {

          if ($result3->num_rows > 0) {
            ?>


            <table class='table'>
              <thead>
                <tr bgcolor="#f8f9fa">
                  <th scope='col'>#</th>
                  <th scope='col'>Ime</th>
                  <th scope='col'>Prezime</th>
                  <th scope='col'>Email</th>
                  <th scope='col'>Sekcija</th>

                  <th scope="col">Clanarina</th>
                  <th scope='col'>Prisustvo na probi</th>
                  <th scope='col'>Privilegije</th>
                  <th scope='col'></th>
                  <th scope='col'></th>
                </tr>

              </thead>
              <tbody>
                <?php  
                while($row = $result3->fetch_assoc()) {
                  echo "<tr><td>".$row['idKorisnika']."</td>";
                  echo "<td>".$row['Ime']."</td>";
                  echo "<td>".$row['Prezime']."</td>";
                  echo "<td>".$row['Email']."</td>";
                  echo "<td>".$row['Sekcija']."</td>";

                  echo "<td>".$row['Clanarina']."</td>";
                  echo "<td>".$row['Prisustvo']."</td>";
                  echo "<td>".$row['Privilegije']."</td>";
                  echo "<td> <a href='izmena_informacija.php?id=".$row['idKorisnika']."'>
                  <button type='button' class='btn btn-info' data-bs-toggle='modal' data-bs-target='#exampleModal'>
                  Edit <i class='fa-solid fa-pen-to-square'></i> </button></a>

                  </td>";



                } ?>

              </tbody>
              </table><?php  
            }}
            elseif(isset($_GET['bPrikazi'])){
             if ($result->num_rows > 0) {
              ?>


              <table class='table'>
                <thead>
                  <tr bgcolor="#f8f9fa">
                    <th scope='col'>#</th>
                    <th scope='col'>Ime</th>
                    <th scope='col'>Prezime</th>
                    <th scope='col'>Email</th>
                    <th scope='col'>Sekcija</th>

                    <th scope="col">Clanarina</th>
                    <th scope='col'>Prisustvo na probi</th>
                    <th scope='col'>Privilegije</th>
                    <th scope='col'></th>
                    <th scope='col'></th>
                  </tr>

                </thead>
                <tbody>
                  <?php  
                  while($row = $result->fetch_assoc()) {
                    echo "<tr><td>".$row['idKorisnika']."</td>";
                    echo "<td>".$row['Ime']."</td>";
                    echo "<td>".$row['Prezime']."</td>";
                    echo "<td>".$row['Email']."</td>";
                    echo "<td>".$row['Sekcija']."</td>";

                    echo "<td>".$row['Clanarina']."</td>";
                    echo "<td>".$row['Prisustvo']."</td>";
                    echo "<td>".$row['Privilegije']."</td>";
                    echo "<td> <a href='izmena_informacija.php?id=".$row['idKorisnika']."'>
                    <button type='button' class='btn btn-info' data-bs-toggle='modal' data-bs-target='#exampleModal'>
                    Edit <i class='fa-solid fa-pen-to-square'></i> </button></a>

                    </td>";



                  } ?>

                </tbody>
                </table><?php  
              }

            }



          }
          else  //ako je korisnik
          {
            if ($result2->num_rows > 0) {
              ?>

              <table class='table'>
                <thead>
                  <tr>
                    <th scope='col'>#</th>
                    <th scope='col'>Ime</th>
                    <th scope='col'>Prezime</th>
                    <th scope='col'>Email</th>
                    <th scope='col'>Sekcija</th>

                    <th scope="col">Clanarina</th>
                    <th scope='col'>Prisustvo na probi</th>

                    <th scope='col'></th>
                    <th scope='col'></th>
                  </tr>
                </thead>
                <tbody>
                  <?php  
                  while($row = $result2->fetch_assoc()) {
                    echo "<tr><td>".$row['idKorisnika']."</td>";
                    echo "<td>".$row['Ime']."</td>";
                    echo "<td>".$row['Prezime']."</td>";
                    echo "<td>".$row['Email']."</td>";
                    echo "<td>".$row['Sekcija']."</td>";

                    echo "<td>".$row['Clanarina']."</td>";
                    echo "<td>".$row['Prisustvo']."</td>";

                    echo "<td> <a href='izmena_informacija_korisnik.php?id=".$row['idKorisnika']."'>
                    <button type='button' class='btn btn-info' data-bs-toggle='modal' data-bs-target='#exampleModal'>
                    Edit <i class='fa-solid fa-pen-to-square'></i> </button></a>

                    </td>";



                  } ?>

                </tbody>
                </table><?php  
              }}
              


              ?>





            </div>
          </section>


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
