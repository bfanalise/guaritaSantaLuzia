<?php
include("conexao.php");
session_start();
if(!empty($_GET['search']))
{
    $data = $_GET['search'];
    $sql = "SELECT * FROM cadastro WHERE produto LIKE '%$data%' or placa LIKE '%$data%' ORDER BY id DESC";
}
else
{
    $sql = "SELECT * FROM cadastro ORDER BY id DESC";
}
$result = $conn -> query($sql);
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RELATÓRIOS</title>
    <link rel="stylesheet" type="text/css" href="sheet.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <div id="global2">
        <header class="topo-lista">CONTROLE DE GUARITA - RELATÓRIOS</header>
        <!--<nav class="menu"><a href="index.html">Cadastrar placa</a></nav>-->
        <div class="box-search">
            <input type="search" class="form-control w=25" placeholder="PESQUISAR PRODUTO" id="pesquisar">
            <!--<button onclick="searchData()" class="btn btn-success">
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-search" viewBox="0 0 14 14">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
            </svg>
            </button>-->

            <a href="index.html" class="botao_rel"><div class="botao_rel">
                NOVO
            </div></a>
    </div>
        <article class="tabela_artigo">
            <form method="POST" action="enviar.php">
              <table class="relatorio">
                <thead>
                <tr class="cabecalho">
                    <th class="cbootstrap_1">DT CHEGADA</th>
                    <th class="cbootstrap_2">HR CHEGADA</th>
                    <!--<th class="bootstrap">TURNO</th>-->
                    <th class="cbootstrap_3">PLACA</th>
                    <th class="cbootstrap_4">MOTORISTA</th>
                    <!--<th class="bootstrap">EIXO</th>-->
                    <th class="cbootstrap_5">TRANSPORT.</th>
                    <th class="cbootstrap_6">PRODUTO</th>
                     <!--<th class="bootstrap">QUANTIDADE</th>-->
                     <!--<th class="bootstrap">PESO</th>-->
                    <th class="cbootstrap_7">ENTRADA</th>
                    <th class="cbootstrap_8">HORA</th>
                    <!--<th class="bootstrap">SAÍDA</th>-->
                    <!--<th class="bootstrap">HORA</th>-->
                     <!--<th class="bootstrap">ORIGEM</th>-->
                     <!--<th class="bootstrap">DESTINO</th>-->
                     <!--<th class="bootstrap">NF</th>-->
                     <!--<th class="bootstrap">OBSERVAÇÃO</th>-->
                    <th class="cbootstrap_9">AÇÕES</th>
                </tr>
             </thead>
              </table>
        </article>


        <article class="tabela_artigo_2">
            <table>
                <?php
                while($userdata = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td class='bootstrap_1'>" . $data_a = implode("/", array_reverse(explode("-",$userdata['dt_chegada']))) . "</td>";
                    echo "<td class='bootstrap_2'>" . $userdata['hr_chegada'] . "</td>";
                    #echo "<td class='bootstrap'>" . $userdata['turno'] . "</td>";
                    echo "<td class='bootstrap_3'>" . $userdata['placa'] . "</td>";
                    echo "<td class='bootstrap_4'>" . $userdata['motorista'] . "</td>";
                    #echo "<td class='bootstrap'>" . $userdata['eixo'] . "</td>";
                    echo "<td class='bootstrap_5'>" . $userdata['transportadora'] . "</td>";
                    echo "<td class='bootstrap_6'>" . $userdata['produto'] . "</td>";
                    #echo "<td class='bootstrap'>" . $userdata['quantidade'] . "</td>";
                    #echo "<td class='bootstrap'>" . $userdata['peso'] . "</td>";
                    echo "<td class='bootstrap_7'>" . $data_a = implode("/", array_reverse(explode("-",$userdata['dt_entrada']))) . "</td>";
                    echo "<td class='bootstrap_8'>" . $userdata['hr_entrada'] . "</td>";
                    #echo "<td class='bootstrap'>" . $data_a = implode("/", array_reverse(explode("-",$userdata['dt_saida']))) . "</td>";
                    #echo "<td class='bootstrap'>" . $userdata['hr_saida'] . "</td>";
                    #echo "<td class='bootstrap'>" . $userdata['origem'] . "</td>";
                    #echo "<td class='bootstrap'>" . $userdata['destino'] . "</td>";
                    #echo "<td class='bootstrap'>" . $userdata['nfe'] . "</td>";
                    #echo "<td class='bootstrap'>" . $userdata['observacao'] . "</td>";
                    echo "<td class='bootstrap_9'>
                    <a class='bootst' href='edit.php?id=$userdata[id]'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='13' height='13' fill='#009970' class='bi bi-pencil-square' viewBox='0 0 17 17'>
                        <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                        <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z'/>
                        </svg>
                    </a>
                    <a class='bootst' href='delete.php?id=$userdata[id]' id='deletar'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='13' height='13' fill='#3d3d3d' class='bi bi-trash3-fill' viewBox='0 0 17 17'>
                    <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5'/>
                    </svg>
                    </a>
                    ";
                    echo "</tr>";
                }
                ?>
              </table>  
            </form>
        </article>
    </div>
    
</body>
<script>
    var search = document.getElementById('pesquisar');
    search.addEventListener("keydown", function(event){
        if(event.key === "Enter")
        {
            searchData();
        }
    });
    function searchData(){
        window.location = 'pag_rel.php?search='+search.value;
    }
</script>
</html>