<?php

include("config/config.inc.php");
include("scripts/header.php");

?>        

    <?php

        if($_SESSION["user_type"] == "employee"){
    ?>
            <div class="action">
                <a href="administration_panel.php" class="action_back"><- Wróć do panelu</a>
                <div class="action_create">
                    <a href="list_of_duty.php" class="">Aktywne</a>
                    <a href="new_duty.php" class="">+ Nowe zadanie</a>
                </div>
            </div>
            <section class="table">
    <?php
            $t_dutys_query = 'SELECT o.idObowiazki, o.Nazwa, o.Data, o.Opis, CONCAT(p.Imie," ",p.Nazwisko) as imie, CONCAT(s.Marka," ",s.Model) as samochod FROM obowiazki o
            inner join pracownicy p on(p.idPracownicy=o.Pracownicy_idPracownicy)
            inner join samochody s on(s.idSamochody=o.Samochody_idSamochody)
            WHERE o.Zakonczone = 1';

                $t_dutys = mysqli_query($connect, $t_dutys_query);
                if(mysqli_num_rows($t_dutys) > 0){
                    echo "
                        <table class=\"tab\">
                            <thead>
                                <tr class=\"table_border\">
                                    <th class=\"row tabti\" scope=\"col\">Numer</th>
                                    <th class=\"row tabti\" scope=\"col\">Nazwa</th>
                                    <th class=\"row tabti\" scope=\"col\">Data</th>
                                    <th class=\"row tabti\" scope=\"col\">Opis</th>
                                    <th class=\"row tabti\" scope=\"col\">Pracownik</th>
                                    <th class=\"row tabti\" scope=\"col\">Samochód</th>
                                </tr>
                            </thead>";
                            $i = 1;
                    while($duty = mysqli_fetch_assoc($t_dutys)){
                        
                            echo "
                            <tr class=\"table_border\">
                                <td class=\"row\">".$i."</td>
                                <td class=\"row\">".$duty["Nazwa"]."</td>
                                <td class=\"row\">".$duty["Data"]."</td>
                                <td class=\"row\">".$duty["Opis"]."</td>
                                <td class=\"row\">".$duty["imie"]."</td>
                                <td class=\"row\">".$duty["samochod"]."</td>
                            </tr>";$i++;
                    }
                    echo "</table></section>";
                }else{
                    echo "<h1>Nie ma jeszcze wykonanych zadań</h1>";
                }
            
        }

    ?>

    

</body>

</html>