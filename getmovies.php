<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

require_once('./database/db.php');

$conn = db_connect();

$api_key = $_POST['api_key'];

if ($api_key=="68F9B4619398DAA3C41A7D0DF1342B81") {
    
    $movies = selectAll_Favorite_movies($conn);

    if($movies==true)
    {
        $response = array(
            'status'=>200,
            'message' => 'Movie fetch succeeded',
            'arrayMovies' => $movies
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