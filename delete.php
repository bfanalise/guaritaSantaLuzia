<?php
if(!empty($_GET['id'])){

    include_once("conexao.php");

    $id = $_GET['id'];
    $sqlselect = "SELECT * FROM cadastro WHERE id=$id";

    $result = $conn->query($sqlselect);

    if($result->num_rows > 0){
        while($userdata = mysqli_fetch_assoc($result))
        {
            $sqldelete = "DELETE FROM cadastro WHERE id=$id";
            $resultDelete = $conn->query($sqldelete);
        }
    }
        header('Location: pag_rel.php');
    }

?>
