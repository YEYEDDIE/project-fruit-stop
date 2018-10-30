<?php 
session_start();
include('db_connect.php');

if(isset($_GET['action'])){
	$action = $_GET['action'];
	
	
	if($action =='nosession'){
		$output ="logga in ditt skit";
	}
if($action == 'logout'){
	$output = "Tack  för besöket";
	unset($_SESSION['user']);
}
	}



if (isset($_POST)&&!empty($_POST)){
	
	
	$sql ="SELECT * FROM users 
	WHERE user_name=:user_name AND
	user_password=:user_password
	LIMIT 1";
	
	$row = [
	':user_name' => $_POST['user_name'],
	':user_password' => md5($_POST['user_password'])
	];
	$res = $conn->prepare($sql);
	$res->execute($row);
	if($res->fetchColumn() < 1){
		$output = "hitta inte User";
		
	}else{
		//$output = "User ok";
		$_SESSION['user']=1;
		header('Location: index_2.php');
	}
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 
    <title> login</title>
    <style>
    img { max-width: 100%; }
    h1 { text-align: center; }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="jumbotron">
            <h1>Logga in på vår fina service</h1>
				<?php if(!empty($output)){echo '<h3 class="alert alert-warning">'. $output. '</h3>';}?>
          <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
              <label for="exampleInputusername1">Username</label>
              <input type="name" class="form-control" id="user_name" name="user_name"  placeholder="Enter Username">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="user_password" name="user_password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">logga in</button>
          </form>
        </div>
          </div>
</div>
</div> <!-- / container -->
 <!-- Optional JavaScript -->
 <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <p><a class="btn btn-primary" href="index_1.html?=logout">Tillbaka till hemsidan</a></p>
  
  
  
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>