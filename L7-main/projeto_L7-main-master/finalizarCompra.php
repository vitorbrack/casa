<?php
session_start();
include_once 'Conecta.php';
foreach ($_SESSION['carrinho'] as $key => $carrinho) {
    $sql = "update produto set qtdEstoque = (qtdEstoque - '$carrinho') where idProduto = '$key'";
    mysqli_query($db, $sql)or die(mysqli_error($db));        
}
echo "<script>alert('Compra realizada com sucesso!');</script>";
echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"0;
        URL='derruba_session.php'\">"; 