<?php

    require_once("utils/_init.php");
    if(!isset($_SESSION["banda"]))redirect("index.php");
    $users_store = new JSONStorage("${BASE_DIR}/user_data.json");

    $users=$users_store->findAll();
    
    
    $levels_data = new JSONStorage("about_levels.json");
    $check = false;
    $i=0;
    foreach($users as $key => $val):
        if($users[$key]['name'] == $_SESSION['banda']['name']):
            $i = $key;
            if($users[$key][$_GET['level']] === "no"){
            $users[$key][$_GET['level']] = "yes";
                
        }else $check = true;
        endif;
    endforeach;
    
     $newJsonString = json_encode($users);
    
    $users_store->update($i, $users[$i]);
    if($check == false){
    $data = $levels_data->findAll();
    $i=0;
    if($_GET['count']) {
    
        foreach($data as $key => $val):
            if($data[$key]['name'] == $_GET['level']):
                
                $i = $key;
                $data[$key]['count']++;
            endif;
        endforeach;
        
        $newJsonString = json_encode($data);
        $levels_data->update($i, $data[$i]);
     }
    }
     redirect("index.php");
   
?>