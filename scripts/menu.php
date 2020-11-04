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
    <div class="hnav_element hnav4"><a href="scripts/logout-exe.php" class="header_link"><?php echo $sql_user_name_result["Imie"]; ?></a></div>
            <!--<span class="hnav_element_m">+</span>-->

</nav>