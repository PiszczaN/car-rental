<?php

include("config/config.inc.php");
include("scripts/header.php");
include("scripts/new_duty-exe.php");

?>

<div class="get_access">
        <form method="post">

            <h2 class="form_title">NOWE ZADANIE</h2>

            <label for="Nazwa">Nazwa</label><br>
            <input type="text" name="Nazwa" id="Nazwa" class="input_access" required/> <br/>

            <label for="Data">Data</label><br>
            <input type="date" name="Data" id="Data" class="input_access" required/> <br/>

            <label for="Samochod">Samochód</label><br>
            <select class="input_access" id="Samochod" name="Samochod">

                        <?php

                            $sql = "SELECT idSamochody, CONCAT(Marka,' | ',Model,' | ',Rejestracja) as samochod FROM samochody;";
                            $result = $connect->query($sql);
                            $i = 1;
                            while ($s = $result->fetch_assoc()){echo "<option value='".$s["idSamochody"]."'>".$s["samochod"]."</option>";}

                        ?>

            </select> <br/>

            <label for="login">Pracownik</label><br>
            <select class="input_access" id="Pracownik" name="Pracownik">

                        <?php

                            $sql = "SELECT idPracownicy, CONCAT(Imie,' ',Nazwisko) as imie FROM pracownicy;";
                            $result = $connect->query($sql);
                            $i = 1;
                            while ($s = $result->fetch_assoc()){echo "<option value='".$s["idPracownicy"]."'>".$s["imie"]."</option>";}

                        ?>

            </select> <br/>

            <label for="Opis">Opis</label><br>
            <textarea length="20" class="input_access" id="Opis" name="Opis" required></textarea>

            <div class="button_wraper">
                <a href="list_of_duty.php"><button type="button" class="submit_button">Lista zadań</button></a>
                <button type="submit" class="deny_button">Utwórz zadanie</button>
            </div>
        </form>

    </div>

</body>

</html>
