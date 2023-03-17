<?php
// Retrieve form data
$fname = $_GET['first_name'];
$lname = $_GET['last_name'];
$gender = $_GET['gender'];
$email = $_GET['email_addr'];
$pass = $_GET['password'];
$last_inserted_id = $_GET['last_inserted_id'];

include "database.php";

//$sql = "INSERT INTO `tbl_login`(`first_name`,`last_name`, `gender` ) VALUES ('$fname', '$lname', '$gender')";
$sql = "UPDATE `tbl_login` SET `first_name` = '$fname', `last_name` = '$lname', `gender` = '$gender'  WHERE `id`='$last_inserted_id';";

  if (mysqli_query($conn, $sql)) {
 
    echo "data inserted successfully";
     
  } else {
     echo "Error: " . $sql . " " . mysqli_error($conn);
  }

  mysqli_close($conn);


  if( $fname!='' && $lname!='' && $gender!=''  )
{
  $data = array(
    'entry.1497081734' => $fname,
    'entry.968244823' => $lname,
    'entry.1159380557' => $gender,
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
