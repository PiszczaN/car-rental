<?php

include("config/config.inc.php");
include("scripts/header.php");

?>

        <?php

        if(isset($_GET["id"]))
            {
                if(!empty($_GET["id"]))
                {

                    $id = $connect -> real_escape_string($_GET["id"]);

                    $sql = "SELECT * FROM samochody WHERE idSamochody = ".$id.";";
                    $result_edit = $connect -> query($sql) -> fetch_assoc();

                   /* if(!$result_edit)
                    {
                        $_SESSION["kom"] = 5;
                        header('location: index.php');
                        exit;
                    }*/

                }
                /*else
                {
                    $_SESSION["kom"] = 4;
                    header('location: index.php');
                    exit;
                }*/
            }
            /*else
            {
                $_SESSION["kom"] = 4;
                header('location: index.php');
                exit;
            }*/
        ?>

        <?php

            if($result_edit['Skrzynia_Automat'] == 1)
                $skrzyniab = "Automat";
            else
                $skrzyniab = "Manual";

            if($result_edit['Klimatyzacja'] == 1)
                $klimatyzacja = "Zainstalowana";
            else
                $klimatyzacja = "Nie posiada";


                /*if(isset($_SESSION["kom"]))
                {
                    if($_SESSION["kom"] == 1)
                    {
                        ?>
                            <div class="success">
                                Dokonano zamówienia
                            </div>  
                        <?php
                    }
                    else if($_SESSION["kom"] == 2)
                    {
                       ?>
        
                       <div class="fail">
                           Nie wprowadzono niezbędnych danych; daty wynajęcia oraz ilości dób wynajęcia
                       </div>

                       <?php
                    }
                    else if($_SESSION["kom"] == 3)
                    {
                       ?>
        
                       <div class="fail">
                           Aby wynająć samochód w serwisie musisz być zerejestrowanym oraz zalgowanym użytkownikiem.
                       </div>

                       <?php
                    }
                    unset($_SESSION['kom']);
                }*/
            ?>


        <div class="car_title">
            <?php echo $result_edit['Marka']." ".$result_edit['Model']; ?>
        </div>

        <div class="car_action_content">

            <div class="car_info_title">INFORMACJE O SAMOCHODZIE</div>
            <div class="car_booking_title">WYPOŻYCZ SAMOCHÓD</div>

            <div class="car_info">

                <div class="car_data">
                    <label for="rocznik">Rocznik</label><br>
                    <input type="text" class="car_data_form" id="Rocznik" name="Rocznik" placeholder="" value="<?php echo $result_edit['Rocznik']; ?>" disabled>
                </div>

                <div class="car_data">
                    <label for="kolor">Kolor</label><br>
                    <input type="text" class="car_data_form" id="kolor" name="kolor" placeholder="" value="<?php echo $result_edit['Kolor']; ?>" disabled>
                </div>

                <div class="car_data">
                    <label for="rejestracja">Rejestracja</label><br>
                    <input type="text" class="car_data_form" id="rejestracja" name="rejestracja" placeholder="" value="<?php echo $result_edit['Rejestracja']; ?>" disabled>
                </div>

                <div class="car_data">
                    <label for="pojemnosc_silnika">Pojemność silnika</label><br>
                    <input type="text" class="car_data_form" id="pojemnosc_silnika" name="pojemnosc_silnika" placeholder="" value="<?php echo $result_edit['Pojemnosc_Silnika']; ?>" disabled>
                </div>

                <div class="car_data">
                    <label for="moc_silnika">Moc silnika</label><br>
                    <input type="text" class="car_data_form" id="moc_silnika" name="moc_silnika" placeholder="" value="<?php echo $result_edit['Moc_Silnika']; ?>" disabled>
                </div>

                <div class="car_data">
                    <label for="skrzynia_automat">Skrzynia biegów</label><br>
                    <input type="text" class="car_data_form" id="skrzynia_automat" name="skrzynia_automat" placeholder="" value="<?php echo $skrzyniab; ?>" disabled>
                </div>

                <div class="car_data">
                    <label for="klimatyzacja">Klimatyzacja</label><br>
                    <input type="text" class="car_data_form" id="klimatyzacja" name="klimatyzacja" placeholder="" value="<?php echo $klimatyzacja; ?>" disabled>
                </div>

                <div class="car_data">
                    <label for="drzwi">Ilość drzwi</label><br>
                    <input type="text" class="car_data_form" id="drzwi" name="drzwi" placeholder="" value="<?php echo $result_edit['Drzwi']; ?>" disabled>
                </div>

                <div class="car_data">
                    <label for="osoby">Ilość siedzeń</label><br>
                    <input type="text" class="car_data_form" id="osoby" name="osoby" placeholder="" value="<?php echo $result_edit['Osoby']; ?>" disabled>
                </div>

                <div class="car_data">
                    <label for="paliwo">Paliwo</label><br>
                    <input type="text" class="car_data_form" id="paliwo" name="paliwo" placeholder="" value="<?php echo $result_edit['Paliwo']; ?>" disabled>
                </div>

                <div class="car_data">
                    <label for="nadwozie">Typ nadwozia</label><br>
                    <input type="text" class="car_data_form" id="nadwozie" name="nadwozie" placeholder="" value="<?php echo $result_edit['Nadwozie']; ?>" disabled>
                </div>

                <div class="car_data">
                    <label for="opis">Opis</label><br>
                    <textarea length="20" class="car_data_form" id="opis" name="opis" placeholder="<?php echo $result_edit['Opis']; ?>" disabled></textarea>
                </div>


            </div>

            <?php

            include("scripts/new_order-exe.php");

            ?>
            
            <div class="car_booking">

            

            <form name="booking_form" id="booking_form" method="post">

                <input type="hidden" id="booking_car_id" name="booking_car_id" value="<?php echo $result_edit['idSamochody']; ?>">

                <div class="booking">
                    <label for="booking_start">Wybierz datę wynajęcia</label><br>
                    <input type="date" class="car_booking_form" id="booking_start" name="booking_start">
                </div>

                <div class="booking">
                    <label for="booking_days">Podaj ilość dób wynajęcia</label><br>
                    <input type="number" class="car_booking_form" id="booking_days" name="booking_days">
                </div>


                <div class="button_wraper">

                    <a href="index.php"><button type="button" class="deny_button">Wróć do listy</button></a>
                    <button type="submit" class="submit_button">Wypożycz</button>

                </div>

            </form>

            


                <img src="img\<?php echo $result_edit['Foto']; ?>" class="car_booking_foto"> 

            </div>

        </div>


    </body>

</html>