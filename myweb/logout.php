<?php

session_start();

session_destroy();
//echo "you are logged out";
header('Location: index.html');
?>
