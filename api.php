<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

$api_key = $_POST['api_key'];
$id=1;
$lower_limit = 622;
$upper_limit = 631;
if(isset($_POST['id'])){
    $lower_limit = $lower_limit + 9;
    $upper_limit = $upper_limit + 9;
}
for ($movie=$lower_limit;$movie<$upper_limit;$movie++){

    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.themoviedb.org/3/movie/'.$movie.'?api_key=6792e5f3ae4f3ced37c54437d6ed5412',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    ));

    $data = curl_exec($curl);

    curl_close($curl);

    $error_data = array(
    "message"=>"Failed to connect to the external server"
    );

    if ($data==TRUE){
        $array = json_decode($data, true );
        $row = array(
            'id' => $id,
            'original_title'=>$array['original_title'],
            'poster_path'=>$array['poster_path'],
            'release_date'=>$array['release_date'],
        );
    }

    $storeArray[]=$row;
    $id = $id+1;

}

$response=array(
    'status' => 200, 
    'arrayMovies'=>$storeArray
 );

echo json_encode($response,true);

// $movie =550;
// $curl = curl_init();

//     curl_setopt_array($curl, array(
//     CURLOPT_URL => 'https://api.themoviedb.org/3/movie/'.$movie.'?api_key=6792e5f3ae4f3ced37c54437d6ed5412',
//     CURLOPT_RETURNTRANSFER => true,
//     CURLOPT_ENCODING => '',
//     CURLOPT_MAXREDIRS => 10,
//     CURLOPT_TIMEOUT => 0,
//     CURLOPT_FOLLOWLOCATION => true,
//     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//     CURLOPT_CUSTOMREQUEST => 'GET',
//     ));

//     $data = curl_exec($curl);

//     curl_close($curl);

//     $error_data = array(
//     "message"=>"Failed to connect to the external server"
//     );

//     if ($data==TRUE){
//         $array = json_decode($data, true );
//         $response=array(
//             'status' => 1, 
//             'original_title'=>$array['original_title'],
//             'poster_path'=>$array['poster_path'],
//             'release_date'=>$array['release_date'],
//          );
        
//         echo json_encode($response,true);
//     }