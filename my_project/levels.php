<?php
require_once("utils/_init.php");
require_once("header.php");
if(!isset($_SESSION["banda"]))redirect("index.php");


//loading levels information from database so as to add more levels when needed.

$users_d = $users_store->findAll();
$levels_name = $levels_store->findAll();

$selected[] = null;
?>

<?php   //Deleting puzzles
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['formSubmit'])){
  if(verify_post("Delete")){  
    $selected = $_POST['Delete'];
 
    foreach($selected as $s)
    {
        foreach($levels_name as $key => $val){
            if($s === $val["name"]){
                //echo $key;
                foreach($users_d as $keyn=>$u_n){   //find a method to delete a single entry from a data or delete and then add the whole entry
                //every time medium is being deleted havin key value 1;
                    unset($users_d[$keyn][$val["name"]]);
                    //$newJsonString = json_encode($users_d);
                    // echo $keyn;
                    $users_store->update($keyn, $users_d[$keyn]);
                    //print_r($users_d);
                }
                     
               $levels_store->delete($key);       //uncomment them when done
               $levels_data->delete($key);
              break;
            }
            
        }




        }
    }
    else echo("You didn't select any puzzles."); //ADD this into messages array and then require the messages.php file so the errors can be shown
}
?>

<link rel="stylesheet" href="demo.css">

<table border="1" style="width:50%" class="center" cellpadding="0" cellspacing="0">
<tr><td>
<table border="1" style="width:100%" class="center">
<tr>
    <td height="30"><b>Name</b></td>
    <td height="30"><b>Difficulty</b></td>
    <td height="30"><b>Number of solved times</b></td>
    <td height="30"><b>Solved by you</b></td>
    
</tr>

<?php 
$level = $levels_store->findAll();
$users=$users_store->findAll();
foreach ($level as $l) : ?>
<tr >
    <td height="30"><a href="level.php?id=<?= $l["name"] ?>"><?= $l["name"] ?></a></td>
     <td height="30"><?= $l["dif"] ?></td>
    <td height="30"><?= $l["count"] ?></td>
    <td height="30"><?php foreach($users as $u){
        if(($_SESSION['banda']['name'])==$u["name"])
            echo $u[$l["name"]];
    } ?></td>
    </tr>
<?php endforeach; ?>



</table>
</td>
<?php if($_SESSION['banda']['email'] == "admin@admin.com"):  ?>
<td>
    <table border="1" style="width:100%" class="center">
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
    
    <tr>
    <td height="30"><b>Delete Puzzles</b></td>
    </tr>
    <?php foreach($level as $l): ?>
    <tr>
    <td height="30"><input type="checkbox" name="Delete[]" value="<?= $l["name"];?>" /></td>
    </tr>
    <?php endforeach;?>
    </table>
</td>
<?php endif; ?>
</tr>
</table>
<table style="width:50%" class="center" >
<tr>
    <td align="right">
    <input type="submit" name="formSubmit" value="Delete" />
</td>    
</tr>
</form>
