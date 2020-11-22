<?php
         
    if(!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['Imie']) && !empty($_POST['Nazwisko']) && !empty($_POST['Nr_Telefonu']) && !empty($_POST['password_check']))
    {
        if($_POST['password'] == $_POST['password_check']){

            $tel_guard_sql = "SELECT COUNT(Nr_Telefonu) as tel_guard FROM klienci WHERE Nr_Telefonu ='".$_POST['Nr_Telefonu']."';";
            $tel_guard_con = mysqli_query($connect, $tel_guard_sql);
            $tel_guard = mysqli_fetch_assoc($tel_guard_con);

            $email_guard_sql = "SELECT COUNT(Email) as email_guard FROM klienci WHERE Email ='".$_POST['login']."';";
            $email_guard_con = mysqli_query($connect, $email_guard_sql);
            $email_guard = mysqli_fetch_assoc($email_guard_con);

            if(($tel_guard['tel_guard'] == 0) && ($email_guard['email_guard'] == 0)){

                $Hashed_Password = password_hash($_POST['password'], PASSWORD_DEFAULT);

                $sql = "INSERT INTO klienci(`Imie`,`Nazwisko`,`Nr_Telefonu`,`Email`,`Haslo`,`Znizka`)
                VALUES ('".$_POST['Imie']."','".$_POST['Nazwisko']."','".$_POST['Nr_Telefonu']."','".$_POST['login']."','".$Hashed_Password."','0')";
                $result = $connect -> real_query($sql);

                if($result){
                    $connect -> close();
                    $_SESSION["register_kom"] = 1;
                    header('location: access.php');
                    exit;
                }
                else{
                    $connect -> close();
                    $_SESSION["register_kom"] = 2;
                    header('location: access.php');
                    exit;
                }
            }
            else if($email_guard['email_guard'] > 0){
                $connect -> close();
                $_SESSION["register_kom"] = 3;
                header('location: access.php');
                exit;
            }
            else if($tel_guard['tel_guard'] > 0){
                $connect -> close();
                $_SESSION["register_kom"] = 4;
                header('location: access.php');
                exit;
            }
        }
        else if($_POST['password'] != $_POST['password_check']){
            $connect -> close();
            $_SESSION["register_kom"] = 5;
            header('location: access.php');
            exit;
        }         
    }

?>