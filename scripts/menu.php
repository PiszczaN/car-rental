
<nav class="header_nav sticky">

    <div class="hnav_element hnav_logo"><span style="color: #444345; background-color: white;">Car</span>Rental</div>
    <div class="hnav_element hnav4">
        <?php
            if(isset($_SESSION['user']) && !empty($_SESSION['user'])){ 
                echo $_SESSION['user_name'];
                if($_SESSION['user_type'] == "client"){
        ?>
                    <div class="account_menu">

                        <a href="client_panel.php" class="acc_menu_option">Moje Konto</a>
                        <a href="client_orders_list.php" class="acc_menu_option">Zamówienia</a>
                        <a href="index.php" class="acc_menu_option">Strona startowa</a>
                        <a href="scripts/logout-exe.php" class="acc_menu_option">Wyloguj się</a>

                    </div>
        <?php   
                }
                else if($_SESSION['user_type'] == "employee"){
        ?>
                    <div class="account_menu">

                        <a href="administration_panel.php" class="acc_menu_option">Moje Konto</a>
                        <a href="administration_panel.php" class="acc_menu_option">Panel Zarządzania</a>
                        <a href="index.php" class="acc_menu_option">Strona startowa</a>
                        <a href="scripts/logout-exe.php" class="acc_menu_option">Wyloguj się</a>

                    </div>
        <?php
                }
            }
            else{
                echo '<a href="scripts/logout-exe.php">ZALOGUJ SIĘ</a>';
            }
        ?>
    </div>
</nav>

