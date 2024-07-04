<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Logout</title>
</head>

<body>
<?php
include('header.php');
session_unset();
session_destroy();

header( "refresh:0 ;url=../index.php" );
?>
</body>
</html>