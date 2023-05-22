<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

include_once "config.php";
include_once "controller.php";

     $id=$name=$email=$designation="";

     if(!empty($_POST["id"]) && !empty($_POST["name"]) && !empty($_POST["email"]) &&!empty($_POST["designation"]) ){
        $id=$_POST["id"];
        $name=$_POST["name"];
        $email=$_POST["email"];
        $designation=$_POST["designation"];
     }


$con=new config();
$db=$con->database_connection();

$post=new controller($db);

$data=json_decode(file_get_contents("php://input"));

$post->id=$data->id;
$post->name=$data->name;
$post->email=$data->email;
$post->designation=$data->designation;

$all=$post->createPost();

if($all==true){
    echo "Data Added.";
}

?>