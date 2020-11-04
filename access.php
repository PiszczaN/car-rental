<?php

include("config/config.inc.php");
include("scripts/header.php");
include("scripts/access-exe.php");

?>

    <div class="get_access">
        <form method="post">

            <label for="login">E-mail</label><br>
            <input type="email" name="login" id="login" class="input_access"/> <br/>

            <label for="password">Hasło</label><br>
            <input type="password" name="password" name="password" class="input_access"/><br/>

            <div class="button_wraper">
                <button type="submit" class="submit_button">Zarejestruj się</button>
                <button type="submit" class="deny_button">Zaloguj się</button>
            </div>
        </form>

    </div>

</body>

</html>
