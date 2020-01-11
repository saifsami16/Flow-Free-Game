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
  </head>
  <header class="header-login-signup">

	<div class="header-limiter">
        <img src="logo.png" alt="LOGO" style="width:50px;height:60px;"> 
		<h1><a href="project.php">Messengers<span>Game</span></a></h1>

		<nav>
			<a href="project.php" class="selected">Home</a>
			</nav>

		<ul>
      <?php if(isset($_SESSION['banda'])) : ?>
      <li><a href="levels.php">Levels</a></a></li>
      <li>You are logged in as <b></b><?= $_SESSION['banda']['name'] ?><b></b></a></li>
      <li><a href="log_out.php">Log Out</a></li>
      <?php else: ?>
      <li><a href="log_in.php">Login</a></li>
      <li><a href="sign_up.php">Sign up</a></li>
      <?php endif; ?>
			
      
    
    </ul>

	</div>

<!--
      
    <?php if (authorize("admin") || authorize("player")) : ?>
      <li><a href="levels.php">Levels</a></li>
    <?php endif; ?>
    <?php if (authorize("admin")) : ?>
      <li><a href="edit_level.php">Manage Levels</a></li>
    <?php endif; ?>
    -->
    
  

</header>


</html>
