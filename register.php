<html>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">

    <head>
        <title>Register Page</title>
        <link rel = 'stylesheet' href = 'style.css'>
    </head>

    <body class = 'mainbg'>

        <div class = 'register-box'>

            <h2 class = 'head-text-box-register'>Register</h2>

            <table class = 'set-position-register'>

            <form method = 'post' action = 'register_process.php'>
                <tr>
                    <td class = 'set-text-register'>
                        <label for = 'username'>Username</label>
                    </td>
                    <td>
                        <input type = 'text' name = 'username'>
                    </td>
                </tr>
                <tr>
                    <td class = 'set-text-register'>
                        <label for = 'password'>Password</lable>
                    </td>
                    <td>
                        <input type = 'password' name = 'password'>
                    </td>
                </tr>
            </table>

                <input class = 'submit-register-bt-position' type = 'submit' value = 'Submit'>
                
            </form>
        </div>
    </body>
</html>