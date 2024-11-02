<?php
session_start();
?>

<!doctype html>
<html>
<body>

<?php
session_unset();

session_destroy();

header("Location: ../welcome.php");
die();
?>
user log out
</body>
</html>
