<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Game</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Login, Sign up Header</title>

	<link rel="stylesheet" href="demo.css">
	<link rel="stylesheet" href="header-login-signup.css">
  <link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
  <link rel="shortcut icon" href="logo.ico" />
  </head>
  <header class="header-login-signup">

	<div class="header-limiter">
        <img src="logo.png" alt="LOGO" style="width:50px;height:60px;"> 
		<h1><a href="index.php">Messengers<span>Game</span></a></h1>

		<nav>
			<a href="index.php" class="selected">Home</a>
			</nav>

		<ul>
      <?php if(isset($_SESSION['banda'])) : ?>
      <li>You are logged in as '<b></b><?= $_SESSION['banda']['name'] ?>'<b></b></a></li>
    
     <?php
      
        if($_SESSION['banda']['email'] == "admin@admin.com"):  ?>
        <li><a href="add_puzzle.php">Add Puzzle</li>
        <?php endif; ?>
        <li><a href="levels.php">Levels</a></a></li>
    
        <li><a href="log_out.php">Log Out</a></li>
      <?php else: ?>
      <li><a href="log_in.php">Login</a></li>
      <li><a href="sign_up.php">Sign up</a></li>
      <?php endif; ?>
			
      
    
    </ul>

	</div>


  

</header>


</html>
