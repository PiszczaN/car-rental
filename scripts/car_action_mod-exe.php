<?php
session_start();
include("../config/config.inc.php");

if(isset($_POST['rejestracja']) && !empty($_POST['rejestracja'])){
    

    var_dump($_POST);

    $sql = "UPDATE samochody 
    SET Rocznik = '".$_POST["Rocznik"]."', Marka = '".$_POST["Marka"]."', Kolor = '".$_POST["kolor"]."', Model = '".$_POST["Model"]."',
    Rejestracja = '".$_POST["rejestracja"]."', Pojemnosc_Silnika = '".$_POST["pojemnosc_silnika"]."', Moc_Silnika = '".$_POST["moc_silnika"]."',
    Skrzynia_Automat = '".$_POST["skrzynia_automat"]."', Cena = '".$_POST["Cena"]."', Opis = '".$_POST["opis"]."', Klimatyzacja = '".$_POST["klimatyzacja"]."',
    Drzwi = '".$_POST["drzwi"]."', Osoby = '".$_POST["osoby"]."', Foto = '".$_POST["Foto"]."', Paliwo = '".$_POST["paliwo"]."', Nadwozie = '".$_POST["nadwozie"]."', Klasa_idKlasa = '1'
    WHERE idSamochody = '".$_POST["action_car_id"]."';";

    $result = $connect -> real_query($sql);

   $_SESSION["mod_car"] = 1;
    header('location: ../car_action_mod.php?id='.$_POST['action_car_id']);

}else{
    $_SESSION["mod_car"] = 3;
    header('location: ../car_action_mod.php?id='.$_POST['action_car_id']);
}

?>