<?php
         
    if(!empty($_POST['login']) && !empty($_POST['password']))
    {
        $access_query = "SELECT idKlienci, Email, Haslo from klienci where Email ='".$_POST['login']."';";
        $result_access = mysqli_query($connect, $access_query);
        $access = mysqli_fetch_assoc($result_access);
        //var_dump($access);

        //$hashToTest = password_hash($_POST['password'], PASSWORD_DEFAULT);

        if (password_verify($_POST["password"], $access['Haslo'])){
            $_SESSION['user'] = htmlspecialchars($_POST['login']);
            $_SESSION['id'] = $access['idKlienci'];
            header("Location: http://localhost/CarRental/");
        }
                
    }

?>