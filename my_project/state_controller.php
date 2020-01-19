<?php
require_once("utils/_init.php");
if(!isset($_SESSION["banda"]))redirect("index.php");


// echo $_GET["data"];
// echo $_GET["case"];
// print_r($_GET['q']); 
    $data1 = $_GET["data"];
    $name1 = $_GET["name"];
    $case1 = $_GET["case"];
    $newJsonString = json_encode($data1);

if($_GET["case"] != 0){ //ADD response that the user cannot save the game when its empty 
    
    $data1 = $_GET["data"];
    $name1 = $_GET["name"];
    $case1 = $_GET["case"];
    $newJsonString = json_encode($data1);

    $n_state = [
        "email" => $_SESSION['banda']['email'],
        "date" => date("Y-m-d"),
        "time" => date("h:i:sa"),
        "name" => $name1,
        "case" => $case1,
        "data" => $data1
    ];
    $save->add($n_state);
}
?>

<!-- 
<script>
$(document).ready(function(){
  $("button").click(function(){
    $("#div1").load("saif);
  });
});
</script> -->

<!-- 
<div id="div1"><h2>Let jQuery AJAX Change This Text</h2></div>

<button>Get External Content</button> -->



    <table border="1">
    <tr ><td><b>Saved Games</b></td><tr>
    <?php 
    $save_state = $save->findAll();
    if(count($save_state)===0):?><tr><td>You have no saved games</td></tr><?php
    else:
    foreach($save_state as $s): //MAKE the td timestamp a button or a hyperlink which when clicked will call the load function or pass it as dom-target but the teacher said that you should pass it as an ajxax call so...
      if($s['email'] === $_SESSION['banda']['email'] && $s['name']===$_GET['name']):?>
        <tr>
        <td height="30" align="center"><input type="button" id="<?php echo $s["time"]." ".$s["date"]." ".$s["case"]." ".$s["name"];?>" onclick="load_save(this)" value="<?php echo $s["time"]." ".$s["date"];?>" /> </td> 
        </tr>
      <?php endif;
    endforeach;
endif;?>
</table>

<script>//You can define this funciton in the js as well 

</script>

<!-- <input type="button" id="3" onclick="init(this)" value="Hard" /> -->
