<?php
include 'include/config.php';

SESSION_DESTROY();

header("location:".BASE_PATH.'home');

?>
