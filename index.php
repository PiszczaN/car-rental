<?php

include("config/config.inc.php");
include("scripts/header.php");

?>
        <section class="offers_table">

            <?php

                $t_cars_query = "SELECT idSamochody, Marka, Model, Cena, Foto FROM samochody;";
                $t_cars = mysqli_query($connect, $t_cars_query);

                if(mysqli_num_rows($t_cars) > 0){

                    echo "
                        <table class=\"tab\">

                            <thead>

                                <tr class=\"table_border\">

                                    <th class=\"row tabti\" scope=\"col\">Numer</th>
                                    <th class=\"row tabti\" scope=\"col\">Marka</th>
                                    <th class=\"row tabti\" scope=\"col\">Model</th>
                                    <th class=\"row tabti\" scope=\"col\">Cena</th>
                                    <th class=\"row tabti\" scope=\"col\">Obrazek</th>
                                    <th class=\"row tabti\" scope=\"col\">Operacja</th>

                                </tr>

                            </thead>";
                            $l = 1;

                    while($car = mysqli_fetch_assoc($t_cars)){

                        $i = $l % 2;

                        if($car["Foto"] == NULL)
                            {
                                $car["Foto"] = "niema.png";
                            }

                            //echo $car["obrazek"];

                            echo "
                            <tr class=\"table_border\">
                                <td class=\"row bg".$i."\">".$car["idSamochody"]."</td>
                                <td class=\"row bg".$i."\">".$car["Marka"]."</td>
                                <td class=\"row bg".$i."\">".$car["Model"]."</td>
                                <td class=\"row bg".$i."\">".$car["Cena"]."</td>
                                <td class=\"row bg".$i."\"><img src=\"img\\".$car["Foto"]."\"></td>
                                <td class=\"row bg".$i."\"><a class=\"offer_link\" href='car_action.php?id=".$car['idSamochody']." '><button class=\"offer_button\">ZOBACZ</button></a></td>
                            </tr>";
                    }
                    echo "</table>";
                
                }

            ?>

        </section>

    </body> 

</html>