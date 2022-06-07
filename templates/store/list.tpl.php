<?php
$list_store = $this->list_store;
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>FW TEST - STORE LIST</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <!-- Custom styles for this template -->
  <link href="css/main.css" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="js/ajax.js" async></script>

</head>

<body>

  <!-- Page Content -->
  <div class="container">

    <!-- Jumbotron Header -->
    <header class="jumbotron my-4">
      <h1 class="display-3">STORE LIST</h1>
    </header>

    <!-- Page Features -->
    <div class="row text-center">

      	<?php foreach ($list_store as $store) { 

      		?>
      		<div class="col-lg-3 col-md-6 mb-4 bloc_store">
		        <div class="card h-100">
		          <img class="card-img-top" src="http://place-hold.it/500x325" alt="">
		          <div class="card-body">
		            <h4 class="card-title">Voici le magasin de :</h4>
		            <p class="card-text"><?php echo $store->magasin_nom; ?></p>
		          </div>
		          <div class="card-footer">
		            <a href="store_detail.php?id=<?php echo $store->getId(); ?>" class="btn btn-primary">Voir le magasin</a>
		          </div>
		          <button data-id="<?php echo $store->getId(); ?>" type="button" class="close" aria-label="Close">
    					  <span aria-hidden="true">&times;</span>
    					</button>
		        </div>
		     </div>
       	<?php } ?>
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

</body>

</html>
