<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>destroy</title>
</head>

<body>
<?php
session_start();
unset($_SESSION["s_usuario"]);
$_SESSION = array();
session_destroy();

header("Location: index.php");
?>
</body>
</html>