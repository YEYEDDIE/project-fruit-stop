<?php


 require_once('db_connect.php');
 

//delete funktion
if(isset($_POST) && !empty($_POST)) {
if(isset($_POST['delete'])){
  $row = [
    ':id' => $_POST['id']
  ];

  $sql = "DELETE FROM produkt WHERE id=:id";
  $res = $conn->prepare($sql)->execute($row);

  if($res) {
    $output = "produkten med id " . $_POST['id'] . " raderad!";
  }else {
    $output = "Ups, nånting gick fel..";
}
 
  }

//edit funktion

if(isset($_POST['update'])) {   
  $row = [
    ':id' => $_POST['id'],
	':item' => $_POST['item'],
	':category' => $_POST['category'],
    ':pris' => $_POST['pris']
  ];
$sql= "UPDATE produkt
          SET item=:item, pris=:pris,category=:category
           WHERE id=:id";
  $res = $conn->prepare($sql)->execute($row);

  if($res) {
    $output = "produkt med id " . $_POST['id'] . " uppdaterad!";
  } else {
    $output = "Ups, nånting gick fel..";
  }
}
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

    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link href="layout-hemsida_2.css" rel="stylesheet" type="text/css">
    <title>Admin-fruit-stop</title>
	
  </head>
  <body style="background-color:#ccff66;">
  <div id="top">

  <h1>Fruit-Stop</h1>
  <p>En mellan leverantör för dinna frukter och bär</p>
</div>
<div id="wrap">
<div id="nav">

<ul>
<li><a href="index_2.php">Home</a></li>
<li><a href="tilläg.php">tilläg</a></li>
<li><a href="log_in.php?=logout">Logga&nbsp;ut</a></li>

</ul>
</div><!-- end of nav -->
</div><!-- end of wrap-->
  

  <div class="container">
  <!--table -->
	  <br>
	  <img src="assets/ad_1.png" alt="ad_1" height="150" width="690" >
	  <br>
	  <br>
	  <div class="container" style="background-color:#ffffcc;
	   border: 2px solid red;
    border-radius: 12px;"
	  >
	  <br>
  <div class="row"> 
    <div class="col-sm">
     <table class="table table-bordered">
		 <tr>
		 <th colspan='5'>Frukter</th>
		  </tr>
		  <tr>
		 
		  <th>Produkt</th><th>category</th><th>Pris €/st</th><th colspan='2'>admin funktioner</th>
		  </tr>
		  <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
		 <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
		  <tr>
			<td><input type="text" name="item" value="<?php echo $row['item'];  ?>"></td>
			<td><input type="number" name="category" value="<?php echo $row['category'];  ?>"></td>
			<td><input type="text" name="pris" value="<?php echo $row['pris'];  ?>"></td>
<td><button type="submit" name="update">editera</button></td>
		<td><button type="submit" name="delete">radera</button></td>		 
			</tr>
		 </form>
		 <?php  } ?>
	 </table>
    </div>
    <div class="col-sm">
   <table  class="table table-bordered"> <tr>
	   <th colspan='5'>Grönsaker</th>
	 </tr>
	  <tr>
		  <th>Produkt</th><th>category</th><th>Pris €/st</th><th colspan='2'>admin funktioner</th>
		  </tr>
	 <?php while($row = $stmt_2->fetch(PDO::FETCH_ASSOC)) { ?>
	 <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
	 <tr>
		 <td><input type="text" name="item" value="<?php echo $row['item'];  ?>"></td>
		 <td><input type="number" name="category" value="<?php echo $row['category'];  ?>"></td>
		 <td><input type="text" name="pris" value="<?php echo $row['pris'];  ?>"></td>
		 
		 <td><button type="submit" name="update">editera</button></td>
		 <td><button type="submit" name="delete">radera</button></td>
		 </tr>
		  </form>
		 <?php  } ?>
		
		</table>
    </div>
    <div class="col-sm">
		<table class="table table-bordered"><tr>
			<th colspan='5' >Bär</th>
			 </tr>
			  <tr>
		  <th>Produkt</th><th>category</th><th>Pris €/100g</th><th colspan='2'>admin funktioner</th>
		  </tr>
			 <?php while($row = $stmt_3->fetch(PDO::FETCH_ASSOC)) { ?>
			  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
		<tr>
			 <td><input type="text" name="item" value="<?php echo $row['item'];  ?>"></td>
		 <td><input type="number" name="category" value="<?php echo $row['category'];  ?>"></td>
		  <td><input type="text" name="pris" value="<?php echo $row['pris'];  ?>"></td>
			<td><button type="submit" name="update">editera</button></td>
			<td><button type="submit" name="delete">radera</button></td>
		</tr>
		 </form>
		 <?php  } ?> 
		</table> 
    </div>
  </div>
	 
</div>
<br>
 <img src="assets/ad_1.png" alt="ad_1" height="150" width="690" >
 <br>
    <?php if(!empty($output)){echo '<h3 class="alert alert-warning">'. $output. '</h3>';} ?>
	
<div id="footer">
<div class="row">

<div class="col-sm">
      Copyright Fruit-Stop © 2018
    </div>
    <div class="col-sm">
   Support-Telnum: +358 50402312
    </div>
    <div class="col-sm">
     support-Email: fruit.stop@hotmail.com
    </div>
  </div>
 </div> 
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 
 
 </body>

 

</html>