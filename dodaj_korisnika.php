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

                <form name="registracija" action="registracija_dodaj_korisnika.php" method="post">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Ime:</label>
                    <input type="text" class="form-control"  pattern="^([A-Z])\w+"  id="" name="nIme" placeholder="Unestite ime." required>

                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Prezime:</label>
                    <input type="text" class="form-control"   pattern="^([A-Z])\w+" id="" name="nPrezime" placeholder="Unestite prezime." required>

                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email adresa:</label>
                    <input type="email" class="form-control" id="" name="nEmail" placeholder="Unestite email adresu." required>

                </div>
                

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Lozinka:</label>
                    <input type="password" class="form-control" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{5,}$" id=""  name="nLozinka" placeholder="Unestite lozinku." required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Ponovite lozinku:</label>
                    <input type="password" class="form-control" id="" name="nPonLozinka" placeholder="Ponovite lozinku." required>
                </div>


                <button type="submit" class="btn btn-secondary" name="bPotvrdi" onClick="provera()">Dodaj</button>
                 
            </form>

</div>
</div></div></div></section>


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
<script src="js/scripts.js"></script>
   <script src="js/regex.js"></script>

<?php 
if(isset($_GET['bPotvrdi'])) {

    header('Location:logedin.php');

}
 ?>



</body>
</html>

