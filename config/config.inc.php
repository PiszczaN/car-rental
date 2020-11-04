<?php

    $dbconfig = array("host"=>"localhost","user"=>"root","password"=>"","database"=>"mydb");
    $connect = mysqli_connect($dbconfig["host"],$dbconfig["user"],$dbconfig["password"],$dbconfig["database"]);

    if(!$connect){
        die("wystąpił problem z połączeniem z bazą: ".mysqli_connect_error());
    }

?>