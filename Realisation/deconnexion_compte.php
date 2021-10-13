<?php
session_start();
unset($_SESSION["Login"]);
//unset($_SESSION["Panier"]);
header("Location: index.php");

