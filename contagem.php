
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
$sqli_fib = "SELECT count(dt_entrada) FROM cadastro WHERE dt_entrada !='' and dt_saida = '' and produto = 'FIBRILHA'";
$result_fib = $conn -> query($sqli_fib);
$userdata_fib = mysqli_fetch_assoc($result_fib);
$dentro_fib = $userdata_fib['count(dt_entrada)'];
#FIBRILHA CARREGANDO------------------------------------------------------------------------------------#
$sqli_fibcar = "SELECT count(dt_entrada) FROM cadastro WHERE dt_entrada !='' and dt_saida = '' and produto = 'FIBRILHA'";
$result_fibcar = $conn -> query($sqli_fibcar);
$userdata_fibcar = mysqli_fetch_assoc($result_fibcar);
$dentro_fibcar = $userdata_fibcar['count(dt_entrada)'];
#TOTAL DE ROLINHOS------------------------------------------------------------------------------------#
$sqli_rolinhos = "SELECT sum(quantidade) FROM cadastro WHERE dt_entrada = CURRENT_DATE /*and dt_saida = '' and*/ and produto like '%ROLINHO%'";
$result_rolinhos = $conn -> query($sqli_rolinhos);
$userdata_rolinhos = mysqli_fetch_assoc($result_rolinhos);
$total_rolinhos = $userdata_rolinhos['sum(quantidade)'];



?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONTROLE GERAL</title>
    <link rel="stylesheet" type="text/css" href="sheet.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        #global {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        header {
            background-color: #009970;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            margin-bottom: 20px;
            font-size: 18px;
        }

        article {
            margin-top: -10px;
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #009970;
            color: #fff;
        }

        p {
            margin: 5px 0;
        }

        .valores {
            background-color: #3d3d3d;
            color: #fff;
            padding: 5px;
            border-radius: 5px;
        }

        a {
            color: #009970;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        h1 {
            font-size: 16px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div id="global">
        <article>
            <h1>CARGAS GERAIS</h1>
            <table>
                <tr>
                    <th>MARCADOS TOTAIS</th>
                    <th>AGUARDANDO ENTRADA</th>
                    <th>AGUARDANDO SAÍDA</th>
                </tr>
                <tr>
                    <td><div class='valores'><?php echo $marcados; ?> Cargas marcadas</div></td>
                    <td><div class='valores'><?php echo $fora; ?> Cargas no pátio</div></td>
                    <td><div class='valores'><?php echo $dentro; ?> Dentro da algodoeira</div></td>
                </tr>
            </table>
            
            <h1>CARGAS AGUARDANDO ENTRADA</h1>
            <table>
                <tr>
                    <th>CAROÇO AGUARDANDO</th>
                    <th>PLUMA AGUARDANDO</th>
                    <th>BRIQUETE AGUARDANDO</th>
                </tr>
                <tr>
                    <td><div class='valores'><?php echo $fora_produto_a; ?> de caroço esperando</div></td>
                    <td><div class='valores'><?php echo $fora_produto_b; ?> de pluma esperando</div></td>
                    <td><div class='valores'><?php echo $fora_produto_c; ?> de Briquete esperando</div></td>
                </tr>
            </table>
            
            <h1>CARGAS DENTRO DA UNIDADE</h1>
            <table>
                <tr>
                    <th>CAROÇO CARREGANDO</th>
                    <th>PLUMA CARREGANDO</th>
                    <th>BRIQUETE CARREGANDO</th>
                </tr>
                <tr>
                    <td><div class='valores'><?php echo $dentro_d; ?> em processo</div></td>
                    <td><div class='valores'><?php echo $dentro_e; ?> em processo</div></td>
                    <td><div class='valores'><?php echo $dentro_f; ?> rolinhos</div></td>
                </tr>
            </table>
            
            <hr>
            
            <h1>FIBRILHA / ROLINHOS TOTAIS</h1>
            <table>
                <tr>
                    <th>FIBRILHA CARREGANDO</th>
                    <th>FIBRILHA AGUARDANDO</th>
                    <th>ROLINHOS TOTAIS</th>
                </tr>
                <tr>
                    <td><div class='valores'><?php echo $dentro_fib; ?> em processo</div></td>
                    <td><div class='valores'><?php echo $dentro_fibcar; ?> em processo</div></td>
                    <td><div class='valores'><?php echo $total_rolinhos; ?> Rolinhos</div></td>
                </tr>
            </table>
            
            <hr>
            
            <table>
                <th><a href="index.html" style="color: #FFFFFF;">CADASTRAR</a></th>
                <th> </th>
                <th><a href="pag_rel.php" style="color: #FFFFFF;">RELATÓRIO</a></th>
            </table>
        </article>
    </div>
</body>
</html>
