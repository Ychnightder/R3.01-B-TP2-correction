<?php
require './debug.php';
require "identity.php";
if(isset($_POST)){
    debugForm($_POST);
}

if(checkAccount($_POST)){
    debug("OK");
}
