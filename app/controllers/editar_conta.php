<?php
require_once '../config/database.php';
require_once '../models/ContaPagar.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $idContaPagar = $_GET["id"];
    
    
    $contaPagar = new ContaPagar($pdo);
    
    // Verifique se a conta existe
    $conta = $contaPagar->buscarContaPorId($idContaPagar);
    
    if ($conta) {
        // Processar o formulário de edição aqui
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $novaDataPagar = $_POST["nova_data_pagar"];
            $novoValor = $_POST["novo_valor"];
            
            // Atualize os campos da conta
            $contaPagar->setId($idContaPagar);
            $contaPagar->setDataPagar($novaDataPagar);
            $contaPagar->setValor($novoValor);
            
            $contaPagar->atualizarConta();
            
            header("Location: index.php"); // Redirecione para a página principal após a edição
            exit();
        }
        
        require_once '../views/edit-conta-pagar.php'; // Carregue a página de edição
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



