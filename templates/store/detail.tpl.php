<?php
$store = $this->store;
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>FW TEST - STORE DETAIL</title>
  
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


  <!-- Custom styles for this template -->
  <link href="css/main.css" rel="stylesheet">

</head>

<body>

  <!-- Page Content -->
  <div class="container">

      <!-- Jumbotron Header -->
      <header class="jumbotron my-4">
        <h1 class="display-3">STORE DETAIL</h1>
      </header>

      <div class="row text-center">

        <div class="card mt-4">
          <img class="card-img-top img-fluid" src="http://place-hold.it/900x400" alt="">
          <div class="card-body">
            <h3 class="card-title"><?php echo $store->magasin_nom; ?></h3>
          </div>
        </div>
        <!-- /.card -->

      </div>
      <!-- /.col-lg-9 -->

  </div>
  <!-- /.container -->

</body>

</html>
