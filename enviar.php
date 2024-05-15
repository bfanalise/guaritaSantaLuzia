<?php
include("conexao.php");

if(isset($_POST['cadastrar'])){
    $dataChegada = $_POST['dataCheg'];
    $horaChegada = $_POST['hora'];
    $turno = $_POST['turno'];
    $placa = $_POST['placa'];
    $motorista = $_POST['motorista'];
    $eixo = $_POST['eixo'];
    $transportadora = $_POST['transportadora'];
    $produto =  $_POST['produto'];
    $quantidade = $_POST['quantidade'];
    $peso = $_POST['peso'];
    $carga = $_POST['carga'];
    $dataEntrada = $_POST['data_entrada'];
    $horaEntrada = $_POST['hora_entrada'];
    $dataSaida = $_POST['data_saida'];
    $horaSaida = $_POST['hora_saida'];
    $origem = $_POST['origem'];
    $destino = $_POST['destino'];
    $nfe = $_POST['nfe'];
    $observacao = $_POST['observacao'];
}


if(!$conn){
    die("Conexão falhou" . mysqli_connect_error());
}

$sql = "INSERT INTO cadastro VALUES(DEFAULT, '$dataChegada', '$horaChegada', '$turno', '$placa', '$motorista', '$eixo', '$transportadora', '$produto', '$quantidade','$peso','$carga', '$dataEntrada', '$horaEntrada', '$dataSaida', '$horaSaida', '$origem', '$destino', '$nfe', '$observacao')";

$rs = mysqli_query($conn, $sql);

if($rs){
    header('Location: index.html');
}

?>