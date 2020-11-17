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
            $t_dutys_query = 'SELECT Nazwa, Opis, CONCAT(p.Imie," ",p.Nazwisko) as imie FROM obowiazki o
            inner join pracownicy p on(p.idPracownicy=o.Pracownicy_idPracownicy);';
                $t_dutys = mysqli_query($connect, $t_dutys_query);
                if(mysqli_num_rows($t_dutys) > 0){
                    echo "
                        <table class=\"tab\">
                            <thead>
                                <tr class=\"table_border\">
                                    <th class=\"row tabti\" scope=\"col\">Numer</th>
                                    <th class=\"row tabti\" scope=\"col\">Nazwa</th>
                                    <th class=\"row tabti\" scope=\"col\">Opis</th>
                                    <th class=\"row tabti\" scope=\"col\">Pracownik</th>
                                </tr>
                            </thead>";
                            $i = 1;
                    while($duty = mysqli_fetch_assoc($t_dutys)){
                        
                            echo "
                            <tr class=\"table_border\">
                                <td class=\"row\">".$i."</td>
                                <td class=\"row\">".$duty["Nazwa"]."</td>
                                <td class=\"row\">".$duty["Opis"]."</td>
                                <td class=\"row\">".$duty["imie"]."</td>
                            </tr>";$i++;
                    }
                    echo "</table></section>";
                }
            
        }

    ?>

    

</body>

</html>