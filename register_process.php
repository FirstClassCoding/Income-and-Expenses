<?php

function check_user($get_user , $get_password) {

    $connect = new mysqli('localhost' , 'root' , '' , 'data');

    if ($connect->connect_error) {
        die("Something wrong.: " . $connect->connect_error);
    }

    $sql_users = "SELECT * FROM users";
    $result_users = $connect->query($sql_users);
    #$show_users = $result_users->fetch_assoc();

    foreach($result_users as $show_users) {
        if($get_user == $show_users['username']) {
            echo "<script>
                    alert('This username has been used!Please use another username')
                </script>";
            break;
        }
    }

}

echo check_user($_POST['username'] , $_POST['password']);

// header("Location: register.php");
exit();

?>