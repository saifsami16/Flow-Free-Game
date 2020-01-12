<?php

    require_once("utils/_init.php");
    $levels_data = new JSONStorage("about_levels.json");
    $data = $levels_data->findAll();
    $i=0;
    if($_GET['count']) {
        echo "count increased";

        foreach($data as $key => $val):
            if($data[$key]['name'] == $_GET['level']):
                echo $key;
                $i = $key;
                $data[$key]['count']++;
            endif;
        endforeach;
        print_r($data);
        
        echo('<br>');
        // print_r($data[$i]);
        $newJsonString = json_encode($data);
        // $levels_data->delete($i);
        $levels_data->update($i, $data[$i]);

        file_put_contents('about_levels.json', $newJsonString);
        // echo json_decode($levels_data);

    }


?>
<script>