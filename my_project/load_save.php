<?php
require_once("utils/_init.php");
if(!isset($_SESSION["banda"]))redirect("index.php");

$save_load = $save->findAll();
    //echo "check";
    $date_load = $_GET["date"];
    $time_load = $_GET["time"];
    $name_load = $_GET["name"];
    $global_load = null;
    foreach($save_load as $s_load){
        if($s_load["email"] === $_SESSION['banda']['email']){
          if($s_load["name"]=== $name_load){
            if($s_load["date"]=== $date_load){
              if($s_load["time"]=== $time_load){
                $global_load = $s_load["data"];
              }
            }
          }
        }
    }
  
  if($global_load != null):

print_r($global_load);

endif; ?>