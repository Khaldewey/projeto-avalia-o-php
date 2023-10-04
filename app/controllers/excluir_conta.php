<?php
require_once '../config/database.php';
require_once '../models/ContaPagar.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $idContaPagar = $_GET["id"];
    
    
    $contaPagar = new ContaPagar($pdo);
    
    // Verifique se a conta existe
    $conta = $contaPagar->buscarContaPorId($idContaPagar);
    
    if ($conta) {
        // Processar a exclusão da conta aqui
        $contaPagar->setId($idContaPagar);
        $contaPagar->excluirConta();
        
        header("Location: http://localhost/test-titan/index.php?action1=visualizar"); // Redirecione para a página principal após a exclusão
        exit();
    } else {
        // A conta não existe, redirecione para alguma página de erro ou lista de contas
        header("Location: index.php");
        exit();
    }
} else {
    // ID não fornecido ou método HTTP não é GET
    header("Location: index.php"); // Redirecione para a página principal ou outra página apropriada
    exit();
}
?>
