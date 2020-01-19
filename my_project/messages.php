<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Errors:</title>

	
  <header >

	<div >
        
		<ul>
        <?php foreach ($messages as $msg): ?>
			<li><div><font color="red"><?= $msg ?></font></div></li>
            <?php endforeach; ?>

			</ul>

	</div>

</head>
</html>