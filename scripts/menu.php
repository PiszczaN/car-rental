<?php

    $sql_user_name_result["Imie"] = "ZALOGUJ SIĘ";

    if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
        $sql_user_name = "SELECT Imie FROM klienci WHERE Email ='".$_SESSION['user']."';";
        $sql_user_name_queryresult = mysqli_query($connect, $sql_user_name);
        $sql_user_name_result = mysqli_fetch_assoc($sql_user_name_queryresult);
    }

?>

<nav class="header_nav sticky">

    <div class="hnav_element hnav_logo"><span style="color: #444345; background-color: white;">Car</span>Rental</div>
    <div class="hnav_element hnav4">
        <?php if(isset($_SESSION['user']) && !empty($_SESSION['user'])){ echo $sql_user_name_result["Imie"];?>
            
            <div class="account_menu">

                <a href="#" class="acc_menu_option">Moje Konto</a>
                <a href="#" class="acc_menu_option">Zamówienia</a>
                <a href="scripts/logout-exe.php" class="acc_menu_option">Wyloguj się</a>

            </div>

        <?php 

            }
            else{
                echo '<a href="scripts/logout-exe.php">'.$sql_user_name_result["Imie"].'</a>';
            }

        ?>

    </div>
            <!--<span class="hnav_element_m">+</span>-->
        


        
</nav>

