<?php

$BASE_DIR = realpath(__DIR__ . "/..");

session_start();
require_once("utils.php");
require_once("storage.php");


$users_store = new JSONStorage("${BASE_DIR}/user_data.json");
$levels_store = new JSONStorage("${BASE_DIR}/about_levels.json");
$levels_data = new JSONStorage("${BASE_DIR}/levels_data.json");

$messages = [];