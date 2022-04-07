<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

require_once('./database/db.php');

$conn = db_connect();

$api_key = $_POST['api_key'];
$original_title =$_POST['tittle'];
$poster_path = $_POST['image'];
$release_date = $_POST['release'];

if ($api_key=="68F9B4619398DAA3C41A7D0DF1342B81") {
    
    $movies = createMovie($conn,$original_title,$poster_path,$release_date);

    if($movies==true)
    {
        $response = array(
            'status'=>200,
            'message' => 'Movie has been created successfully',
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