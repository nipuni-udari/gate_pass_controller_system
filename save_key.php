<?php
error_reporting(0);
?>

<?php
include ('connect.php');
include ('Key_registry.php');
?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $door_name = $_POST['door_name'];
    $hrisNo = $_POST['hrisNo'];
   // $epf = $_POST('epf');
    $name = $_POST['name'];
    $status = $_POST['btn_status'];
    date_default_timezone_set('Asia/Colombo');
    $dateTime = date('Y-m-d H:i:s');
   

    $query = "INSERT INTO KEY_REG (KEY_REG_DOOR_NAME, KEY_REG_NAME, KEY_REG_HRIS, KEY_REG_STATUS, KEY_REG_DateTime) VALUES ('$door_name','$name', '$hrisNo', '$status', '$dateTime')";
    
    if (mysqli_query($conn, $query)) {
        
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
}
?>
