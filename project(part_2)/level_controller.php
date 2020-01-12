<?php

    require_once("utils/_init.php");
    
    $users_store = new JSONStorage("${BASE_DIR}/user_data.json");

    $users=$users_store->findAll();
    
    


    $levels_data = new JSONStorage("about_levels.json");
    $data = $levels_data->findAll();
    $i=0;
    if($_GET['count']) {
        // echo "count increased";

        foreach($data as $key => $val):
            if($data[$key]['name'] == $_GET['level']):
                echo $key;
                $i = $key;
                $data[$key]['count']++;
            endif;
        endforeach;
        echo('<br>');
        echo $_GET['level'];
        echo('<br>');
        print_r($data);
        
        echo('<br>');
        // print_r($data[$i]);
        $newJsonString = json_encode($data);
        // $levels_data->delete($i);
        $levels_data->update($i, $data[$i]);
     // file_put_contents('about_levels.json', $newJsonString);
        // echo json_decode($levels_data);

    }
    // foreach($users as $user){
    //     //if($_SESSION['banda']['name'] === $user['name']){
    //         $user["easy"] = "yes";
    //      // break;
    //     //}
    //   }
   // echo('<br>');
    //echo "SAIF";
    $i=0;
    foreach($users as $key => $val):
        if($users[$key]['name'] == $_SESSION['banda']['name']):
            echo $_SESSION['banda']['name'];
            $i = $key;
            $users[$key][$_GET['level']] = "yes";
        endif;
    endforeach;
    print_r($users);
    
    echo('<br>');
    // print_r($users[$i]);
    $newJsonString = json_encode($users);
    
    $users_store->update($i, $users[$i]);


?>