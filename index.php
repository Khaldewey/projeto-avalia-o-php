<?php
require_once './app/Config/database.php';
require_once './app/controllers/ContaPagarController.php';

$controller = new ContaPagarController($pdo);

$action = $_GET['action'] ?? 'listar'; 

switch ($action) {
    case 'adicionar':
        $controller->adicionarContaPagar();
        break;
    
    // Outros casos aqui
} 

$action1 = $_GET['action1'] ?? 'listar';

switch ($action1) {
    case 'visualizar':
        $controller->buscarDadosContas();
        break;
    
    // Outros casos aqui
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Teste Israel Alves - Titan Software</title> 

</head>
<body>

<form method="GET" action="index.php">
    <input type="hidden" name="action" value="adicionar"> 
    <input type="submit" value="Adicionar Conta a Pagar"> 
</form> 

<form method="GET" action1="index.php">
    <input type="hidden" name="action1" value="visualizar"> 
    <input type="submit" value="Visualizar Pagamentos"> 
</form>
 
</body>
</html>
