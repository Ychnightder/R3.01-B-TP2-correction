<?php
//$trousseau = __DIR__
//    . DIRECTORY_SEPARATOR
//    . 'data'
//    . DIRECTORY_SEPARATOR . 'account.ndjson';

$trousseau = "C:\Users\Pierr\Downloads\R3.01-B-TP2\data\account.ndjson";

function createTrousseau(string $trousseau) : void {
    $directory = dirname($trousseau);
    if(!is_dir($directory)) {
        mkdir($directory, 0777, true);
    }
    if(!file_exists($trousseau)) {
        touch($trousseau);
    }
}

function addAccount($data)
{
    global $trousseau;
    $data["signup-pwd"] = password_hash($data["signup-pwd"],PASSWORD_DEFAULT);
    file_put_contents($trousseau,json_encode($data).PHP_EOL , FILE_APPEND);
}


function checkAccount($data) :bool
{
    global $trousseau;
    $fileContent = file_get_contents($trousseau);
    $lines = explode("\n",$fileContent); //SCANNER

    foreach($lines as $account){
        $account = json_decode($account,true);
        if( isHere($data["signin-email"])&&
            password_verify( $data["signin-pwd"] ,$account["signup-pwd"])){
            return true;
        }
    }
    return false;
}


function isHere($email) : bool
{
    global $trousseau;
    $fileContent = file_get_contents($trousseau);
    $lines = explode("\n",$fileContent); //SCANNER

    foreach($lines as $account){
        $account = json_decode($account,true);
        if($account["signup-email"] === $email ){
            return true;
        }
    }
    return false;
}

// alt + ctrl + l--Pazko








