<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET");


include_once "config.php";
include_once "controller.php";

$con=new config();
$db=$con->database_connection();

$post=new controller($db);
$all=$post->getall();

$num=$all->num_rows;
if($_SERVER["REQUEST_METHOD"]=='GET'){
if($num>0){
    $a=array();

  while($row=$all->fetch_assoc()){
    $arr=array(
        "id"=>$row["id"],
        "name"=>$row["name"],
        "email"=>$row["email"],
        "designation"=>$row["designation"]

    );
    array_push($a,$arr);

  }
  echo json_encode($a);
}else{
    echo json_encode(array("not_found"=>"no data found."));
}
}else{
    echo json_encode(array("Method not allowed"=>"405 methos not found."));
}

?>