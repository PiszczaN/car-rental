<?php

include("config/config.inc.php");
include("scripts/header.php");
include("scripts/access-exe.php");

    if(isset($_SESSION["register_kom"]) && !empty($_SESSION["register_kom"])){
        if($_SESSION["register_kom"] == 1){
            ?>
                <div class="success">KONTO ZOSTAŁO ZAREJESTROWANE POPRAWNIE</div>  
            <?php
        }
        else if($_SESSION["register_kom"] == 2){
            ?>
                <div class="fail">NIE UDAŁO SIĘ ZAREJESTROWAĆ KONTA, SPRÓBUJ PÓŹNIEJ</div>
            <?php              
        }
        else if($_SESSION["register_kom"] == 3){
            ?>
                <div class="fail">ISTNIEJE JUŻ KONTO WYKORZYSTUJĄCE PODANY ADRES EMAIL</div>
            <?php              
        }  
        else if($_SESSION["register_kom"] == 4){
            ?>
                <div class="fail">ISTNIEJE JUŻ KONTO WYKORZYSTUJĄCE PODANY NUMER TELEFONU</div>
            <?php              
        }
        else if($_SESSION["register_kom"] == 5){
            ?>
                <div class="fail">WPROWADZONO NIEPOPRAWNE POTWIERDZENIE HASŁA</div>
            <?php              
        }                        
        unset($_SESSION['register_kom']);               
    }                                  
?>

    <div class="get_access">
        <form method="post">

            <label for="login">E-mail</label><br>
            <input type="email" name="login" id="login" class="input_access" required/> <br/>

            <label for="password">Hasło</label><br>
            <input type="password" name="password" name="password" class="input_access" required/><br/>

            <div class="button_wraper">
                <a href="register.php"><button type="button" class="submit_button">Zarejestruj się</button></a>
                <button type="submit" class="deny_button">Zaloguj się</button>
            </div>
        </form>

    </div>

</body>

</html>
