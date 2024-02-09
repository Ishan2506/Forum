<?php
session_start();
//echo 'Logged Out';
session_destroy();
header("Location: /forum");

?>