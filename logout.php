<?php
session_start();
if (!isset($_SESSION["is_auth"])) {
header("location: index.php");
exit;
}

else if(isset($_REQUEST['logout']) && $_REQUEST['logout'] == "true") {
unset($_SESSION['is_auth']);
session_destroy();
header("location: index.php");
exit;
}
?>