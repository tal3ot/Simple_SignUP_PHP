<?php
require_once "Task_1/config_session.tsk.php";
require_once "Task_1/signup_view.tsk.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <h3>SignUp</h3>
        <form action="Task_1/signup.tsk.php" method="post">
        <!-- it's in the view file and in recap it let the right data written and remove what is wrong when the users enter their data -->
        <?php
        signup_inputs();
        ?>
        <button>SignUp</button>

        <!-- Checking the SignUP errors -->
        <?php
        checking_signup_errors()
        ?>

        </form>
    </main>
</body>
</html>