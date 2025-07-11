<?php 

try{
    $pdo = new PDO("FROM PHPtable");
    echo "接続できました";
     =null
} catch (PDOexception $e){
    echo $e->getmessage();
}

$sql = "SELECT id, username FROM PHPtable";
$araay = query("$sql");

if(!empty($_POST["submitbuttom"]))){
    $_POST("username");
    $_POST("comment");
}