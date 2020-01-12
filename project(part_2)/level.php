<?php
require_once("utils/_init.php");
require_once("header.php");
$my_level=$levels_data->findAll();

?>


    <?php
        $output =$_GET["id"]; // Again, do some operation, get the output.
      //  echo htmlspecialchars($output); /* You have to escape because the result
         //                                  will not be valid HTML otherwise. */
    ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="project.css"/>
    <title>Document</title>
</head>
<body> 
    <table class="game" id="grid">
    </table>
        <script type="text/javascript" src="project.js"></script>        
    
        <script>
        //var div = document.getElementById("dom-target");
        //var x = div.textContent;
       // x = x.replace(/\s+/g, '');
        //init(x);
      </script>
        <?php 
/*
$d = [
  ['1', '', '', '', '3', '', '5', '', '2'],
  ['', '', '', '', '', '', '8', '5', ''],
  ['7', '4', '', '6', '', '', '', '', ''],
  ['', '', '', '', '', '', '1', '', ''],
  ['', '', '', '', '', '', '', '', '2'],
  ['', '', '4', '', '', '', '', '', ''],
  ['', '', '', '', '', '', '', '', ''],
  ['', '7', '', '', '', '', '3', '', ''],
  ['', '', '', '6', '', '', '', '', '8']
];


$myJSONString = json_encode($d);
$my = [
    "id"=> "1",
    "name" => "easy",
    "data" => $myJSONString,
    "pass" => "a"
    ];

  $levels_data->add($my);

  */

        foreach($my_level as $akela){
                if($akela["name"] === $output){
                  $output = $akela["data"];
                  break;
                }
            }
          
            
        ?>
       
        <div  id="dom-target" style="display: none;"> 
        <?php
        echo '<pre>'; print_r($output); echo '</pre>';
        ?>
        </div>
       <script>
         var div = document.getElementById("dom-target");
         var x = div.textContent;
         x = x.replace(/\s+/g, '');
         let y = JSON.parse(x);
         init(y);
        </script>
       
}


 <!--       <input type="button" id="2" onclick="init(this)" value="Medium" />
        <input type="button" id="3" onclick="init(this)" value="Hard" />
  -->
</body>
<br><br><br>
<div>

