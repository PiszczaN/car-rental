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

            <form class="action" method="post" action="list_of_done_duty.php">
                <input class="form-control mr-sm-2" type="search" name="search" placeholder="Wyszukaj" aria-label="Search">
                <button class="submit_button" type="submit">Szukaj</button>
            </form>

            <section class="table">
    <?php
            $t_dutys_query = 'SELECT p.idPracownicy, s.idSamochody, o.idObowiazki, o.Nazwa, o.Data, o.Opis, CONCAT(p.Imie," ",p.Nazwisko) as imie, CONCAT(s.Marka," ",s.Model) as samochod FROM obowiazki o
            inner join pracownicy p on(p.idPracownicy=o.Pracownicy_idPracownicy)
            inner join samochody s on(s.idSamochody=o.Samochody_idSamochody)
            WHERE o.Zakonczone = 1';

            if(isset($_POST["search"]))
            {
                $search_array = str_split($_POST['search']);

            if($search_array[0] != "#"){
                    //SZUKANIE PO INNYCH WARTOŚCIACH
                    $_POST["search"] = "%".$_POST["search"]."%";
                    $t_dutys_query = 'SELECT p.idPracownicy, s.idSamochody, o.idObowiazki, o.Nazwa, o.Data, o.Opis, CONCAT(p.Imie," ",p.Nazwisko) as imie, CONCAT(s.Marka," ",s.Model) as samochod FROM obowiazki o
                    inner join pracownicy p on(p.idPracownicy=o.Pracownicy_idPracownicy)
                    inner join samochody s on(s.idSamochody=o.Samochody_idSamochody)
                    WHERE o.Zakonczone = 1 AND
                    ((o.Nazwa LIKE "'.$_POST["search"].'") OR (o.Data LIKE "'.$_POST["search"].'") OR (o.Opis LIKE "'.$_POST["search"].'") OR (p.Imie LIKE "'.$_POST["search"].'") OR (p.Nazwisko LIKE "'.$_POST["search"].'") OR (s.Marka LIKE "'.$_POST["search"].'") OR (s.Model LIKE "'.$_POST["search"].'"));';

                }else if($search_array[0] == "#"){
                    //SZUKANIE PO ID
                    array_shift($search_array);
                    $search_id = implode("", $search_array);

                    $_POST["search"] = "%".$_POST["search"]."%";
                    $t_dutys_query = 'SELECT p.idPracownicy, s.idSamochody, o.idObowiazki, o.Nazwa, o.Data, o.Opis, CONCAT(p.Imie," ",p.Nazwisko) as imie, CONCAT(s.Marka," ",s.Model) as samochod FROM obowiazki o
                    inner join pracownicy p on(p.idPracownicy=o.Pracownicy_idPracownicy)
                    inner join samochody s on(s.idSamochody=o.Samochody_idSamochody)
                    WHERE o.Zakonczone = 1 AND
                    (o.idObowiazki LIKE "'.$search_id.'");';
                }
            }

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
                                <td class=\"row\">".$i." (#".$duty["idObowiazki"].")</td>
                                <td class=\"row\">".$duty["Nazwa"]."</td>
                                <td class=\"row\">".$duty["Data"]."</td>
                                <td class=\"row\">".$duty["Opis"]."</td>
                                <td class=\"row\">".$duty["imie"]." (#".$duty["idPracownicy"].")</td>
                                <td class=\"row\">".$duty["samochod"]." (#".$duty["idSamochody"].")</td>
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