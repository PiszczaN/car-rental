<?php
session_start();
include("../config/config.inc.php");

        if(isset($_GET["id"]) && $_SESSION["user_type"] == "employee"){
            if(!empty($_GET["id"])){

                $sql = "DELETE FROM samochody WHERE idSamochody = ".$_GET["id"].";";
                $result_edit = $connect -> query($sql);

                if($result_edit){
                    $connect -> close();
                    $_SESSION["car_del"] = 1;
                   header('location: ../index.php');
                    exit;
                }
                else{
                    $connect -> close();
                    $_SESSION["car_del"] = 2;
                    header('location: ../index.php');
                    exit;
                }

            } 
        }else{
            $connect -> close();
            header('location: ../index.php');
            exit;
        }
?>