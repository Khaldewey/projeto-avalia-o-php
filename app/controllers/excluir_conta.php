<?php
require_once '../config/database.php';
require_once '../models/ContaPagar.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $idContaPagar = $_GET["id"];
    
    
    $contaPagar = new ContaPagar($pdo);
    
    
    $conta = $contaPagar->buscarContaPorId($idContaPagar);
    
    if ($conta) {
       
        $contaPagar->setId($idContaPagar);
        $contaPagar->excluirConta();
        
        header("Location: http://localhost/test-titan/index.php?action1=visualizar"); 
        exit();
    } else {
        
        header("Location: index.php");
        exit();
    }
} else {
    
    header("Location: index.php"); 
    exit();
}
?>
