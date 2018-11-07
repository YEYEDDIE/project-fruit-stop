<?php
session_start();

if(!isset($_SESSION['user'])){
	header('Location: log_in.php?action=nosession');
}else{
	$output="välkommen";
}
//tilläg av item
require_once('db_connect.php');
if(isset($_POST) && !empty($_POST)) {
  $sql ="INSERT INTO produkt (item, category , pris)
          VALUES(:item, :category , :pris )";
  $result = $conn->prepare($sql);
  $res = $result->execute(
    array(
      ':item' => $_POST['item'],
      ':category' => $_POST['category'],
      ':pris' => $_POST['pris']
    )
  );
  if($res) {
    $output = "Ny produkt tillagd!";
  } else {
    $output = "Ups, nånting gick fel..";
  }
  
//frukt q-select
$q_select = "SELECT * FROM produkt
WHERE category=1";

$stmt = $conn->query($q_select);

//grönsakers q-select
$q_2_select = "SELECT *  FROM produkt 
WHERE category=2";

$stmt_2 = $conn->query($q_2_select);

//bär q-select
$q_3_select = "SELECT * FROM produkt
WHERE category=3";

$stmt_3 = $conn->query($q_3_select);

 ?>
<!doctype html>
<html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Admin-fruit-stop</title>
  </head>
  <body>
  <div class="container">
  <h1>Fruit-Stop admin</h1>
  <p>En mellan leverantör för dinna frukter och bär</p>
  <div class="container">
  <div class="row">
    <div class="col-sm">
      <a class="btn btn-outline-primary" href="index_2.php">Hemsida</a>
    </div>
    <div class="col-sm">
    <a class="btn btn-primary" href="AB.html">About</a>
    </div>
    <div class="col-sm">
     <a class="btn btn-primary" href="log_in.php?=logout">Logga ut</a>
    </div>
  </div>
</div>
  <div id="cointainer">
<?php if(!empty($output)) { echo '<h3>' . $output . '</h3>'; } ?>
    <h1>Shoutbox </h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<p><label>item name</label><br>
  <input type="text" name="item"></p>
<p><label>category</label><br>
  <input type="number" name="category"></input></p>
<p><label>pris</label><br>
  <input type="number" name="pris"></input></p>
<p><button type="submit">tillläg</button></p>

</form>
</div>
  <!--table -->
	  <br>
	  <br>
	  <br>
	  <div class="container">
  <div class="row"> 
    <div class="col-sm">
     <table  class="table table-bordered">
		 <tr>
		 <th colspan='2'>Frukter</th>
		  </tr>
		  <tr>
		  <th>Produkt</th><th>Pris €/st</th>
		  </tr>
		  <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
		  <tr>
			<td><?php echo $row['item'];  ?></td>
			<td><?php echo $row['pris'];  ?></td>
		 </tr>
		 <?php  } ?>
	 </table>
    </div>
    <div class="col-sm">
   <table  class="table table-bordered"> <tr>
	   <th colspan='2'>Grönsaker</th>
	 </tr>
	  <tr>
		  <th>Produkt</th><th>Pris €/st</th>
		  </tr>
	 <?php while($row = $stmt_2->fetch(PDO::FETCH_ASSOC)) { ?>
	 <tr>
		 <td><?php echo $row['item'];  ?></td>
		 <td><?php echo $row['pris'];  ?></td>
		 </tr><?php  } ?>
		</table>
    </div>
    <div class="col-sm">
		<table class="table table-bordered"><tr>
			<th colspan='2' >Bär</th>
			 </tr>
			  <tr>
		  <th>Produkt</th><th>Pris €/100g</th>
		  </tr>
			 <?php while($row = $stmt_3->fetch(PDO::FETCH_ASSOC)) { ?>
		<tr>
			<td><?php echo $row['item'];  ?></td>
			<td><?php echo $row['pris'];  ?></td>
		</tr>
		 <?php  } ?> 
		</table> 
    </div>
  </div>
	 
</div>
 
 
    
<?php if(!empty($output)){echo '<h3 class="alert alert-warning">'. $output. '</h3>';}?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>