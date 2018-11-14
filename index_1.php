<?php
require_once('db_connect.php');

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

    <!--  CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link href="layout-hemsida_2.css" rel="stylesheet" type="text/css">
    <title>Fruit-stop shop</title>
	
  </head>
  <body style="background-color:#ccff66;">
 <div id="top">

  <h1>Fruit-Stop</h1>
  <p>En mellan leverantör för dinna frukter och bär</p>
</div>
<div id="wrap">
<div id="nav">

<ul>
<li><a href="index_1.php">Home</a></li>
<li><a href="AB.html">About</a></li>
<li><a href="log_in.php?=logout">Logga&nbsp;in</a></li>

</ul>
</div><!-- end of nav -->
</div><!-- end of wrap-->
  <!--table --> 
 <div class="container" >
  <img src="assets/ad_1.png" alt="ad_1" height="150" width="690" >
	
	  <br>
	  <br>
	  
	  <div class="container"  style="background-color:#ffffcc;
	   border: 2px solid red;
    border-radius: 12px;">
	<br>
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
<br>
<img src="assets/ad_1.png" alt="ad_1" height="150" width="690" >
<br>
 
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	  </div>
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
 
</body>

</html>