<?php

include("config/config.inc.php");
include("scripts/header.php");

?>        

    <?php

        if(isset($_POST["Znizka"])){
            $sql = "UPDATE klienci SET Znizka = '".$_POST["Znizka"]."' WHERE idKlienci = ".$_POST["idZnizka"];
            $result_edit = $connect -> query($sql);
            header('location: list_of_clients.php');
        }

        if($_SESSION["user_type"] == "employee"){
    ?>
            <div class="action">
                <a href="administration_panel.php" class="action_back"><- Wróć do panelu</a>
            </div>

            <form class="action" method="post" action="list_of_clients.php">
                <input class="form-control" type="search" name="search" placeholder="Wyszukaj" aria-label="Search">
                <button class="submit_button" type="submit">Szukaj</button>
            </form>

            <section class="table">
    <?php
            $t_clients_query = "SELECT idKlienci, CONCAT(Imie,' ',Nazwisko) as Imie, Nr_Telefonu, Email, Znizka FROM klienci;";

            if(isset($_POST["search"]))
            {
                $search_array = str_split($_POST['search']);

            if($search_array[0] != "#"){
                    //SZUKANIE PO INNYCH WARTOŚCIACH
                    $_POST["search"] = "%".$_POST["search"]."%";
                    $t_clients_query = "SELECT idKlienci, CONCAT(Imie,' ',Nazwisko) as Imie, Nr_Telefonu, Email, Znizka FROM klienci
                    WHERE (Imie LIKE '".$_POST['search']."') OR (Nr_Telefonu LIKE '".$_POST['search']."') OR (Email LIKE '".$_POST['search']."') OR (Nazwisko LIKE '".$_POST['search']."')";

                }else if($search_array[0] == "#"){
                    //SZUKANIE PO ID
                    array_shift($search_array);
                    $search_id = implode("", $search_array);

                    $_POST["search"] = "%".$_POST["search"]."%";
                    $t_clients_query = "SELECT idKlienci, CONCAT(Imie,' ',Nazwisko) as Imie, Nr_Telefonu, Email, Znizka FROM klienci
                    WHERE (idKlienci LIKE '".$search_id."')";
                }
            }
                $t_clients = mysqli_query($connect, $t_clients_query);
                if(mysqli_num_rows($t_clients) > 0){
                    echo "
                        <table class=\"tab\">
                            <thead>
                                <tr class=\"table_border\">
                                    <th class=\"row tabti\" scope=\"col\">Numer</th>
                                    <th class=\"row tabti\" scope=\"col\">Imie</th>
                                    <th class=\"row tabti\" scope=\"col\">Numer Telefonu</th>
                                    <th class=\"row tabti\" scope=\"col\">Email</th>
                                    <th class=\"row tabti\" scope=\"col\">Zniżka (%)</th>
                                </tr>
                            </thead>";
                            $i = 1;
                    while($clients = mysqli_fetch_assoc($t_clients)){
                        
                            echo "
                            <tr class=\"table_border\">
                                <td class=\"row\">".$i."</td>
                                <td class=\"row\">".$clients["Imie"]." (#".$clients["idKlienci"].")</td>
                                <td class=\"row\">".$clients["Nr_Telefonu"]."</td>
                                <td class=\"row\">".$clients["Email"]."</td>

                                <td class=\"row\"><form method=\"post\">
                                    <input type=\"hidden\" value=\"".$clients["idKlienci"]."\" name=\"idZnizka\" id=\"idZnizka\">
                                    <input type=\"number\" min=\"0\" max=\"70\" class=\"content_info_input row_action\" id=\"Znizka\" name=\"Znizka\"value=\"".$clients["Znizka"]."\">
                                    <button type=\"submit\" class=\"deny_button action_button\">ZAPISZ</button>
                                </form></td>

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