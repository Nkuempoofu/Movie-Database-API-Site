<?php

function db_connect(){
	$conn = mysqli_connect("localhost", "root", "", "aglet_movies");
	if(!$conn){
		echo "Can't connect database " . mysqli_connect_error($conn);
		exit;
	}
	return $conn;
}

function selectUser($conn,$email,$pass){
		
    $query = "SELECT * FROM users WHERE email='$email' OR username='$email' AND password='$pass'";
    $result = mysqli_query($conn, $query);
    if ($row = mysqli_fetch_assoc($result)) {

        $row_us = array('username'=>$row['username'],
                        'email'=>$row['email'],
                        'id'=>$row['id']

                         ); 
        return $row_us;
    
      } else {
        return [
            'status' =>507,
            'message' => 'No user found'
        ];
    }

}

function selectAll_Favorite_movies($conn){
    $query = "SELECT * FROM favorite_movies";
    $result = mysqli_query($conn, $query);
  
    $storeArray = Array();
    if (mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_assoc($result)) {
            $storeArray[]=$row;
        }
        return $storeArray;
    } else {
        return [
            'status' =>507,
            'message' => 'No favorites movies yet'
        ];
    }

}

function  createMovie($conn,$original_title,$poster_path,$release_date){
		
    $query = "INSERT INTO favorite_movies(original_title, poster_path, release_date)  VALUES('$original_title','$poster_path','$release_date')";
    $result1 = mysqli_query($conn, $query);
    $last_id = mysqli_insert_id($conn);

    if(!$result1){
        echo "Insert movies failed " . mysqli_error($conn);
        exit;
        }
    else {
        $row_us = array('message'=>'Movie record created'
                
            ); 
        return $row_us;
    }


}