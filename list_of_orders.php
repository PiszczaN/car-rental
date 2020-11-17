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
            $t_orders_query = 'SELECT z.idZamowienia, CONCAT(k.Imie," ",k.Nazwisko) AS Imie, z.Data_Zlozenia, z.Data_Wydania, z.Data_Odebrania, CONCAT(s.Marka," ", s.Model) as samochod FROM zamowienia z
            inner join klienci k on(z.Klienci_idKlienci=k.idKlienci)
            inner join samochody s on(z.Samochody_idSamochody=s.idSamochody);';

                $t_orders = mysqli_query($connect, $t_orders_query);
                if(mysqli_num_rows($t_orders) > 0){
                    echo "

                        <table class=\"tab\">
                            <thead>
                                <tr class=\"table_border\">
                                    <th class=\"row tabti\" scope=\"col\">Numer zamówienia</th>
                                    <th class=\"row tabti\" scope=\"col\">Klient</th>
                                    <th class=\"row tabti\" scope=\"col\">Data Złożenia</th>
                                    <th class=\"row tabti\" scope=\"col\">Data wynajęcia</th>
                                    <th class=\"row tabti\" scope=\"col\">Data zwrotu</th>
                                    <th class=\"row tabti\" scope=\"col\">Samochód</th>
                                </tr>
                            </thead>";
                         
                    while($order = mysqli_fetch_assoc($t_orders)){
                        
                            echo "
                            <tr class=\"table_border\">
                                <td class=\"row\">".$order["idZamowienia"]."</td>
                                <td class=\"row\">".$order["Imie"]."</td>
                                <td class=\"row\">".$order["Data_Zlozenia"]."</td>
                                <td class=\"row\">".$order["Data_Wydania"]."</td>
                                <td class=\"row\">".$order["Data_Odebrania"]."</td>
                                <td class=\"row\">".$order["samochod"]."</td>
                            </tr>";
                    }
                    echo "</table></section>";
                }
            
        }

    ?>

    

</body>

</html>