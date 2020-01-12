<?php
require_once("utils/_init.php");
require_once("utils/storage.php");
require_once("header.php");
?>




<br>
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
    
        <input type="button" id="easy" onclick="for_trial(this.id)" value="Play Trial" />
 <!--       <input type="button" id="2" onclick="init(this)" value="Medium" />
        <input type="button" id="3" onclick="init(this)" value="Hard" />
  -->
</body><br><br><br>
<div>


    <h1>Messengers – Web programming PHP home project</h1><br>
</div>
<div><p>There is a Hungarian tale in which when a great king sneezes, everyone in his kingdom needs to wish him good health.<br> However, the realization of this simple principle has led to serious problems. Its execution was entrusted to the main chamberlain. The main chamberlain had to think long and hard, because the messengers' routes had to be planned, so that leaving the designated castles the messengers had to reach their destinations without crossing or touching each other's route, and passing through the whole kingdom. Help the main chamberlain plan the messengers' route!

<br> The kingdom can be represented by a square grid. It has a few special cells from which the messengers depart and arrive. The endpoints of each messenger's route are indicated by the same number. The messenger can start from any of its endpoint. The routes of the messengers must be planned in accordance with the following rules:
    
<br>    Identical numbers must be connected by a continuous route.
<br>    Routes can only run horizontally and vertically touching the center of the fields, and they can be turned 90 degrees at that point.
<br>    Routes must not cross or divide.
<br>    Routes cannot pass through numbered fields, but all white fields must be passed by a route.
    </p></div>
 
 