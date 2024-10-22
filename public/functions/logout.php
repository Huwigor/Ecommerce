<?php
session_start();
session_unset();  
session_destroy();  

header("Location: ../user/account/login-create-account.html");
exit();
?>