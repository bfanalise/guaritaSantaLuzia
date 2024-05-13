<?php
include("conexao.php");
session_start();
#AGUARDANDO ENTRADA------------------------------------------------------------------------------------#
$sqli = "SELECT count(dt_entrada) FROM cadastro WHERE dt_entrada = ''";
$result = $conn -> query($sqli);
$userdata = mysqli_fetch_assoc($result);
$fora = $userdata['count(dt_entrada)'];
#DENTRO DA ALGODOEIRA------------------------------------------------------------------------------------#
$sqli_a = "SELECT count(dt_entrada) FROM cadastro WHERE dt_entrada !='' and dt_saida = ''";
$result_a = $conn -> query($sqli_a);
$userdata_a = mysqli_fetch_assoc($result_a);
$dentro = $userdata_a['count(dt_entrada)'];
#TODOS------------------------------------------------------------------------------------#
$sqli_b = "SELECT count(dt_chegada) FROM cadastro WHERE dt_saida = ''";
$result_b = $conn -> query($sqli_b);
$userdata_b = mysqli_fetch_assoc($result_b);
$marcados = $userdata_b['count(dt_chegada)'];
#CAROÇO AGUARDANDO ENTRADA------------------------------------------------------------------------------------#
$buscarproduto_a = "SELECT count(produto) FROM cadastro WHERE dt_entrada = '' and produto = 'CAROÇO DE ALGODÃO'";
$result_produto_a = $conn -> query($buscarproduto_a);
$userdata_produto_a = mysqli_fetch_assoc($result_produto_a);
$fora_produto_a = $userdata_produto_a['count(produto)'];
#PLUMA AGUARDANDO ENTRADA------------------------------------------------------------------------------------#
$buscarproduto_b = "SELECT count(produto) FROM cadastro WHERE dt_entrada = '' and produto = 'PLUMA'";
$result_produto_b = $conn -> query($buscarproduto_b);
$userdata_produto_b = mysqli_fetch_assoc($result_produto_b);
$fora_produto_b = $userdata_produto_b['count(produto)'];
#BRIQUETE AGUARDANDO ENTRADA------------------------------------------------------------------------------------#
$buscarproduto_c = "SELECT count(produto) FROM cadastro WHERE dt_entrada = '' and produto = 'BRIQUETE'";
$result_produto_c = $conn -> query($buscarproduto_c);
$userdata_produto_c = mysqli_fetch_assoc($result_produto_c);
$fora_produto_c = $userdata_produto_c['count(produto)'];
#CAROÇO CARREGANDO------------------------------------------------------------------------------------#
$sqli_d = "SELECT count(dt_entrada) FROM cadastro WHERE dt_entrada !='' and dt_saida = '' and produto = 'CAROÇO DE ALGODÃO'";
$result_d = $conn -> query($sqli_d);
$userdata_d = mysqli_fetch_assoc($result_d);
$dentro_d = $userdata_d['count(dt_entrada)'];
#PLUMA CARREGANDO------------------------------------------------------------------------------------#
$sqli_e = "SELECT count(dt_entrada) FROM cadastro WHERE dt_entrada !='' and dt_saida = '' and produto = 'PLUMA'";
$result_e = $conn -> query($sqli_e);
$userdata_e = mysqli_fetch_assoc($result_e);
$dentro_e = $userdata_e['count(dt_entrada)'];
#BRIQUETE CARREGANDO------------------------------------------------------------------------------------#
$sqli_f = "SELECT count(dt_entrada) FROM cadastro WHERE dt_entrada !='' and dt_saida = '' and produto = 'BRIQUETE'";
$result_f = $conn -> query($sqli_f);
$userdata_f = mysqli_fetch_assoc($result_f);
$dentro_f = $userdata_f['count(dt_entrada)'];


#FIBRILHA AGUARDANDO------------------------------------------------------------------------------------#
$sqli_d = "SELECT count(dt_entrada) FROM cadastro WHERE dt_entrada !='' and dt_saida = '' and produto = 'FIBRILHA'";
$result_d = $conn -> query($sqli_d);
$userdata_d = mysqli_fetch_assoc($result_d);
$dentro_d = $userdata_d['count(dt_entrada)'];
#FIBRILHA CARREGANDO------------------------------------------------------------------------------------#
$sqli_e = "SELECT count(dt_entrada) FROM cadastro WHERE dt_entrada !='' and dt_saida = '' and produto = 'FIBRILHA'";
$result_e = $conn -> query($sqli_e);
$userdata_e = mysqli_fetch_assoc($result_e);
$dentro_e = $userdata_e['count(dt_entrada)'];
#TOTAL DE ROLINHOS------------------------------------------------------------------------------------#
$sqli_f = "SELECT sum(quantidade) FROM cadastro WHERE dt_entrada = CURRENT_DATE /*and dt_saida = '' and*/ and produto like '%ROLINHO%'";
$result_f = $conn -> query($sqli_f);
$userdata_f = mysqli_fetch_assoc($result_f);
$total_f = $userdata_f['sum(quantidade)'];



