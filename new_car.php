<?php

include("config/config.inc.php");
include("scripts/header.php");

?>
        <div class="car_title">
            DODAJ NOWY SAMOCHÓD
        </div>

        <form name="booking_form" action="scripts/new_car-exe.php" id="new_car_form" method="post">

        <div class="car_action_content">

            <div class="car_info_title">INFORMACJE O SAMOCHODZIE</div>

            <div class="car_info">

                <div class="car_data">
                    <label for="rocznik">Rocznik</label><br>
                    <input type="number" class="car_data_form" id="Rocznik" name="Rocznik" placeholder="" required>
                </div>

                <div class="car_data">
                    <label for="kolor">Kolor</label><br>
                    <input type="text" class="car_data_form" id="kolor" name="kolor" placeholder="" required>
                </div>

                <div class="car_data">
                    <label for="rejestracja">Rejestracja</label><br>
                    <input type="text" class="car_data_form" id="rejestracja" name="rejestracja" placeholder="" required>
                </div>

                <div class="car_data">
                    <label for="pojemnosc_silnika">Pojemność silnika</label><br>
                    <input type="text" class="car_data_form" id="pojemnosc_silnika" name="pojemnosc_silnika" placeholder="" required>
                </div>

                <div class="car_data">
                    <label for="moc_silnika">Moc silnika</label><br>
                    <input type="text" class="car_data_form" id="moc_silnika" name="moc_silnika" placeholder="" required>
                </div>

                <div class="car_data">
                    <label for="skrzynia_automat">Skrzynia biegów</label><br>
                        <div>
                            <input type="radio" id="rmanual" name="skrzynia_automat" value="0" checked>
                            <label for="rmanual">Manual</label>
                        </div>

                        <div>
                            <input type="radio" id="rautomat" name="skrzynia_automat" value="1">
                            <label for="rautomat">Automat</label>
                        </div>

                </div>

                <div class="car_data">
                    <label for="klimatyzacja">Klimatyzacja</label><br>
                        <div>
                            <input type="radio" id="e_klim" name="klimatyzacja" value="1" checked>
                            <label for="e_klim">Zainstalowana</label>
                        </div>

                        <div>
                            <input type="radio" id="n_klim" name="klimatyzacja" value="0">
                            <label for="n_klim">Brak</label>
                        </div>
                </div>

                <div class="car_data">
                    <label for="drzwi">Ilość drzwi</label><br>
                    <input type="number" class="car_data_form" id="drzwi" name="drzwi" placeholder="" required>
                </div>

                <div class="car_data">
                    <label for="osoby">Ilość siedzeń</label><br>
                    <input type="number" class="car_data_form" id="osoby" name="osoby" placeholder="" required>
                </div>

                <div class="car_data">
                    <label for="paliwo">Paliwo</label><br>
                    <input type="text" class="car_data_form" id="paliwo" name="paliwo" placeholder="" required>
                </div>

                <div class="car_data">
                    <label for="nadwozie">Typ nadwozia</label><br>
                    <input type="text" class="car_data_form" id="nadwozie" name="nadwozie" placeholder="" required>
                </div>

                <div class="car_data">
                    <label for="opis">Opis</label><br>
                    <textarea length="20" class="car_data_form" id="opis" name="opis" placeholder="" required></textarea>
                </div>

            
            </div>
            
            <div class="car_booking">

                <img src="img/default.jpeg" class="car_booking_foto"> 

                <div class="car_data">
                    <label for="Foto">Foto</label><br>
                    <input type="text" class="car_data_form" id="Foto" name="Foto" placeholder="">
                    <p style="color: gray;"> (i) Wprowadź nazwę pliku ze zdjęciem, wraz z rozszerzeniem (np. .jpg), a następnie dodaj obrazek do folderu "img", w przypadku pozostawienia pustej zawartości, zostanie ustawione domyślne zdjęcie</p>
                </div>

                <div class="car_data">
                    <label for="rocznik">Cena za dzień</label><br>
                    <input type="number" class="car_data_form" id="Cena" name="Cena" placeholder="" required>
                </div>

                <div class="car_data">
                    <label for="nadwozie">Marka</label><br>
                    <input type="text" class="car_data_form" id="Marka" name="Marka" placeholder="" required>
                </div>

                <div class="car_data">
                    <label for="nadwozie">Model</label><br>
                    <input type="text" class="car_data_form" id="Model" name="Model" placeholder="" required>
                </div>

                <div class="button_wraper">

                        <a href="index.php"><button type="button" class="submit_button">Wróć do listy</button></a>
                        <button type="submit" class="deny_button">DODAJ SAMOCHÓD</button>

                </div>

            </div>

        </form>

        </div>

    </body>

</html>