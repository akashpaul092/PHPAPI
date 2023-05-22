<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET");


include_once "config.php";
include_once "controller.php";

$con=new config();
$db=$con->database_connection();

$post=new controller($db);

$post->id=isset($_GET["id"])?($_GET["id"]) : die();


$b=$post->getbyid();

if($b->num_rows>0){

$data=json_decode(file_get_contents("php://input"));

$post->name=$data->name;
$post->email=$data->email;
$post->designation=$data->designation;

$a=$post->update();

if($a==true){
   
   echo "updated";
}else{
    echo json_encode(array("error"=>"there was an error"));
}
}
else{
    echo json_encode(array("not found"=>"no data found"));
}

?>