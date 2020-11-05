<?php

include("config/config.inc.php");
include("scripts/header.php");
include("scripts/register-exe.php");

?>

<div class="get_access">
        <form method="post">

            <label for="Imie">Imię</label><br>
            <input type="text" name="Imie" id="Imie" class="input_access" required/> <br/>

            <label for="Nazwisko">Nazwisko</label><br>
            <input type="text" name="Nazwisko" id="Nazwisko" class="input_access" required/> <br/>

            <label for="Nr_Telefonu">Numer Telefonu</label><br>
            <input type="tel" name="Nr_Telefonu" id="Nr_Telefonu" class="input_access" required/> <br/>

            <label for="login">E-mail</label><br>
            <input type="email" name="login" id="login" class="input_access" required/> <br/>

            <label for="password">Hasło</label><br>
            <input type="password" name="password" name="password" class="input_access" required/><br/>

            <label for="password_check">Powtórz Hasło</label><br>
            <input type="password" name="password_check" name="password_check" class="input_access" required/><br/>

            <div class="button_wraper">
                <a href="access.php"><button type="button" class="submit_button">Zaloguj się</button></a>
                <button type="submit" class="deny_button">Utwórz konto!</button>
            </div>
        </form>

    </div>

</body>

</html>
