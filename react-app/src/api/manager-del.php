<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");
header("Content-Type: application/json; charset=UTF-8");
session_start();
$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json, true);

$username = $_POST['del_name'];

$con = mysqli_connect("localhost:3308", "root", "", "lunamar");
$query = "delete from apartments where Owner='$username'";
$result = mysqli_query($con,$query);

if($result){
    echo json_encode(["dsent" => 1]);
}
else{
    echo json_encode(["dsent" => 0]);
}
mysqli_close($con);
?>