<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

require_once('./database/db.php');

$conn = db_connect();

$api_key = $_POST['api_key'];
$email =$_POST['username'];
$pass = $_POST['password'];


if ($api_key=="68F9B4619398DAA3C41A7D0DF1342B81") {
    
    $user = selectUser($conn,$email,$pass);

    if($user==true)
    {
        $response = array(
            'status'=>200,
            'arrayUser' => $user,
        );

    echo json_encode($response);
    }
}else{
    $response = array(
        'status'=>209,
        'message' => 'Failed to authorize',
    );

echo json_encode($response);
}