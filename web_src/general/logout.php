
<?php
session_start();
session_destroy();
header("Location: ../../web_src/general/login.php")
?>