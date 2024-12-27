<?php
global $trousseau;
require './debug.php';
require "identity.php";
createTrousseau($trousseau);
if(isset($_POST)){
    //debugForm($_POST);
}
$data = $_POST;
addAccount($data);
debug($data);
if (isHere($data)){
    echo "oh no";
}








