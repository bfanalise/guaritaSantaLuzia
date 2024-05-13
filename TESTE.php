<?php
if(!empty($_GET['id'])){

    include_once("conexao.php");

    $id = $_GET['id'];
    $sqlselect = "SELECT * FROM cadastro WHERE id=$id";

    $result = $conn->query($sqlselect);

    if($result->num_rows > 0){
        while($userdata = mysqli_fetch_assoc($result))
        {
        $dataChegada = $userdata['dt_chegada'];
        $horaChegada = $userdata['hr_chegada'];
        $turno = $userdata['turno'];
        $placa = $userdata['placa'];
        $motorista = $userdata['motorista'];
        $eixo = $userdata['eixo'];
        $transportadora = $userdata['transportadora'];
        $produto =  $userdata['produto'];
        $quantidade = $userdata['quantidade'];
        $peso = $userdata['peso'];
        $dataEntrada = $userdata['dt_entrada'];
        $horaEntrada = $userdata['hr_entrada'];
        $dataSaida = $userdata['dt_saida'];
        $horaSaida = $userdata['hr_saida'];
        $origem = $userdata['origem'];
        $destino = $userdata['destino'];
        $nfe = $userdata['nfe'];
        }
    }
    else
    {
        header('Location: index.html');
    }


}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONTROLE DE GUARITA</title>
    <link rel="stylesheet" type="text/css" href="stl.css">
</head>
<body>
    <div id="global">
        <header>CONTROLE DE GUARITA</header>
        <article>
            <form method="POST" action="update.php">
                <table class="tabela01">
                    <tr>
                        <th><label>DATA CHEGADA:</label></th>
                        <th><label>HORA CHEGADA:</label></th>
                        <th><label>TURNO:</label></th>
                        <th><label>ID:</label></th>
                    </tr>
                    <tr>
                        <td><input type="date" name="chegada" value="<?php echo $dataChegada?>"></td>
                        <td><input type="time" name="hora" value="<?php echo $horaChegada?>"></td>
                        <td><input type="text" name="turno" placeholder="DIA/NOITE"></td>
                        <td><input type="number" name="id" value="<?php echo $id?>"></td>
                    </tr>
                    
                </table>
                <br>
                <hr>
                <br>
                <table class="tabela02">
                    <tr>
                        <th><label>PLACA DO VEÍCULO:</label></th>
                        <th><label>MOTORISTA:</label></th>
                        <th><label>QUANT. EIXO:</label></th>
                        <th><label>TRANSPORTADORA:</label></th>
                    </tr>
                    <tr>
                        <td><input type="text" name="placa" value="<?php echo $placa?>"></td>
                        <td><input type="text" name="motorista" value="<?php echo $motorista?>"></td>
                        <td><input type="text" name="eixo" value="<?php echo $eixo?>"></td>
                        <td><input type="text" name="transportadora" value="<?php echo $transportadora?>"></td>
                    </tr>
                </table>
                <br>
                <hr>
                <br>
                <table class="tabela03">
                    <tr>
                        <th><label>PRODUTO:</label></th>
                        <th><label>QUANTIDADE:</label></th>
                        <th><label>PESO:</label></th>
                    </tr>
                    <tr>
                        <td><input type="text" name="produto" value="<?php echo $produto?>"></td>
                        <td><input type="number" name="quantidade" value="<?php echo $quantidade?>"></td>
                        <td><input type="text" name="peso" value="<?php echo $peso?>"></td>
                    </tr>
                </table>
                <br>
                <hr>
                <br>
                <table class="tabela04">
                    <tr>
                        <th><label>DATA ENTRADA:</label></th>
                        <th><label>HORA ENTRADA:</label></th>
                        <th><label>DATA SAÍDA:</label></th>
                        <th><label>HORA SAÍDA:</label></th>
                    </tr>
                    <tr>
                        <td><input type="date" name="data_entrada" value="<?php echo $dataEntrada?>"></td>
                        <td><input type="time" name="hora_entrada" value="<?php echo $horaEntrada?>"></td>
                        <td><input type="date" name="data_saida" value="<?php echo $dataSaida?>"></td>
                        <td><input type="time" name="hora_saida" value="<?php echo $horaSaida?>"></td>
                    </tr>
                </table>
                <br>
                <hr>
                <br>
                <table class="tabela03">
                    <tr>
                        <th><label>ORIGEM:</label></th>
                        <th><label>DESTINO:</label></th>
                        <th><label>Nfe:</label></th>
                    </tr>
                    <tr>
                        <td><input type="text" name="origem" value="<?php echo $origem?>""></td>
                        <td><input type="text" name="destino" value="<?php echo $destino?>"></td>
                        <td><input type="text" name="nfe" value="<?php echo $nfe?>"></td>
                    </tr>
                </table>
                <br>
                <td>
                <input type="submit" value="SALVAR" name="update">
                </td>
                <td>
                <a href="pag_rel.php">RELATÓRIOS</a> | <a href="index.html">CADASTRAR ENTRADA</a>
                </td>
            </form>
        </article>
    </div>
    <script>
        
    </script>
</body>
</html>
