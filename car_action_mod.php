<?php

include("config/config.inc.php");
include("scripts/header.php");

?>

    <?php

        if(isset($_GET["id"])){
            if(!empty($_GET["id"])){
                $id = $connect -> real_escape_string($_GET["id"]);
                $sql = "SELECT * FROM samochody WHERE idSamochody = ".$id.";";
                $result_edit = $connect -> query($sql) -> fetch_assoc();
            } 
        }
    ?>

        <?php

            if(isset($_SESSION["mod_car"]) && !empty($_SESSION["mod_car"])){
                if($_SESSION["mod_car"] == 1){
                    ?>
                        <div class="success">DANE ZOSTAŁY ZAAKTUALIZOWANE</div> 
                    <?php
                }
                else if($_SESSION["mod_car"] == 2){
                    ?>
                        <div class="fail">dane nie zostały zaaktualizowane, zgłoś problem administratorowi</div>
                    <?php
                }
                else if($_SESSION["mod_car"] == 3){
                    ?>
                        <div class="fail">Dane nie zostały uzupełnione</div>
                    <?php
                }
                unset($_SESSION['mod_car']);
            }

            if(isset($_SESSION["new_car"]) && !empty($_SESSION["new_car"])){
                if($_SESSION["new_car"] == 1){
                    ?>
                        <div class="success">SAMOCHÓD ZOSTAŁ DODANY POPRAWNIE</div> 
                    <?php
                }
                else if($_SESSION["new_car"] == 2){
                    ?>
                        <div class="fail">dane nie zostały zaaktualizowane, zgłoś problem administratorowi</div>
                    <?php
                }
                else if($_SESSION["new_car"] == 3){
                    ?>
                        <div class="fail">Dane nie zostały uzupełnione</div>
                    <?php
                }
                unset($_SESSION['new_car']);
            }
        ?>

        <div class="car_title">
            <?php echo $result_edit['Marka']." ".$result_edit['Model']; ?>
        </div>

        <form name="booking_form" action="scripts/car_action_mod-exe.php" id="booking_form" method="post">

        <div class="car_action_content">

            <div class="car_info_title">INFORMACJE O SAMOCHODZIE</div>

            <div class="car_info">

                <input type="hidden" id="action_car_id" name="action_car_id" value="<?php echo $result_edit['idSamochody']; ?>">

                <div class="car_data">
                    <label for="rocznik">Rocznik</label><br>
                    <input type="number" class="car_data_form" id="Rocznik" name="Rocznik" placeholder="" value="<?php echo $result_edit['Rocznik']; ?>" required>
                </div>

                <div class="car_data">
                    <label for="kolor">Kolor</label><br>
                    <input type="text" class="car_data_form" id="kolor" name="kolor" placeholder="" value="<?php echo $result_edit['Kolor']; ?>" required>
                </div>

                <div class="car_data">
                    <label for="rejestracja">Rejestracja</label><br>
                    <input type="text" class="car_data_form" id="rejestracja" name="rejestracja" placeholder="" value="<?php echo $result_edit['Rejestracja']; ?>" required>
                </div>

                <div class="car_data">
                    <label for="pojemnosc_silnika">Pojemność silnika</label><br>
                    <input type="text" class="car_data_form" id="pojemnosc_silnika" name="pojemnosc_silnika" placeholder="" value="<?php echo $result_edit['Pojemnosc_Silnika']; ?>" required>
                </div>

                <div class="car_data">
                    <label for="moc_silnika">Moc silnika</label><br>
                    <input type="text" class="car_data_form" id="moc_silnika" name="moc_silnika" placeholder="" value="<?php echo $result_edit['Moc_Silnika']; ?>" required>
                </div>

                <div class="car_data">
                    <label for="rmanual">Skrzynia biegów</label><br>
                        <div>
                            <input type="radio" id="rmanual" name="skrzynia_automat" value="0" <?php if($result_edit['Skrzynia_Automat'] == 0){echo "checked";}?>>
                            <label for="rmanual">Manual</label>
                        </div>

                        <div>
                            <input type="radio" id="rautomat" name="skrzynia_automat" value="1" <?php if($result_edit['Skrzynia_Automat'] == 1){echo "checked";}?>>
                            <label for="rautomat">Automat</label>
                        </div>

                </div>

                <div class="car_data">
                    <label for="e_klim">Klimatyzacja</label><br>
                        <div>
                            <input type="radio" id="e_klim" name="klimatyzacja" value="1" <?php if($result_edit['Klimatyzacja'] == 1){echo "checked";}?>>
                            <label for="e_klim">Zainstalowana</label>
                        </div>

                        <div>
                            <input type="radio" id="n_klim" name="klimatyzacja" value="0" <?php if($result_edit['Klimatyzacja'] == 0){echo "checked";}?>>
                            <label for="n_klim">Brak</label>
                        </div>
                </div>

                <div class="car_data">
                    <label for="drzwi">Ilość drzwi</label><br>
                    <input type="number" class="car_data_form" id="drzwi" name="drzwi" placeholder="" value="<?php echo $result_edit['Drzwi']; ?>" required>
                </div>

                <div class="car_data">
                    <label for="osoby">Ilość siedzeń</label><br>
                    <input type="number" class="car_data_form" id="osoby" name="osoby" placeholder="" value="<?php echo $result_edit['Osoby']; ?>" required>
                </div>

                <div class="car_data">
                    <label for="paliwo">Paliwo</label><br>
                    <input type="text" class="car_data_form" id="paliwo" name="paliwo" placeholder="" value="<?php echo $result_edit['Paliwo']; ?>" required>
                </div>

                <div class="car_data">
                    <label for="nadwozie">Typ nadwozia</label><br>
                    <input type="text" class="car_data_form" id="nadwozie" name="nadwozie" placeholder="" value="<?php echo $result_edit['Nadwozie']; ?>" required>
                </div>

                <div class="car_data">
                    <label for="opis">Opis</label><br>
                    <textarea length="20" class="car_data_form" id="opis" name="opis" placeholder="" required><?php echo $result_edit['Opis']; ?></textarea>
                </div>

            
            </div>
            
            <div class="car_booking">

                <img src="img\<?php if($result_edit["Foto"] == NULL){echo "default.jpeg";}else{echo $result_edit['Foto'];} ?>" class="car_booking_foto"> 

                <div class="car_data">
                    <label for="Foto">Foto</label><br>
                    <input type="text" class="car_data_form" id="Foto" name="Foto" placeholder="" value="<?php echo $result_edit['Foto']; ?>">
                    <p style="color: gray;"> (i) Wprowadź nazwę pliku ze zdjęciem, wraz z rozszerzeniem (np. .jpg), a następnie dodaj obrazek do folderu "img", w przypadku pozostawienia pustej zawartości, zostanie ustawione domyślne zdjęcie</p>
                </div>

                <div class="car_data">
                    <label for="rocznik">Cena za dzień</label><br>
                    <input type="number" class="car_data_form" id="Cena" name="Cena" placeholder="" value="<?php echo $result_edit['Cena']; ?>" required>
                </div>

                <div class="car_data">
                    <label for="nadwozie">Marka</label><br>
                    <input type="text" class="car_data_form" id="Marka" name="Marka" placeholder="" value="<?php echo $result_edit['Marka']; ?>" required>
                </div>

                <div class="car_data">
                    <label for="nadwozie">Model</label><br>
                    <input type="text" class="car_data_form" id="Model" name="Model" placeholder="" value="<?php echo $result_edit['Model']; ?>" required>
                </div>

                <div class="button_wraper">     
                        
                        <a href="index.php"><button type="button" class="submit_button">Wróć do listy</button></a>
                        <button type="submit" class="deny_button">AKTUALIZUJ</button>

                </div>

                <a href="scripts/del_car-exe.php?id=<?php echo $result_edit["idSamochody"];?>"><button type="button" class="submit_button del_button">USUŃ SAMOCHÓD</button></a>

            </div>

        </form>

        </div>

    </body>

</html>