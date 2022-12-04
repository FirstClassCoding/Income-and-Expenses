<?php

$connect = new mysqli('localhost' , 'root' , '' , 'data');

if ($connect->connect_error) {
    die("Something wrong.: " . $connect->connect_error);
}

$login_username = 'admin';

$sql_users = "SELECT * FROM users WHERE username = '$login_username'";
$result_users = $connect->query($sql_users);
$show_users = $result_users->fetch_assoc();

$sql_history = "SELECT * FROM history WHERE username = '$login_username' ORDER BY date ASC";
$result_history = $connect->query($sql_history);
#$show_history = $result_history->fetch_assoc();

// foreach ($result as $shows) {
//     echo $shows['username'];
// }

// echo $show['username'];

date_default_timezone_set('Asia/Bangkok');

?>

<html>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">

<head>
    <title>Income and Expenses</title>
    <link rel = 'stylesheet' href = 'style.css'>
</head>

    <style>
        .main-table, th, td {
        border: 2px solid black;
        border-collapse: collapse;
        width: 100%;
        }
    </style>

    <body class = 'mainbg'>

        <div class = 'blue-bg master-head'>
            <p class = 'master-head master-username-text'>
                <?php echo 'Username : '.$show_users['username']; ?>
            </p>
            <p class = 'master-head master-balance-text'>
                <?php echo 'Balance : '.$show_users['balance']; ?>
            </p>
        </div>

        <h1 class = 'header-forum'>Income and Expenses History</h1>

        <div class = 'post-content white-bg'>
            <table class = 'main-table'>
                <tr>
                    <th class = 'ref-id-column'>Ref ID</th>
                    <th class = 'date-column'>Date [YYYY-MM-DD]</th>
                    <th class = 'details-column'>Details</th>
                    <th class = 'income-column'>Income</th>
                    <th class = 'expenses-column'>Expenses</th>
                    <th class = 'balance-column'>Balance</th>
                </tr>

                <?php
                    foreach($result_history as $show_history) {
                ?>

                <tr>
                    <td class = 'ref-id-column'>
                        <?php echo $show_history['ref_id']; ?>
                    </td>
                    <td class = 'date-column'>
                        <?php echo $show_history['date']; ?>
                    </td>
                    <td class = 'details-column'>
                        <?php echo $show_history['details']; ?>
                    </td>
                    <td class = 'income-column'>
                        <?php echo $show_history['income']; ?>
                    </td>
                    <td class = 'expenses-column'>
                        <?php echo $show_history['expenses']; ?>
                    </td>
                    <td class = 'balance-column'>
                        <?php echo $show_history['balance']; ?>
                    </td>
                </tr>
                <?php 
                    } 
                ?>

                <tr>
                    <form method = 'post' action = 'add_data_history.php'>
                        <td class = 'ref-id-column'></td>
                        <td class = 'date-column'>
                            <input class = 'enter-data' type = 'text' name = 'date'>
                        </td>
                        <td class = 'details-column'>
                            <input class = 'enter-data' type = 'text' name = 'details'>
                        </td>
                        <td class = 'income-column'>
                            <input class = 'enter-data' type = 'text' name = 'income'>
                        </td>
                        <td class = 'expenses-column'>
                            <input class = 'enter-data' type = 'text' name = 'expenses'>
                        </td>
                </tr>
            </table>
                <input class = 'add-data-bt-position' type = 'submit' value = 'Add Data'>
            </form>
        </div>

        <script>
            console.log('Test')
        </script>

    </body>

</html>

<?php

$connect->close();

?>