<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Messages:</title>

	<link rel="stylesheet" href="demo.css">
	<link rel="stylesheet" href="header-login-signup.css">
	<link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
  </head>
  <header class="header-login-signup">

	<div class="header-limiter">
        
		<ul>
        <?php foreach ($messages as $msg): ?>
			<li><div><?= $msg ?></div></li>
            <?php endforeach; ?>

			</ul>

	</div>

</head>
</html>