?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONTROLE DE GUARITA</title>
    <link rel="stylesheet" type="text/css" href="sheet.css">
    <style>
        td{
            width: 300px;
            font-size: 10pt;
            font-weight: normal;
            border: 1px dashed #DDD;
            height: 50px;
            text-align: center;

        }
        p{
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            margin: 0px;
            color: #FFF;
            background-color: #3d3d3d;
            height: 20px;
        }
        div.valores{
            
            height: 100%;
            margin-top: 0px;
        }
        article{
            height: 100%;
            margin-top: 40px;
            border: none;
        }
        th{
            width: 50px;
        }
        a{
            color: #009970;
        }
        h1{
            font-size: 13pt;
        }
    </style>
</head>
<body>
    <div id="global">
        <header style="height: 30px">CONTROLE DE GUARITA - SANTA LUZIA</header>
        <div class="total">
        <article>
            <table>
                <h1>CARGAS GERAIS</h1>
                <tr>
            <?php echo "<td><p>MARCADOS TOTAIS:</p> <br>" . "<div class='valores'>" . $marcados ." Cargas marcadas"."</div>"."</td>" ?>
            <?php echo "<td><p>AGUARDANDO ENTRADA:</p> <br>" ."<div class='valores'>". $fora ." Cargas no pátio"."</div>"."</td>" ?>
            <?php echo "<td><p>AGUARDANDO SAÍDA:</p> <br>" ."<div class='valores'>". $dentro ." Dentro da algodoeira"."</div>"."</td>" ?>
                </tr>
            </table>
            <br>
            <table>
                <h1>CARGAS AGUARDANDO ENTRADA</h1>
                <tr>
            <?php echo "<td><p>CAROÇO AGUARDANDO:</p> <br>"."<div class='valores'>" . $fora_produto_a ." de caroço esperando"."</div>"."</td>" ?>
            <?php echo "<td><p>PLUMA AGUARDANDO:</p> <br>" ."<div class='valores'>". $fora_produto_b ." de pluma esperando"."</div>"."</td>" ?>
            <?php echo "<td><p>BRIQUETE AGUARDANDO:</p> <br>" ."<div class='valores'>". $fora_produto_c ." de Briquete esperando"."</div>"."</td>" ?>  
                </tr>
            </table>
            <br>
            <table>
            <h1>CARGAS DENTRO DA UNIDADE</h1>
                <tr>
            <?php echo "<td><p>CAROÇO CARREGANDO:</p> <br>" ."<div class='valores'>". $dentro_d ." em processo"."</div>"."</td>" ?>
            <?php echo "<td><p>PLUMA CARREGANDO:</p> <br>" ."<div class='valores'>". $dentro_e ." em processo"."</div>"."</td>" ?>
            <?php echo "<td><p>BRIQUETE CARREGANDO:</p> <br>" ."<div class='valores'>". $dentro_f ." rolinhos"."</div>"."</td>" ?>  
                </tr>
            </table>
            <br><br>
            <hr>
            <table>
            <br>
            <table>
            <h1>FIBRILHA / ROLINHOS TOTAIS</h1>
                <tr>
            <?php echo "<td><p>FIBRILHA CARREGANDO:</p> <br>" ."<div class='valores'>". $dentro_d ." em processo"."</div>"."</td>" ?>
            <?php echo "<td><p>FIBRILHA AGUARDANDO:</p> <br>" ."<div class='valores'>". $dentro_e ." em processo"."</div>"."</td>" ?>
            <?php echo "<td><p>ROLINHOS TOTAIS:</p> <br>" ."<div class='valores'>". $total_f ." Rolinhos"."</div>"."</td>" ?>  
                </tr>
            </table>
            <br><br>
            <hr>
            <table>
                <th><a href="index.html">CADASTRAR</a></th>
                <th> </th>
                <th><a href="pag_rel.php">RELATÓRIO</a></th>
            </table>
        </article>
</body>
</html>