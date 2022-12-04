<?php

function check_user($get_user) {

    $connect = new mysqli('localhost' , 'root' , '' , 'data');

    if ($connect->connect_error) {
        die("Something wrong.: " . $connect->connect_error);
    }

    $sql_users = "SELECT * FROM users";
    $result_users = $connect->query($sql_users);
    #$show_users = $result_users->fetch_assoc();

    foreach($result_users as $show_users) {
        if($get_user == $show_users['username']) {
            echo 'This username has been used!';
            break;
        }
    }
}

header("Location: login.php");
exit();

?>