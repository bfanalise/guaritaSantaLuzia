<?php
    include_once("conexao.php");

    if(isset($_POST['update']))
    {
    $id = $_POST['id'];
    $dataChegada = $_POST['chegada'];
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

    $sqlUpdate = "UPDATE cadastro SET dt_chegada = '$dataChegada', hr_chegada = '$horaChegada', turno = '$turno', placa = '$placa',
    motorista = '$motorista', eixo = '$eixo', transportadora = '$transportadora', produto = '$produto', quantidade = '$quantidade',
    peso = '$peso', carga = '$carga', dt_entrada = '$dataEntrada', hr_entrada = '$horaEntrada', dt_saida = '$dataSaida', hr_saida = '$horaSaida',
    origem = '$origem', destino = '$destino', nfe = '$nfe', observacao = '$observacao' WHERE id = '$id'";
    
    $result = $conn->query($sqlUpdate);

}
header('Location: pag_rel.php');
?>