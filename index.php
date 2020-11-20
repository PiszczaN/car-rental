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
        <section class="table">
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
                        if($car["Foto"] == NULL){$car["Foto"] = "default.jpeg";}
            ?>
                            <tr class="table_border">
                                <td class="row"><?php echo $car["idSamochody"] ?></td>
                                <td class="row"><?php echo $car["Marka"] ?></td>
                                <td class="row"><?php echo $car["Model"] ?></td>
                                <td class="row"><?php echo $car["Cena"] ?></td>
                                <td class="row"><img src="img/<?php echo $car["Foto"] ?>"></td>
            <?php 
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