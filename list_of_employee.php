<?php

include("config/config.inc.php");
include("scripts/header.php");

?>
<?php
    if(isset($_SESSION["nemployee_kom"]) && !empty($_SESSION["nemployee_kom"])){
        if($_SESSION["nemployee_kom"] == 1){
            ?>
                <div class="success">KONTO ZOSTAŁO ZAREJESTROWANE POPRAWNIE</div>  
            <?php
        }
        else if($_SESSION["nemployee_kom"] == 2){
            ?>
                <div class="fail">NIE UDAŁO SIĘ ZAREJESTROWAĆ KONTA, SPRÓBUJ PÓŹNIEJ</div>
            <?php              
        }
        else if($_SESSION["nemployee_kom"] == 3){
            ?>
                <div class="fail">ISTNIEJE JUŻ KONTO WYKORZYSTUJĄCE PODANY ADRES EMAIL</div>
            <?php              
        }  
        else if($_SESSION["nemployee_kom"] == 4){
            ?>
                <div class="fail">ISTNIEJE JUŻ KONTO WYKORZYSTUJĄCE PODANY NUMER TELEFONU</div>
            <?php              
        }
        else if($_SESSION["nemployee_kom"] == 5){
            ?>
                <div class="fail">WPROWADZONO NIEPOPRAWNE POTWIERDZENIE HASŁA</div>
            <?php              
        }                        
        unset($_SESSION['nemployee_kom']);               
    }     
?>                      

    <?php

        if($_SESSION["user_type"] == "employee"){
    ?>
            <div class="action">
                <a href="administration_panel.php" class="action_back"><- Wróć do panelu</a>
                <a href="new_employee.php" class="action_create">+ Utwórz nowego pracownika</a>
            </div>
            <section class="table">
    <?php
            $t_employee_query = "SELECT Imie, Nazwisko, Stanowisko, Nr_Telefonu, Email FROM pracownicy;";
                $t_employee = mysqli_query($connect, $t_employee_query);
                if(mysqli_num_rows($t_employee) > 0){
                    echo "

                        <table class=\"tab\">
                            <thead>
                                <tr class=\"table_border\">
                                    <th class=\"row tabti\" scope=\"col\">Numer</th>
                                    <th class=\"row tabti\" scope=\"col\">Imie</th>
                                    <th class=\"row tabti\" scope=\"col\">Nazwisko</th>
                                    <th class=\"row tabti\" scope=\"col\">Stanowisko</th>
                                    <th class=\"row tabti\" scope=\"col\">Numer Telefonu</th>
                                    <th class=\"row tabti\" scope=\"col\">Email</th>
                                </tr>
                            </thead>";
                            $i = 1;
                    while($employee = mysqli_fetch_assoc($t_employee)){
                        
                            echo "
                            <tr class=\"table_border\">
                                <td class=\"row\">".$i."</td>
                                <td class=\"row\">".$employee["Imie"]."</td>
                                <td class=\"row\">".$employee["Nazwisko"]."</td>
                                <td class=\"row\">".$employee["Stanowisko"]."</td>
                                <td class=\"row\">".$employee["Nr_Telefonu"]."</td>
                                <td class=\"row\">".$employee["Email"]."</td>
                            </tr>";$i++;
                    }
                    echo "</table></section>";
                }
            
        }

    ?>

    

</body>

</html>