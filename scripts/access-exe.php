<?php
         
    if(!empty($_POST['login']) && !empty($_POST['password']))
    {
        $login_array = str_split($_POST['login']);

        if($login_array[0] != "@"){
            $access_query = "SELECT idKlienci, Imie, Haslo from klienci where Email ='".$_POST['login']."';";
            $result_access = mysqli_query($connect, $access_query);
            $access = mysqli_fetch_assoc($result_access);

            if (password_verify($_POST["password"], $access['Haslo'])){
                $_SESSION['user'] = htmlspecialchars($_POST['login']);
                $_SESSION['id'] = $access['idKlienci'];
                $_SESSION['user_name'] = $access['Imie'];
                $_SESSION['user_type'] = "client";
                header("Location: index.php");
            }
        }
        else if($login_array[0] == "@"){

            array_shift($login_array);
            $employee_login = implode("", $login_array);

            $access_query = "SELECT idPracownicy, Imie, Haslo from pracownicy where Email ='".$employee_login."';";
            $result_access = mysqli_query($connect, $access_query);
            $access = mysqli_fetch_assoc($result_access);

            if (password_verify($_POST["password"], $access['Haslo'])){
                $_SESSION['user'] = htmlspecialchars($_POST['login']);
                $_SESSION['id'] = $access['idPracownicy'];
                $_SESSION['user_name'] = $access['Imie'];
                $_SESSION['user_type'] = "employee";
                header("Location: index.php");
            }
        }

        
                
    }

?>