<?php

require_once("utils/_init.php");
if(!isset($_SESSION["banda"]))redirect("index.php");
require_once("header.php");
$level_name = $levels_store->findAll();

$users=$users_store->findAll(); //for adding if the current user has already solved it or not

if (verify_post("puzzle_name","difficulty","rows","columns","THE_MATRIX")) {

    //create check for the existence of a puzzle with the same name => TODO
    $puzzle_name = $_POST["puzzle_name"];
    $difficulty = $_POST["difficulty"];
    $rows = $_POST["rows"];
    $columns = $_POST["columns"];
    $matrix = $_POST["THE_MATRIX"];

    //Later on check if all the variables provided are true to their format

    $n_level = [
        "id" => count($levels_store)+1,
        "name" => $puzzle_name,
        "dif" => $difficulty,
        "count" => '0'
    ];
    $levels_store->add($n_level);


    //for adding if the current user has already solved it or not......


     $i=0;
         foreach($users as $key => $val):
             $i = $key;

            $users[$key][$puzzle_name]= "no";
         
          $newJsonString = json_encode($users);
         $users_store->update($i, $users[$i]);
        endforeach;


//  REDIRECT TO ANOTHER PAGE AFTER FINISHING WITH THE ABOVE THINGS SO TO ALLOW USER TO CREATE THE ARRAY
 //   redirect($url) // or you can avoid it if you give the text area on the same page


 //ADDING THE MATRIX DATA FOR THE GAME
 //echo $matrix;

 //$myJSONString =$matrix.trim();
 //$myJSONString =$myJSONString.trim();
  $matrix = preg_replace('/\s+/', '', $matrix);
trim($matrix);
 $x = ($matrix);
 //echo $myJSONString;
 echo $x;
 $my = [
    "id"=> count($levels_data)+1,
    "name" => $puzzle_name,
    "data" => $x
    ];
   
    
     $levels_data->add($my);

   redirect("levels.php");

        }


    
?>

<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST"> 

      <br>Name of the puzzle:  &nbsp <input type="text" name="puzzle_name"> <br>

        Difficulty: &nbsp  <input type="text" name="difficulty"> <br>
        
        Number of Rows:  &nbsp <input type="text" name="rows" placeholder= "Numbers only"> <br>
        
        Number of Columns: &nbsp  <input type="text"  name="columns" placeholder= "Numbers only"> <br><br>

        Enter your Matrix: (The matrix should be according to the following format)<br> &nbsp<textarea name="THE_MATRIX" rows="10" cols="80" >    
        
        [["1","","",""],
        ["","2","","2"],
        ["1","","","3"],
        ["","","3",""]]  
         
    </textarea> 
        <br><br>

        <button type="submit" value="Submit">Submit</button><br>

    </form> 