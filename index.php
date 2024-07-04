<!doctype html>
<html>
<head>
    <title>MINI INSTAGRAM | Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://momentjs.com/downloads/moment-timezone-with-data.js"></script>
    <link rel="icon" type="image/png" href="favicon.png">
    <script>
        let timestamps = document.querySelectorAll('.timestamp'); // Use a class to identify all timestamps
        timestamps.forEach(function(timestamp) {
            let localTime = moment.utc(timestamp.innerHTML).tz('Asia/Manila').fromNow();
            timestamp.innerHTML = localTime;
        });
    </script>
</head>
<?php
session_start();
if(isset($_SESSION['userid']))
{
    header('Location: dashboard/index.php');
}
?>
<body>
<center><img src="logo.jpg" width="10%"/>
    <form name="login_form" method="post" action="authenticate.php">
        <div class="table-responsive" style="width: 60%">
            <table class="table table-striped">
                <tr>
                    <td>EMAIL: </td>
                    <td><input type="email" name="email" required/> </td>
                </tr>
                <tr>
                    <td>PASSWORD: </td>
                    <td><input type="password" name="password" required> </td>
                </tr>
                <tr>
                    <td colspan="2"><center><input type="submit" name="submit_login"/> </center></td>
                </tr>
                <tr>
                    <td colspan="2"><center><a href="signup/index.php">Register</a></center> </td>
                </tr>
            </table>
        </div>
    </form>
</center>
</body>
</html>