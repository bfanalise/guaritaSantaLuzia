<?php
include_once("conexao.php");

$sql_quantidade = "SELECT count('id') from cadastro WHERE dt_entrada = ''";

Print_r($sql_quantidade);

?>