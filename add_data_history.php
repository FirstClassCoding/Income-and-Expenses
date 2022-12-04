<?php

$connect = new mysqli('localhost' , 'root' , '' , 'data');

if ($connect->connect_error) {
    die("Something wrong.: " . $connect->connect_error);
}

$login_username = 'admin';

$get_date = $_POST['date'];
$get_details = $_POST['details'];
$get_income = $_POST['income'];
$get_expenses = $_POST['expenses'];

$sql_add_data_history = 
"INSERT INTO history(ref_id, date, username, details, income, expenses, balance)
 VALUE (NULL, '$get_date', '$login_username', '$get_details', '$get_income', '$get_expenses', NULL)";
$connect->query($sql_add_data_history);

// $sql_users = "SELECT * FROM users WHERE username = '$login_username'";
// $result_users = $connect->query($sql_users);
// $show_users = $result_users->fetch_assoc();

$sql_history = "SELECT * FROM history WHERE username = '$login_username' ORDER BY date ASC";
$result_history = $connect->query($sql_history);

$balance = 0;
foreach($result_history as $show_history) {
    $balance = $balance + $show_history['income'] - $show_history['expenses'];
    $ref_id = $show_history['ref_id'];

    $sql_update_balance_history = "UPDATE history SET balance = $balance WHERE ref_id = $ref_id";
    $connect->query($sql_update_balance_history);

    $sql_update_balance_users = "UPDATE users SET balance = $balance WHERE username = '$login_username'";
    $connect->query($sql_update_balance_users);

    $sql_set_income_null = "UPDATE history SET income = NULL WHERE income = '0'";
    $connect->query($sql_set_income_null);

    $sql_set_expenses_null = "UPDATE history SET expenses = NULL WHERE expenses = '0'";
    $connect->query($sql_set_expenses_null);

    $sql_delete = "DELETE FROM history WHERE income is NULL and expenses is NULL";
    $connect->query($sql_delete);
}

$connect->close();

header("Location: index.php");
exit();

?>