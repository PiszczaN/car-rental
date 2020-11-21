<?php
         
    if(!empty($_POST['old_password']) && !empty($_POST['new_password']) && !empty($_POST['new_password_check']))
    {
        if($_POST['new_password'] == $_POST['new_password_check']){

                $Hashed_Password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
                $result = false;

                if($_SESSION['user_type'] == "employee"){

                    $access_query = "SELECT Haslo FROM pracownicy where IdPracownicy = ".$_SESSION['id'];;
                    $result_access = mysqli_query($connect, $access_query);
                    $access = mysqli_fetch_assoc($result_access);

                    if(password_verify($_POST['old_password'], $access['Haslo'])){
                        $sql = "UPDATE pracownicy SET Haslo = '".$Hashed_Password."' WHERE IdPracownicy = ".$_SESSION['id'];
                        $result = $connect -> real_query($sql);
                    }
                    else{
                        $connect -> close();
                        $_SESSION["change_pass_result"] = 4;
                        header('location: administration_panel.php');
                        exit;
                    }

                    if($result){
                        $connect -> close();
                        $_SESSION["change_pass_result"] = 1;
                        header('location: administration_panel.php');
                        exit;
                    }
                    else{
                        $connect -> close();
                        $_SESSION["change_pass_result"] = 2;
                        header('location: administration_panel.php');
                        exit;
                    }

                }
                else if($_SESSION['user_type'] == "client"){

                    $access_query = "SELECT Haslo FROM klienci WHERE IdKlienci = ".$_SESSION['id'];
                    $result_access = mysqli_query($connect, $access_query);
                    $access = mysqli_fetch_assoc($result_access);

                    if(password_verify($_POST['old_password'], $access['Haslo'])){
                        $sql = "UPDATE klienci SET Haslo = '".$Hashed_Password."' WHERE IdKlienci = ".$_SESSION['id'];
                        $result = $connect -> real_query($sql);
                    }
                    else{
                        $connect -> close();
                        $_SESSION["change_pass_result"] = 4;
                        header('location: client_panel.php');
                        exit;
                    }

                    if($result){
                        $connect -> close();
                        $_SESSION["change_pass_result"] = 1;
                        header('location: client_panel.php');
                        exit;
                    }
                    else{
                        $connect -> close();
                        $_SESSION["change_pass_result"] = 2;
                        header('location: client_panel.php');
                        exit;
                    }
                }

        }
        else if($_POST['new_password'] != $_POST['new_password_check'] && $_SESSION['user_type'] == "employee"){
            $connect -> close();
            $_SESSION["change_pass_result"] = 3;
            header('location: administration_panel.php');
            exit;
        }else if($_POST['new_password'] != $_POST['new_password_check'] && $_SESSION['user_type'] == "client"){
            $connect -> close();
            $_SESSION["change_pass_result"] = 3;
            header('location: client_panel.php');
            exit;
        }                  
    }

?>