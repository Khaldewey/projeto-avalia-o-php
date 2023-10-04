<?php
require_once '../config/database.php'; 
require_once '../models/ContaPagar.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $idContaPagar = $_GET["id"];
    
    
    
    
    $contaPagar = new ContaPagar($pdo);
    $conta = $contaPagar->buscarContaPorId($idContaPagar);
    
    if ($conta) {
        $dataPagamento = strtotime($conta['data_pagar']); 
        $hoje = strtotime(date('Y-m-d')); 
        
        
        if ($hoje < $dataPagamento) {
            
            $valorComDesconto = $conta['valor'] * 0.95;
        } elseif ($hoje > $dataPagamento) {
            
            $valorComDesconto = $conta['valor'] * 1.10;
        } else {
            
            $valorComDesconto = $conta['valor'];
        }
        
       
        $contaPagar->setId($idContaPagar);
        $contaPagar->setPago(true);
        $contaPagar->setValor($valorComDesconto);
        $contaPagar->atualizarConta();
        
        
        header("Location: http://localhost/test-titan/index.php?action1=visualizar");
        exit();
    }
}


header("Location: index.php");
exit();
