<?php

include("config/config.inc.php");
include("scripts/header.php");

?>

    <?php

        $current_date = date("Y-m-d");

        if($_SESSION["user_type"] == "client"){
    ?>
            <div class="action">
                <a href="client_panel.php" class="action_back"><- Wróć do panelu</a>
                <div class="action_create">
                    <a class="action_info" style="background-color: white;">weryfikowane</a>
                    <a class="action_info" style="background-color: #ff7878;">odrzucone</a>
                    <a class="action_info" style="background-color: lightyellow;">przyjęte</a>
                    <a class="action_info" style="background-color: orange">realizowane</a>
                    <a class="action_info" style="background-color: lightgreen;">zakończone</a>
                </div>
            </div>

            <form class="action" method="post" action="client_orders_list.php">
                <input class="form-control" type="search" name="search" placeholder="Wyszukaj" aria-label="Search">
                <button class="submit_button" type="submit">Szukaj</button>
            </form>

            <section class="table">
    <?php
            $t_orders_query = 'SELECT s.idSamochody, k.idKlienci, z.idZamowienia, CONCAT(k.Imie," ",k.Nazwisko) AS Imie, s.Cena, z.Data_Zlozenia, z.Ilosc_Dob, k.Znizka, z.Data_Wydania, z.Data_Odebrania, CONCAT(s.Marka," ", s.Model) as samochod, z.Przyjete, z.Odrzucone FROM zamowienia z
            inner join klienci k on(z.Klienci_idKlienci=k.idKlienci)
            inner join samochody s on(z.Samochody_idSamochody=s.idSamochody)
            WHERE k.idKlienci = "'.$_SESSION["id"].'" ORDER BY z.Data_Zlozenia DESC;';

                if(isset($_POST["search"]))
                {
                    $search_array = str_split($_POST['search']);

                if($search_array[0] != "#"){
                        //SZUKANIE PO INNYCH WARTOŚCIACH
                        $_POST["search"] = "%".$_POST["search"]."%";
                        $t_orders_query = 'SELECT s.idSamochody, k.idKlienci, z.idZamowienia, CONCAT(k.Imie," ",k.Nazwisko) AS Imie, s.Cena, z.Data_Zlozenia, z.Ilosc_Dob, k.Znizka, z.Data_Wydania, z.Data_Odebrania, CONCAT(s.Marka," ", s.Model) as samochod, z.Przyjete, z.Odrzucone FROM zamowienia z
                        inner join klienci k on(z.Klienci_idKlienci=k.idKlienci)
                        inner join samochody s on(z.Samochody_idSamochody=s.idSamochody)
                        WHERE (k.idKlienci = "'.$_SESSION["id"].'") AND
                        ((k.Imie LIKE "'.$_POST["search"].'") OR (k.Nazwisko LIKE "'.$_POST["search"].'") OR (z.Data_Zlozenia LIKE "'.$_POST["search"].'") OR (z.Data_Wydania LIKE "'.$_POST["search"].'") OR (z.Data_Odebrania LIKE "'.$_POST["search"].'") OR (s.Marka LIKE "'.$_POST["search"].'") OR (s.Model LIKE "'.$_POST["search"].'"))
                        ORDER BY z.Data_Zlozenia DESC;';

                    }else if($search_array[0] == "#"){
                        //SZUKANIE PO ID
                        array_shift($search_array);
                        $search_id = implode("", $search_array);

                        $_POST["search"] = "%".$_POST["search"]."%";
                        $t_orders_query = 'SELECT s.idSamochody, k.idKlienci, z.idZamowienia, CONCAT(k.Imie," ",k.Nazwisko) AS Imie, s.Cena, z.Data_Zlozenia, z.Ilosc_Dob, k.Znizka, z.Data_Wydania, z.Data_Odebrania, CONCAT(s.Marka," ", s.Model) as samochod, z.Przyjete, z.Odrzucone FROM zamowienia z
                        inner join klienci k on(z.Klienci_idKlienci=k.idKlienci)
                        inner join samochody s on(z.Samochody_idSamochody=s.idSamochody)
                        WHERE (k.idKlienci = "'.$_SESSION["id"].'") AND
                        (z.idZamowienia LIKE "'.$search_id.'")
                        ORDER BY z.Data_Zlozenia DESC;';
                    }
                }

                $t_orders = mysqli_query($connect, $t_orders_query);
                if(mysqli_num_rows($t_orders) > 0){
                    echo "

                        <table class=\"tab\">
                            <thead>
                                <tr class=\"table_border\">
                                    <th class=\"row tabti\" scope=\"col\">Numer zamówienia</th>
                                    <th class=\"row tabti\" scope=\"col\">Data Złożenia</th>
                                    <th class=\"row tabti\" scope=\"col\">Data wynajęcia</th>
                                    <th class=\"row tabti\" scope=\"col\">Data zwrotu</th>
                                    <th class=\"row tabti\" scope=\"col\">Samochód</th>
                                    <th class=\"row tabti\" scope=\"col\">Cena</th>
                                </tr>
                            </thead>";$i =1;
                         
                    while($order = mysqli_fetch_assoc($t_orders)){


                    $cost = $order["Cena"] * $order["Ilosc_Dob"];
                    
                    if($order["Znizka"] > 0){$cost = $cost - $cost * ($order["Znizka"] / 100);}
                    
                        
                        

                        if(($current_date >= $order["Data_Wydania"]) && ($current_date <= $order["Data_Odebrania"]) && $order["Przyjete"] == 1){$bgcolor = "orange";}
                        else if($current_date < $order["Data_Wydania"] && $order["Przyjete"] == 1){$bgcolor = "lightyellow";}
                        else if($current_date > $order["Data_Odebrania"] && $order["Przyjete"] == 1){$bgcolor = "lightgreen";}
                        else if($order["Przyjete"] == 0 && $order["Odrzucone"] == 0){$bgcolor = "white";}
                        else if($order["Przyjete"] == 0 && $order["Odrzucone"] == 1){$bgcolor = "#ff7878";}
                        
                            echo "
                            <tr class=\"table_border\">
                                <td class=\"row\" style=\"background-color:".$bgcolor."\">".$i." (#".$order["idZamowienia"].")</td>
                                <td class=\"row\" style=\"background-color:".$bgcolor."\">".$order["Data_Zlozenia"]."</td>
                                <td class=\"row\" style=\"background-color:".$bgcolor."\">".$order["Data_Wydania"]."</td>
                                <td class=\"row\" style=\"background-color:".$bgcolor."\">".$order["Data_Odebrania"]."</td>
                                <td class=\"row\" style=\"background-color:".$bgcolor."\">".$order["samochod"]." (#".$order["idSamochody"].")</td>
                                <td class=\"row\" style=\"background-color:".$bgcolor."\">".$cost."</td>

                            </tr>"; $i++;
                    }
                    echo "</table></section>";
                }else{
                    echo "<h1>Nie ma nowych zamówień</h1>";
                }
            
        }

    ?>

    

</body>

</html>