<?php
require_once("utils/_init.php");
unset($_SESSION['banda']);      //destroying a session
redirect("index.php");
?>
