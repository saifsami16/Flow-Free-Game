<?php
require_once("utils/_init.php");
require_once("header.php");

//loading levels information from database so as to add more levels when needed.

$level = $levels_store->findAll();
?>
<link rel="stylesheet" href="demo.css">
<table border="1" style="width:50%" class="center">
<tr>
    <td><b>Name</b></td>
    <td><b>Difficulty</b></td>
    <td><b>Number of solved times</b></td>
    
</tr>

<?php foreach ($level as $l) : ?>
<tr>
    <td><a href="level.php?id=<?= $l["name"] ?>"><?= $l["name"] ?></a></td>
     <td><?= $l["dif"] ?></td>
    <td><?= $l["count"] ?></td>
</tr>
<?php endforeach; ?>

</table>

<!-- Have to add option for admin to add levels to the game 
<td><input type="button" id="1" onclick="init(this)" value="Play Trial" /><?= $l["name"] ?></td>
 
<input type="button" id="1" onclick="init(this)" value="Play Trial" />
-->