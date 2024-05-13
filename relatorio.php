<?php
include("conexao.php");
session_start();
$sqli = "SELECT * FROM cadastro WHERE transportadora = 'BOM FUTURO' ORDER BY id DESC";
$result = $conn -> query($sqli);
print_r($result);
