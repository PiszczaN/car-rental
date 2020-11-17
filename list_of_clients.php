<?php

include("config/config.inc.php");
include("scripts/header.php");

?>        

    <?php

        if($_SESSION["user_type"] == "employee"){
    ?>
            <div class="action">
                <a href="administration_panel.php" class="action_back"><- Wróć do panelu</a>
            </div>
            <section class="table">
    <?php
            $t_clients_query = "SELECT Imie, Nazwisko, Nr_Telefonu, Email FROM klienci;";
                $t_clients = mysqli_query($connect, $t_clients_query);
                if(mysqli_num_rows($t_clients) > 0){
                    echo "
                        <table class=\"tab\">
                            <thead>
                                <tr class=\"table_border\">
                                    <th class=\"row tabti\" scope=\"col\">Numer</th>
                                    <th class=\"row tabti\" scope=\"col\">Imie</th>
                                    <th class=\"row tabti\" scope=\"col\">Nazwisko</th>
                                    <th class=\"row tabti\" scope=\"col\">Numer Telefonu</th>
                                    <th class=\"row tabti\" scope=\"col\">Email</th>
                                </tr>
                            </thead>";
                            $i = 1;
                    while($clients = mysqli_fetch_assoc($t_clients)){
                        
                            echo "
                            <tr class=\"table_border\">
                                <td class=\"row\">".$i."</td>
                                <td class=\"row\">".$clients["Imie"]."</td>
                                <td class=\"row\">".$clients["Nazwisko"]."</td>
                                <td class=\"row\">".$clients["Nr_Telefonu"]."</td>
                                <td class=\"row\">".$clients["Email"]."</td>
                            </tr>";$i++;
                    }
                    echo "</table></section>";
                }else{
                    echo "<h1>Nie ma jeszcze żadnych klientów</h1>";
                }
            
        }

    ?>

    

</body>

</html>