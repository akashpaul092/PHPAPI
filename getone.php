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

$a=$post->getbyid();

if($a->num_rows>0){
    while($row=$a->fetch_assoc()){
        $arr=array(
            "id"=>$row["id"],
            "name"=>$row["name"],
            "email"=>$row["email"],
            "designation"=>$row["designation"]

        );
    }
   echo  json_encode($arr);
}else{
    echo json_encode(array("not found"=>"no data found"));
}


?>