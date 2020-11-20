<?php
session_start();
include("../config/config.inc.php");

if(isset($_POST['rejestracja']) && !empty($_POST['rejestracja'])){
    
    var_dump($_POST);

    $sql = "INSERT INTO samochody(`Rocznik`,`Marka`,`Kolor`,`Model`,`Rejestracja`, `Pojemnosc_Silnika`,`Moc_Silnika`,`Skrzynia_Automat`,`Cena`,
    `Opis`,`Klimatyzacja`,`Drzwi`,`Osoby`, `Foto`,`Paliwo`,`Nadwozie`,`Klasa_idKlasa`)
    VALUES ('".$_POST["Rocznik"]."','".$_POST["Marka"]."','".$_POST["kolor"]."','".$_POST["Model"]."',
    '".$_POST["rejestracja"]."','".$_POST["pojemnosc_silnika"]."','".$_POST["moc_silnika"]."',
    '".$_POST["skrzynia_automat"]."','".$_POST["Cena"]."','".$_POST["opis"]."','".$_POST["klimatyzacja"]."',
    '".$_POST["drzwi"]."','".$_POST["osoby"]."','".$_POST["Foto"]."','".$_POST["paliwo"]."','".$_POST["nadwozie"]."','1')";

    $result = $connect->real_query($sql);

            if($result)
            {
                $query = "SELECT idSamochody FROM samochody
                WHERE Rejestracja = '".$_POST["rejestracja"]."';";
                $result_id = mysqli_query($connect, $query);
                $car_id = mysqli_fetch_assoc($result_id);

                $connect -> close();
                $_SESSION["new_car"] = 1;
                header('location: ../car_action_mod.php?id='.$car_id["idSamochody"]);
                exit;
            }

}else{
    $_SESSION["new_car"] = 3;
    header('location: ../new_car.php');
}

?>