<?php include './classes/database.php'; ?>
<?php include './classes/user.php'; ?>
<?php include './classes/session.php'; ?>

<?php if (!isset($_SESSION["user_id"])) header("location: login.php"); ?>

<?php

$session->logout();
header("location: ./login.php");

?>