<?php
require_once '../config/database.php';
require_once '../models/ContaPagar.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $idContaPagar = $_GET["id"];
    
    
    $contaPagar = new ContaPagar($pdo);
    
   
    $conta = $contaPagar->buscarContaPorId($idContaPagar);
    
    if ($conta) {
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $novaDataPagar = $_POST["nova_data_pagar"];
            $novoValor = $_POST["novo_valor"];
            
            
            $contaPagar->setId($idContaPagar);
            $contaPagar->setDataPagar($novaDataPagar);
            $contaPagar->setValor($novoValor);
            
            $contaPagar->atualizarConta();
            
            header("Location: index.php"); 
            exit();
        }
        
        require_once '../views/edit-conta-pagar.php'; 
    } else {
        
        header("Location: index.php");
        exit();
    }
} else {
    
    header("Location: index.php"); 
    exit();
}
?> 



