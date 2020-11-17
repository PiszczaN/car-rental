<?php
session_start();
include("config/config.inc.php");

if(isset($_POST['Nazwa']) && isset($_POST['Data']) && isset($_POST['Pracownik']) && isset($_POST['Samochod']) && isset($_POST['Opis'])){

    $sql = "INSERT INTO obowiazki(`Nazwa`,`Opis`,`Pracownicy_idPracownicy`,`Data`,`Zakonczone`,`Samochody_idSamochody`)
    VALUES ('".$_POST['Nazwa']."','".$_POST['Opis']."','".$_POST['Pracownik']."','".$_POST['Data']."','0','".$_POST['Samochod']."')";
    $result = $connect -> real_query($sql);

   $_SESSION["duty"] = 1;
    header('location: list_of_duty.php');
    
}

?>