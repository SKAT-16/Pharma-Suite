<?php
session_start();
session_unset();
session_destroy();

// Redirect to login page or home page
header("Location: /pharma-suite/auth/login_page.php");
exit();
