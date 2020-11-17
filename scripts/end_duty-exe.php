<?php
session_start();
include("../config/config.inc.php");

if(isset($_GET["id"]) && $_SESSION["user_type"] == "employee"){
    if(!empty($_GET["id"])){
        $id = $connect -> real_escape_string($_GET["id"]);

        $sql = "UPDATE obowiazki
        SET Zakonczone = 1
        WHERE idObowiazki =".$_GET["id"].";";

        $result_edit = $connect -> query($sql);

        $_SESSION["duty"] = 2;
        header('location: ../list_of_duty.php');
    } 
}
   
?>