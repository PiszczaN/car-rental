<?php

include("scripts/header.php");
include("config/config.inc.php");
include("scripts/change_password-exe.php");


?>

<?php

if(isset($_SESSION['id']) && $_SESSION['user_type'] == "client"){
    if(!empty($_SESSION['id'])){
        $id = $connect -> real_escape_string($_SESSION['id']);
        $sql = "SELECT * FROM klienci WHERE idKlienci = ".$id.";";
        $result_edit = $connect -> query($sql) -> fetch_assoc();
    } 
}

if(isset($_SESSION["change_pass_result"]) && !empty($_SESSION["change_pass_result"])){
    if($_SESSION["change_pass_result"] == 1){
        ?>
            <div class="success">HASŁO ZOSTAŁO ZMIENIONE POPRAWNIE</div> 
        <?php
    }
    else if($_SESSION["change_pass_result"] == 2){
        ?>
            <div class="fail">BŁĄD POŁĄCZENIA Z BAZĄ, SPRÓBUJ PÓŹNIEJ</div>
        <?php
    }
    else if($_SESSION["change_pass_result"] == 3){
        ?>
            <div class="fail">WPROWADZONO NIEPOPRAWNE POTWIERDZENIE HASŁA</div>
        <?php
    }
    else if($_SESSION["change_pass_result"] == 4){
        ?>
            <div class="fail">WPROWADZONO NIEPOPRAWNE STARE HASŁO</div>
        <?php
    }
    unset($_SESSION['change_pass_result']);
}
       

?>

    <div class="panel">

        <div class="panel_navigation">

            <h2 class="panel_title">Moje konto</h2>

            <a href="#" class="panel_option pan_opt1"><b>Moje Konto</b></a>
            <a href="client_orders_list.php" class="panel_option pan_opt2">Moje zamówienia</a>
            <a href="index.php" class="panel_option pan_opt3">Strona Główna</a>

            <a href="scripts/logout-exe.php" class="panel_option pan_opt7">Wyloguj się</a>

        </div>

        <div class="panel_content">

            <h2>Dane Pracownika</h2>

                <div class="content_info">
                    <label for="Imie">Imię</label><br>
                    <input type="text" class="content_info_input" id="Imie" name="Imie" placeholder="" value="<?php echo $result_edit['Imie']; ?>" disabled>
                </div>

                <div class="content_info">
                    <label for="Nazwisko">Nazwisko</label><br>
                    <input type="text" class="content_info_input" id="Nazwisko" name="Nazwisko" placeholder="" value="<?php echo $result_edit['Nazwisko']; ?>" disabled>
                </div>

                <div class="content_info">
                    <label for="Email">Email</label><br>
                    <input type="text" class="content_info_input" id="Email" name="Email" placeholder="" value="<?php echo $result_edit['Email']; ?>" disabled>
                </div>

                <div class="content_info">
                    <label for="Nr_Telefonu">Numer Telefonu</label><br>
                    <input type="text" class="content_info_input" id="Nr_Telefonu" name="Nr_Telefonu" placeholder="" value="<?php echo $result_edit['Nr_Telefonu']; ?>" disabled>
                </div>

                <p style="color: gray;"> (i) Jeżeli, wprowadzone dane są nieprawidłowe; skontaktuj się z obsługą klienta</p>

                <form method="post">

                    <div class="content_info">
                        <label for="old_password">Wprowadź stare hasło</label><br>
                        <input type="password" class="content_info_input" id="old_password" name="old_password" placeholder="" value="" required>
                    </div>

                    <div class="content_info">
                        <label for="new_password">Nowe hasło</label><br>
                        <input type="password" class="content_info_input" id="new_password" name="new_password" placeholder="" value="" required>
                    </div>

                    <div class="content_info">
                        <label for="new_password_check">Powtórz nowe hasło</label><br>
                        <input type="password" class="content_info_input" id="new_password_check" name="new_password_check" placeholder="" value="" required>
                    </div>

                    <div class="button_wraper">

                        <a href="index.php"><button type="button" class="submit_button">Wróć do strony głownej</button></a>
                        <a href="index.php"><button type="submit" class="deny_button">Zmień hasło</button></a>

                    </div>

                </form>


        </div>

    </div>

</body>

</html>