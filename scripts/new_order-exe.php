<?php
session_start();
include("../config/config.inc.php");

if(isset($_POST['booking_start']) && isset($_POST['booking_days']) && !empty($_POST['booking_start']) && !empty($_POST['booking_days']) && isset($_SESSION['user']) && !empty($_SESSION['user'])){
    $post = $_POST;
    $booking_date = date("Y-m-d");
    $return_date = date('Y-m-d',strtotime("+".$post['booking_days']." day", strtotime($post['booking_start'])));
    $booking_start = date('Y-m-d', strtotime($post['booking_start']));

    /*echo $post['booking_car_id']."<br>";
    echo $post['booking_days']."<br>";
    echo $booking_start."<br>";
    echo $booking_date."<br>";
    echo $return_date."<br>";*/

    $sql = "INSERT INTO zamowienia(`Data_Zlozenia`,`Data_Wydania`,`Data_Odebrania`,`Ilosc_Dob`,`Klienci_idKlienci`,`Samochody_idSamochody`)
    VALUES ('".$booking_date."','".$booking_start."','".$return_date."','".$post['booking_days']."','".$_SESSION['id']."','".$post['booking_car_id']."')";
    $result = $connect -> real_query($sql);

    

   $_SESSION["kom"] = 1;
    header('location: ../car_action.php?id='.$_POST['booking_car_id']);
    

}
else if(empty($_POST['booking_start']) || empty($_POST['booking_days'])){
    $_SESSION["kom"] = 2;
    header('location: ../car_action.php?id='.$_POST['booking_car_id']);
    
}
else if(empty($_SESSION['user'])){
    $_SESSION["kom"] = 3;
    header('location: ../car_action.php?id='.$_POST['booking_car_id']);
}

?>