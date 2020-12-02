<?php

include("config/config.inc.php");
include("scripts/header.php");

?>

<?php
if(isset($_SESSION["car_del"]) && !empty($_SESSION["car_del"])){
    if($_SESSION["car_del"] == 1){
?>
        <div class="success">SAMOCHÓD ZOSTAŁ USUNIĘTY POPRAWNIE</div> 
<?php
    }
    else if($_SESSION["car_del"] == 2){
?>
        <div class="fail">WYSTĄPIŁ PROBLEM Z BAZĄ</div>
<?php
    }
    unset($_SESSION['car_del']);
}
?>

<?php
if($_SESSION["user_type"] == "employee"){
?>
            <div class="action">
                <div class="action_back"></div>
                <div class="action_create">
                    <a href="new_car.php">+ Dodaj nowy samochód</a>
                </div>
            </div>

<?php
}
?>
            <form class="action" method="post" action="index.php">
                <input class="form-control" type="search" name="search" placeholder="Wyszukaj" aria-label="Search">
                <button class="submit_button" type="submit">Szukaj</button>
            </form>
        <section class="table">
            <?php
                $t_cars_query = "SELECT idSamochody, Marka, Model, Cena, Foto FROM samochody;";

                if(isset($_POST["search"]))
                        {
                            $search_array = str_split($_POST['search']);

                        if($search_array[0] != "#"){
                                //SZUKANIE PO INNYCH WARTOŚCIACH
                                $_POST["search"] = "%".$_POST["search"]."%";
                                $t_cars_query = "SELECT idSamochody, Marka, Model, Cena, Foto FROM samochody
                                WHERE (Cena LIKE '".$_POST['search']."') OR (Marka LIKE '".$_POST['search']."') OR (Model LIKE '".$_POST['search']."')";

                            }else if($search_array[0] == "#"){
                                //SZUKANIE PO ID
                                array_shift($search_array);
                                $search_id = implode("", $search_array);

                                $_POST["search"] = "%".$_POST["search"]."%";
                                $t_cars_query = "SELECT idSamochody, Marka, Model, Cena, Foto FROM samochody
                                WHERE (idSamochody LIKE '".$search_id."')";
                            }
                        }

                $t_cars = mysqli_query($connect, $t_cars_query);
                if(mysqli_num_rows($t_cars) > 0){
                    echo "
                        <table class=\"tab\">
                            <thead>
                                <tr>
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
                        if($car["Foto"] == NULL){$car["Foto"] = "default.jpeg";}
            ?>
                            <tr class="table_border">
                                <td class="row"><?php echo $l.' (#'.$car["idSamochody"].')' ?></td>
                                <td class="row"><?php echo $car["Marka"] ?></td>
                                <td class="row"><?php echo $car["Model"] ?></td>
                                <td class="row"><?php echo $car["Cena"] ?></td>
                                <td class="row"><img src="img/<?php echo $car["Foto"] ?>"></td> 
            <?php $l++;
                            if(isset($_SESSION["user_type"])){
                                if($_SESSION["user_type"] == "employee"){
            ?>
                                <td class="row"><a class="offer_link" href="car_action_mod.php?id=<?php echo $car['idSamochody'] ?>"><button class="offer_button">EDYTUJ</button></a></td>
            <?php 
                                }
                                else{
            ?>
                                <td class="row"><a class="offer_link" href="car_action.php?id=<?php echo $car['idSamochody'] ?>"><button class="offer_button">ZOBACZ</button></a></td>
            <?php 
                                }}else{
                                    echo "<td class=\"row\">Aby zobaczyć więcej informacji, oraz dokonać zamówienia, należy się zalogować</td>";
                                }
            ?>
                            </tr>
            <?php
                    }
                    echo "</table>";
                }
            ?>
        </section>
    </body> 
</html>